<x-app-layout>
    <div class="container">
        <div class="card bg-base-200 shadow-xl">
            <div class="card-body">
                <h2 class="card-title">Update Article</h2>
                <form action="/articles/{{ $article->id }}" method="POST" enctype="multipart/form-data"">
                    @method('PUT')
                    @csrf
                    <div class="form-control">
                        <label class="label">Title:</label>
                        <input type="text" class="input input-bordered w-full" required="required" name="title"
                            value="{{ $article->title }}">
                    </div>
                    <div class="form-control">
                        <label class="label">Content:</label>
                        <textarea class="textarea textarea-bordered h-24 w-full" required="required" name="content">{{ $article->content }}</textarea>
                    </div>
                    <div class="form-control">
                        <label class="label">Featured Image:</label>
                        <input type="file" class="file-input file-input-bordered w-full" required="required"
                            name="image">
                        <img src="{{ asset('storage/' . $article->featured_image) }}"
                            class="w-full max-h-60 object-cover rounded-lg mt-4" alt="Featured Image">
                    </div>
                    <div class="form-control mt-6">
                        <button type="submit" class="btn btn-primary btn-wide">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
