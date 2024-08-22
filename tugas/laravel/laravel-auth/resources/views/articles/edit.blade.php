<x-app-layout>
    <div class="container mx-auto px-4 py-16">
        <form action="/articles/{{ $article->id }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Judul</label>
                <input type="text" id="title"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required name="title" value="{{ $article->title }}">
            </div>

            <div class="form-group mt-4">
                <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content</label>
                <textarea id="content" name="content"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>{{ $article->content }}</textarea>
            </div>

            <div class="form-group mt-4">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Feature Image</label>
                <input type="file" id="image" name="image"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
                <img src="{{ asset('storage/' . $article->featured_image) }}"
                    class="mt-4 w-6/12 h-1/2 object-cover rounded-lg">
            </div>

            <div class="form-group mt-4">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline float-right">Ubah
                    Data</button>
            </div>
        </form>
    </div>
</x-app-layout>
