<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Admin Blog
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6">
                    @if ($blogs->isEmpty())
                        <p class="text-gray-600 dark:text-gray-400">No blogs found.</p>
                    @else
                    <div class="mb-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                        <div class="flex items-center gap-3">
                            <a href="{{ route('admin.blog.edit', '0') }}" class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm rounded hover:bg-green-700">
                                + New Blog
                            </a>
                            <span class="text-sm text-gray-600 dark:text-gray-400">Total: {{ $blogs->total() }}</span>
                        </div>

                        <div class="flex items-center gap-2">
                            <form method="GET" class="flex items-center gap-2">
                                <input
                                    type="text"
                                    name="q"
                                    value="{{ request('q') }}"
                                    placeholder="Search title or content..."
                                    class="px-3 py-2 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-sm rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                                />
                                <select name="perPage" onchange="this.form.submit()" class="px-2 py-2 text-sm border rounded bg-white dark:bg-gray-900 dark:border-gray-700">
                                    <option value="10"{{ request('perPage')==10 ? ' selected' : '' }}>10</option>
                                    <option value="25"{{ request('perPage')==25 ? ' selected' : '' }}>25</option>
                                    <option value="50"{{ request('perPage')==50 ? ' selected' : '' }}>50</option>
                                </select>
                                <button type="submit" class="px-3 py-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">Search</button>
                            </form>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center justify-end">
                        {{ $blogs->onEachSide(1)->links() }}
                    </div>
                    <div class="overflow-x-auto border border-gray-200 dark:border-gray-700 rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider">Title</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider">Excerpt</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider">Created</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-800">
                                @foreach ($blogs as $page)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                                        <td class="px-4 py-3 align-top whitespace-normal max-w-xs text-sm text-gray-800 dark:text-gray-100">
                                            {{ $page->title }}
                                        </td>

                                        <td class="px-4 py-3 align-top text-sm text-gray-600 dark:text-gray-300">
                                            {{ Str::limit(strip_tags($page->content), 120) }}
                                        </td>

                                        <td class="px-4 py-3 align-top text-sm text-gray-600 dark:text-gray-300">
                                            {{ optional($page->created_at)->format('Y-m-d') ?? '-' }}
                                        </td>

                                        <td class="px-4 py-3 align-top text-sm">
                                            @if (isset($page->published) && $page->published)
                                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">Published</span>
                                            @else
                                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">Draft</span>
                                            @endif
                                        </td>

                                        <td class="px-4 py-3 align-top text-right space-x-2">
                                            <a href="{{ route('admin.blog.edit', $page->id) }}" class="inline-block px-3 py-1 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">Edit</a>

                                            <form action="{{ route('admin.blog.delete', $page->id) }}" method="POST" onsubmit="return confirm('Delete this blog?');" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1 bg-red-600 text-white text-sm rounded hover:bg-red-700">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 flex items-center justify-end">
                        {{ $blogs->onEachSide(1)->links() }}
                    </div>
                    
                    <div class="mt-4 text-sm text-gray-600 dark:text-gray-400">
                        Showing {{ $blogs->firstItem() }} to {{ $blogs->lastItem() }} of {{ $blogs->total() }} entries
                    </div>
                        
                    @endif
                </div>
                

                
            </div>
        </div>
    </div>
</x-app-layout>
