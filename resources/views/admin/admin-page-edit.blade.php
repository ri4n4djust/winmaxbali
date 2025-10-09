<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Admin Page
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6">
                    <x-input-label for="album" :value="__('Album')" />
                    <input type="text" name="title" id="title" value="{{ $page->title }}" class="block mt-1 w-full" readonly>
                    <input type="hidden" name="imgb" id="imgb" value="{{ $page->image }}" >
                    <x-input-error :messages="$errors->get('album')" class="mt-2" />
                </div>
                <div class="p-6">
                    <x-input-label for="editor" :value="__('editor')" />
                    <textarea name="editor" id="editor">{{$page->content}}</textarea>
                    <input type="hidden" name="idp" id="idp" value="{{ $page->id }}">
                    <x-input-error :messages="$errors->get('editor')" class="mt-2" />
                </div>
                <script>
                    var myGlobalVar = "";
                    ClassicEditor
                    .create(document.querySelector('#editor'))
                    .then(editor => {
                        console.log('Editor was initialized', editor);

                        // window.myGlobalVar = editor;
                        window.myGlobalVar = editor.getData();
                       
                        editor.model.document.on('change:data', () => {
                            // document.getElementById('editor').value = editor.getData();
                            // console.log('Data has changed:', editor.getData());
                            window.myGlobalVar = editor.getData();
                        });
                    })
                    .catch(error => {
                        console.error('There was a problem initializing the editor:', error);
                    });
                    

                </script>
                
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-input-label for="image" :value="__('Image Banner')" />

                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" />
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
                    <form action="{{ route('dropzone.store') }}" method="post" class="dropzone" id="image-upload" style="border-radius: 5px; background: white; padding: 20px; margin-top: 30px; color: black;">
                        @csrf
                        <div>
                            <h4>Upload Multiple Image By Click On Box</h4>
                        </div>
                    </form>
                    <button id="uploadFile" class="btn btn-success mt-1">Upload Images</button>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                        let uploadedFiles = [];
                        let id_album = document.getElementById('idp').value;
                        let title = document.getElementById('title').value;
                        Dropzone.options.imageUpload = {
                            maxFilesize: 10, // Set maximum file size to 5 MB
                            acceptedFiles: ".jpeg,.jpg,.png,.gif",
                            addRemoveLinks: true,
                            dictRemoveFileConfirmation: "Are you sure you want to delete this file?",
                            dictDefaultMessage: "Drop files here or click to upload.",
                            dictFallbackMessage: "Your browser does not support drag and drop file uploads.",
                            dictInvalidFileType: "You can't upload files of this type.",
                            dictCancelUpload: "Cancel upload",
                            dictCancelUploadConfirmation: "Are you sure you want to cancel this upload?",
                            dictUploadCanceled: "Upload canceled.",
                            dictUploadAborted: "Upload aborted.",
                            maxFiles: 1, // Set maximum number of files
                            url: "/dropzone/store-bg", 
                            init: function() {
                                this.on("sending", function(file, xhr, formData) {
                                    formData.append("idal", id_album);
                                    formData.append("_token", '{{ csrf_token() }}');
                                    formData.append("title", title);
                                    formData.append("content", myGlobalVar);
                                    // console.log(formData);
                                });
                                this.on("success", function(file, response) {
                                    if (response.success) {
                                        // console.log(formData);
                                        uploadedFiles.push(response.file_name);
                                        // Update the file preview to use the new file name
                                        const previewElement = file.previewElement;
                                        const fileNameDisplay = previewElement.querySelector("[data-dz-name]");
                                        if (fileNameDisplay) {
                                            fileNameDisplay.textContent = response.file_name; // Update file name
                                        }
                                    } else {
                                        console.error("Upload failed: " + response.message);
                                    }
                                });
                                this.on("removedfile", function(file) {
                                    const previewElement = file.previewElement;
                                    const fileNameDisplay = previewElement.querySelector("[data-dz-name]");
                                    let fileName = fileNameDisplay.textContent ; // file.name;
                                    $.ajax({
                                        type: 'delete',
                                        url: '{{ route('dropzone.deleteBg') }}',
                                        data: {
                                            _token: '{{ csrf_token() }}',
                                            file_name: fileName,
                                            id_album: id_album
                                        },
                                        success: function(data) {
                                            if (data.success) {
                                                console.log("File deleted: " + fileName);
                                            } else {
                                                console.error("Delete failed: " + data.message);
                                            }
                                        },
                                        error: function(error) {
                                            console.error("Error during deletion: ", error);
                                        }
                                    });
                                });
                            }
                            
                        };
                        
                    </script>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            let nm_image = document.getElementById('imgb').value;
                            let dropzone = Dropzone.forElement("#image-upload");
                                            // data.gallery.forEach(image => {
                            let mockFile = { name: nm_image, size: 12345 };
                            dropzone.emit("addedfile", mockFile);
                            dropzone.emit("thumbnail", mockFile, "/storage/banner/" + nm_image);
                            dropzone.emit("complete", mockFile);


                            
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
