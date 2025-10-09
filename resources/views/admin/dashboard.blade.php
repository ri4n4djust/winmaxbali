<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-input-label for="Slide" :value="__('Slide')" />

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
            <form action="{{ route('dropzone.storeSl') }}" method="post" class="dropzone" id="image-upload" style="border-radius: 5px; background: white; padding: 20px; margin-top: 30px; color: black;">
                @csrf
                <div>
                    <h4>Upload Multiple Image By Click On Box</h4>
                </div>
            </form>
            <button id="uploadFile" class="btn btn-success mt-1">Upload Images</button>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                let uploadedFiles = [];
                // let id_album = document.getElementById('album').value;
                Dropzone.options.imageUpload = {
                    maxFilesize: 10, // Set maximum file size to 5 MB
                    acceptedFiles: ".jpeg,.jpg,.png,.gif",
                    addRemoveLinks: true,
                    init: function() {
                        this.on("sending", function(file, xhr, formData) {
                            // formData.append("id_album", id_album);
                        });
                        this.on("success", function(file, response) {
                            if (response.success) {
                                // console.log("File uploaded: " + response.file_name);
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
                                url: '{{ route('dropzone.deleteSl') }}',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    file_name: fileName,
                                    // id_album: id_album
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
                    // let id_album = document.getElementById('album').value;
                    fetch(`/admin-slide`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                let dropzone = Dropzone.forElement("#image-upload");
                                data.slide.forEach(image => {
                                    let mockFile = { name: image.image, size: image.size };
                                    dropzone.emit("addedfile", mockFile);
                                    dropzone.emit("thumbnail", mockFile, image.path);
                                    dropzone.emit("complete", mockFile);
                                });
                            } else {
                                console.error("Failed to load images: " + data.message);
                            }
                        })
                        .catch(error => console.error("Error fetching images: ", error));
                });
            </script>
        </div>
    </div>
</x-app-layout>
