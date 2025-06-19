<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Edit Subkategori: {{ $subcategory->name }} (Kategori: {{ $category->name }})
        </h1>

        <form action="{{ route('subkategori.update', [$category->id, $subcategory->id]) }}" method="POST"
            class="space-y-4">
            @csrf
            @method('PATCH')

            <div>
                <label for="name" class="block font-medium">Nama Subkategori</label>
                <input type="text" name="name" id="name" value="{{ old('name', $subcategory->name) }}" required
                    class="border p-2 w-full rounded">
            </div>

            <button type="submit" class="btn-pink-cute">Perbarui Subkategori</button>
        </form>

        @if ($errors->any())
            <div class="mt-4 bg-red-100 p-4 rounded">
                <ul class="list-disc list-inside text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</x-app-layout>