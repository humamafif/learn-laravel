<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Products') }}
            </h2>
            <a href="{{ route('products.create') }}" class="py-2 px-4 bg-indigo-700 text-white rounded-full">
                Add New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                <table class="table-auto">
                    <thead>
                        <tr>
                            <th>IMAGE</th>
                            <th>TITLE</th>
                            <th>PRICE</th>
                            <th>STOCK</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td class="text-center">
                                    <img src="{{ asset('/storage/products/' . $product->image) }}" class="rounded"
                                        style="width: 150px">
                                </td>
                                <td>{{ $product->title }}</td>
                                <td>{{ 'Rp ' . number_format($product->price, 2, ',', '.') }}</td>
                                <td>{{ $product->stock }}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('products.destroy', $product->id) }}" method="POST">
                                        <a href="{{ route('products.edit', $product->id) }}"
                                            class="py-2 px-4 bg-indigo-700 text-white rounded-full">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="py-2 px-4 bg-red-700 text-white rounded-full">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <div class="bg-red-700 text-white px-4 py-3" role="alert">
                                Data Products belum ada.
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
