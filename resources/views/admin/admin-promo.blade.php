<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Admin Promo
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    List Promo
                    <a href="{{ route('admin.promo.create') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Add Promo</a>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">No</th>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Aksi</th>
                                <th class="px-4 py-2">Status</th>
                                <th class="px-4 py-2">Start</th>
                                <th class="px-4 py-2">End</th>
                                <th class="px-4 py-2">Images</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($promos as $promo)
                            <tr>
                                <td class="border px-4 py-2">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="border px-4 py-2">{{ $promo->title }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('admin.promo.edit', $promo->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                    <!-- <button onclick="confirmDelete({{ $promo->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button> -->
                                    <button id="deleteButton{{ $promo->id }}" data-slug="{{ $promo->id }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                    <script>
                                        document.getElementById('deleteButton{{ $promo->id }}').addEventListener('click', function () {
                                            const slug = this.getAttribute('data-slug');
                                            Swal.fire({
                                                title: 'Are you sure?',
                                                text: "You won't be able to undo this action!",
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#d33',
                                                cancelButtonColor: '#3085d6',
                                                confirmButtonText: 'Yes, delete it!',
                                                cancelButtonText: 'Cancel'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    // Send DELETE request via AJAX
                                                    fetch(`/admin-promo/delete/${slug}`, {
                                                        method: 'delete',
                                                        headers: {
                                                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                                        }
                                                    })
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        if (data.success) {
                                                            Swal.fire('Deleted!', data.message, 'success');
                                                            window.location.reload();
                                                        } else {
                                                            Swal.fire('Error', data.message, 'error');
                                                        }

                                                    })
                                                    .catch(() => {
                                                        Swal.fire('Error', 'Something went wrong.', 'error');
                                                    });
                                                }
                                            });
                                        });
                                    </script>
                                </td>
                                <td class="border px-4 py-2">
                                    @if ($promo->status == 1)
                                        <span class="text-green-500">Active</span>
                                    @else
                                        <span class="text-red-500">inActive</span>
                                    @endif
                                </td>

                                <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($promo->start_date)->format('d-m-Y') }}</td>
                                <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($promo->end_date)->format('d-m-Y') }}</td>
                                <td class="border px-4 py-2">
                                    <img src="{{ asset('/images/'.$promo->image) }}" alt="{{ $promo->image }}" class="w-20 h-20 object-cover">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
    
</x-app-layout>
