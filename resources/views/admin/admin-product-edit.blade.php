<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Product
        </h2>
    </x-slot>

    @php
        // Ensure $products exists and is an object so template can safely use $products->...
        if (!isset($products) || is_null($products)) {
            try {
                $maxId = \Illuminate\Support\Facades\DB::table('products')->max('id'); // adjust table name if needed
                $nextId = is_null($maxId) ? 1 : ((int)$maxId + 1);
            } catch (\Throwable $e) {
                $nextId = 1;
            }
            $products = (object) ['id' => $nextId, 'name' => '', 'description' => '', 'category_id' => '', 'slug' => '', 'meta_description' => '', 'meta_keywords' => '', 'image' => ''];
        } elseif (is_array($products)) {
            $products = (object) $products;
        }
    @endphp

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <input type="hidden" name="idp" id="idp" value="{{ $products->id }}">
                <div class="p-4">
                    <x-input-label for="album" :value="__('Tittle')" />
                    <input type="text" name="name" id="name" value="{{ $products->name }}" class="block mt-1 w-full" >
                    <input type="hidden" name="imgb" id="imgb" value="{{ $products->image }}" >
                    <x-input-error :messages="$errors->get('album')" class="mt-2" />
                </div>
                
                <div class="p-4">
                    <x-input-label for="editor" :value="__('editor')" />
                    <textarea name="editor" id="editor">{{$products->description}}</textarea>
                    <x-input-error :messages="$errors->get('editor')" class="mt-2" />
                </div>
                <div class="p-4">
                    <x-input-label for="category" :value="__('Blog Type')" />
                    <select name="category" id="category" class="block mt-1 w-full">
                        <option value="">{{ __('-- Select Product Type --') }}</option>
                        @foreach(($category ?? []) as $key => $bt)
                            @php
                                // support collection of objects, associative arrays, or simple key=>label pairs
                                $value = is_object($bt) ? ($bt->code_cat ?? $bt->value ?? $key) : (is_array($bt) ? ($bt['code_cat'] ?? $bt['value'] ?? $key) : $key);
                                $label = is_object($bt) ? ($bt->name ?? $bt->name ?? $bt) : (is_array($bt) ? ($bt['name'] ?? $bt['name'] ?? $bt) : $bt);
                                $current = old('category_id', $products->category_id ?? $products->category_id ?? $products->category_id ?? '');
                                $sel = ((string)$current === (string)$value) ? 'selected' : '';
                            @endphp
                            <option value="{{ $value }}" {{ $sel }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                </div>
                <div class="p-4">
                    <x-input-label for="slug" :value="__('Slug')" />
                    <input type="text" name="slug" id="slug" value="{{ $products->slug }}" class="block mt-1 w-full" >
                    <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                </div>
                <div class="p-4">
                    <x-input-label for="meta_desc" :value="__('Meta Desc')" />
                    <input type="text" name="meta_description" id="meta_description" value="{{ $products->meta_description }}" class="block mt-1 w-full" >
                    <x-input-error :messages="$errors->get('meta_description')" class="mt-2" />
                </div>
                <div class="p-4">
                    <x-input-label for="meta_keywords" :value="__('Meta Keywords')" />
                    <input type="text" name="meta_keywords" id="meta_keywords" value="{{ $products->meta_keywords }}" class="block mt-1 w-full" >
                    <x-input-error :messages="$errors->get('meta_keywords')" class="mt-2" />
                </div>
                <script>
                    var myGlobalVar = "";
                    ClassicEditor
                    .create(document.querySelector('#editor'))
                    .then(editor => {
                        // console.log('Editor was initialized', editor);

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

                
                
                <div class="p-4 text-gray-900 dark:text-gray-100">
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
                        Dropzone.options.imageUpload = {
                            maxFilesize: 10, // Set maximum file size to 10 MB
                            acceptedFiles: ".jpeg,.jpg,.png,.gif,.bmp,.webp", // Accept only image files
                            addRemoveLinks: true,
                            dictRemoveFileConfirmation: "Are you sure you want to delete this file?",
                            dictDefaultMessage: "Drop files here or click to upload.",
                            dictFallbackMessage: "Your browser does not support drag and drop file uploads.",
                            dictInvalidFileType: "You can't upload files of this type.",
                            dictCancelUpload: "Cancel upload",
                            dictCancelUploadConfirmation: "Are you sure you want to cancel this upload?",
                            dictUploadCanceled: "Upload canceled.",
                            dictUploadAborted: "Upload aborted.",
                            // maxFiles: 1, // Set maximum number of files
                            url: "/dropzone/store-product", 
                            init: function() {
                                this.on("sending", function(file, xhr, formData) {
                                    // Read latest values from the DOM/editor at the time of sending
                                    let id_album = document.getElementById('idp').value;
                                    let name = document.getElementById('name').value;
                                    let slug = document.getElementById('slug').value;
                                    let category = document.getElementById('category').value;
                                    let meta_description = document.getElementById('meta_description').value;
                                    let meta_keywords = document.getElementById('meta_keywords').value;
                                    let content = window.myGlobalVar || document.querySelector('#editor').value || '';
                                    formData.append("idal", id_album);
                                    formData.append("_token", '{{ csrf_token() }}');
                                    formData.append("name", name);
                                    formData.append("slug", slug);
                                    formData.append("type", category);
                                    formData.append("meta_description", meta_description);
                                    formData.append("meta_keywords", meta_keywords);
                                    formData.append("content", content);
                                    // Debugging
                                    // console.log('Uploading with:', { file });
                                });
                                this.on("success", function(file, response) {
                                    if (response.success) {
                                        uploadedFiles.push(response.file_name);
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
                                    let fileName = fileNameDisplay ? fileNameDisplay.textContent : file.name;
                                    let id_album = document.getElementById('idp').value;
                                    $.ajax({
                                        type: 'delete',
                                        url: '{{ route('dropzone.deleteProduct') }}',
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

                                var dz = this;
                                let id_album = document.getElementById('idp').value;

                                // Load existing images for this blog (expects JSON: { files: ["img1.jpg","img2.png"] })
                                let existingValue = document.getElementById('imgb').value;
                                if (existingValue && existingValue.trim() !== '') {
                                    try {
                                        let files = [];
                                        const trimmed = existingValue.trim();
                                        if (trimmed.startsWith('[')) {
                                            // stored as JSON array
                                            files = JSON.parse(trimmed);
                                        } else if (trimmed.indexOf(',') !== -1) {
                                            // stored as comma separated list
                                            files = trimmed.split(',').map(s => s.trim()).filter(Boolean);
                                        } else {
                                            // single filename
                                            files = [trimmed];
                                        }

                                        files.forEach(function(fileName) {
                                            var mockFile = { name: fileName, size: 12345 };
                                            dz.emit("addedfile", mockFile);
                                            dz.emit("thumbnail", mockFile, "/storage/product/" + fileName);
                                            dz.emit("complete", mockFile);
                                            uploadedFiles.push(fileName);
                                            dz.files.push(mockFile);
                                        });

                                        // skip server fetch since we already have the image(s) from the products data
                                        return;
                                    } catch (err) {
                                        console.error("Error parsing existing images from imgb:", err);
                                        // fall through to fetch as a fallback
                                    }
                                }
                                
                            }
                            
                        };
                        
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
