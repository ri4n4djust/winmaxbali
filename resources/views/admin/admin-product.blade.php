<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Admin Product
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6">
                    @if ($products->isEmpty())
                        <p class="text-gray-600 dark:text-gray-400">No Products found.</p>
                    @else
                    <div class="mb-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                        <div class="flex items-center gap-3">
                            <a href="{{ route('admin.products.edit', '0') }}" class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm rounded hover:bg-green-700">
                                + New Product
                            </a>
                            <span class="text-sm text-gray-600 dark:text-gray-400">Total: {{ $products->total() }}</span>
                        </div>

                        <div class="flex items-center gap-2">
                            <script>
                                function submitForm() {
                                    document.getElementById('productSearch').submit();
                                }
                            </script>
                            <form id="productSearch" class="form-inline" method="GET" action="{{ route('admin.products', 'cari') }}">
                                <input
                                    type="text"
                                    name="q"
                                    value="{{ request('q') }}"
                                    placeholder="Search title or content..."
                                    class="text-sm border rounded bg-white"
                                />
                                <select name="perPage" id="perPage" onchange="submitForm()" class="text-sm border rounded bg-white">
                                    <option value="10"{{ request('perPage')==10 ? ' selected' : '' }}>10</option>
                                    <option value="25"{{ request('perPage')==25 ? ' selected' : '' }}>25</option>
                                    <option value="50"{{ request('perPage')==50 ? ' selected' : '' }}>50</option>
                                </select>
                                <button type="submit" class="px-3 py-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">Search</button>
                            </form>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center justify-end">
                        {{ $products->onEachSide(1)->links() }}
                    </div>
                    <div class="overflow-x-auto border border-gray-200 dark:border-gray-700 rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider">Nama</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider">Description</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider">Stock</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider">Price</th>
                                    <th class="px-4 py-3 text-right text-xs font-medium text-gray-600 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-800">
                                @foreach ($products as $page)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                                        <td class="px-4 py-3 align-top whitespace-normal max-w-xs text-sm text-gray-800 dark:text-gray-100">
                                            {{ $page->name }}
                                        </td>

                                        <td class="px-4 py-3 align-top text-sm text-gray-600 dark:text-gray-300">
                                            {{ Str::limit(strip_tags($page->description), 120) }}
                                        </td>

                                        <td class="px-4 py-3 align-top text-sm text-gray-600 dark:text-gray-300">
                                            {{ $page->stock ?? 0 }}
                                        </td>

                                        <td class="px-4 py-3 align-top text-sm text-gray-600 dark:text-gray-300">
                                            {{ number_format($page->price ?? 0, 0, ',', '.') }}
                                        </td>

                                        <td class="px-4 py-3 align-top text-right space-x-2">
                                            <a href="{{ route('admin.products.edit', $page->id) }}" class="inline-block px-3 py-1 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">
                                                <i class="fas fa-pencil-alt"></i> Edit
                                            </a>

                                            <form action="{{ route('admin.products.delete', $page->id) }}" method="POST" onsubmit="return confirm('Delete this Products?');" class="inline-block">
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
                        {{ $products->onEachSide(1)->links() }}
                    </div>
                    
                    <div class="mt-4 text-sm text-gray-600 dark:text-gray-400">
                        Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} entries
                    </div>
                        
                    @endif
                </div>
                

                
            </div>
        </div>
    </div>
</x-app-layout>
