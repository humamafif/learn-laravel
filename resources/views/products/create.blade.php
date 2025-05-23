<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">


                <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @csrf
                    {{-- USING IMAGE PREVIEW --}}
                    <div class="flex justify-center">
                        <div class="flex flex-col" x-data="{ imageUrl: null }">
                            <div class="mb-4" x-show="imageUrl" style="display: none">

                                <img x-bind:src="imageUrl" class="max-w-xs rounded border border-gray-200"
                                    alt="Preview image">
                            </div>

                            <template x-if="!imageUrl">
                                <p
                                    class="text-sm text-black mb-4 py-12
                                px-4 bg-gray-100 rounded-md">
                                    No image selected yet</p>
                            </template>

                            <input type="file" id="image" name="image" class="hidden"
                                x-on:change="imageUrl = URL.createObjectURL($event.target.files[0])">
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />

                            <label for="image"
                                class="cursor-pointer px-4 py-2 bg-gray-200 rounded-md text-gray-700 hover:bg-gray-300 mb-4 flex justify-center">
                                Select Image
                            </label>
                        </div>
                    </div>

                    {{-- <div class="mt-4">
                        <x-input-label for="image" :value="__('image')" />
                        <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" required
                            autofocus autocomplete="image" />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div> --}}

                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                            :value="old('title')" required autofocus autocomplete="title" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="category_id" :value="__('Category')" />
                        <select id="category_id" name="category_id"
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            required>
                            <option value="">Select a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ strtoupper($category->name) }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="description" :value="__('Description')" />
                        <x-text-input id="description" class="block mt-1 w-full" type="text" name="description"
                            :value="old('description')" required autofocus autocomplete="description" />
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="price" :value="__('Price')" />
                        <x-text-input id="price" class="block mt-1 w-full" type="number" name="price"
                            :value="old('price')" required autofocus autocomplete="price" />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="stock" :value="__('Stock')" />
                        <x-text-input id="stock" class="block mt-1 w-full" type="number" name="stock"
                            :value="old('stock')" required autofocus autocomplete="stock" />
                        <x-input-error :messages="$errors->get('stock')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Add New Product
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
