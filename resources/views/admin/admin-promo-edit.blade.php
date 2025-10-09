<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Admin Promo
        </h2>
    </x-slot>

    <form method="post" action="{{ isset($promo) ? route('admin.promo.update', $promo->id) : route('admin.promo.store') }}" enctype="multipart/form-data">
        
        @csrf
        @if(isset($promo))
            @method('patch')
        @endif
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        Edit Promo
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ old('title', $promo->title ?? '') }}" required autofocus autocomplete="title" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <x-input-label for="link" :value="__('Link')" />
                        <x-text-input id="link" class="block mt-1 w-full" type="text" name="link" value="{{ old('link', $promo->link ?? '') }}" required autofocus autocomplete="link" />
                        <x-input-error :messages="$errors->get('link')" class="mt-2" />
                    </div>
                    <div class="p-6 ">
                        <x-input-label for="status" :value="__('Status')" />
                        <select id="status" name="status" class="block mt-1 w-full">
                            <option value="1" {{ (old('status', $promo->status ?? '') == '1') ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ (old('status', $promo->status ?? '') == '0') ? 'selected' : '' }}>Inactive</option>
                        </select>
                        
                        <x-input-error :messages="$errors->get('status')" class="mt-2" />
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <x-input-label for="start_date" :value="__('Start Date')" />
                        @if(isset($promo->start_date))
                            <x-text-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" value="{{ old('start_date', date('Y-m-d', strtotime($promo->start_date))) }}" required autofocus autocomplete="start_date" />
                        @else
                            <x-text-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" value="{{ old('start_date') }}" required autofocus autocomplete="start_date" />
                        @endif
                        <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <x-input-label for="end_date" :value="__('End Date')" />
                        @if(isset($promo->end_date))
                            <x-text-input id="end_date" class="block mt-1 w-full" type="date" name="end_date" value="{{ old('end_date', date('Y-m-d', strtotime($promo->end_date))) }}" required autofocus autocomplete="end_date" />
                        @else
                            <x-text-input id="end_date" class="block mt-1 w-full" type="date" name="end_date" value="{{ old('end_date') }}" required autofocus autocomplete="end_date" />
                        @endif
                        <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <x-input-label for="image" :value="__('Image')" />
                        <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" value="{{ old('link', $promo->image ?? '') }}" autofocus autocomplete="image" />
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <button type="button" onclick="window.location='{{ route('admin.promo') }}'" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancel</button>
                        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Update</button>
                    </div>
                </div>
            </div>
        </div>

    </form>

    
</x-app-layout>
