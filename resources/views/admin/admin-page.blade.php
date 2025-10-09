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
                    <table class="table-auto w-full text-gray-800 dark:text-gray-200 leading-tight">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Title</th>
                                <th class="px-4 py-2">Content</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pages as $page)
                                <tr>
                                    <td class="border px-4 py-2">{{ $page->title }}</td>
                                    <td class="border px-4 py-2">{{ Str::limit(strip_tags($page->content), 100) }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('admin.page.edit', $page->id) }}" class="btn btn-primary">Edit</a>
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
