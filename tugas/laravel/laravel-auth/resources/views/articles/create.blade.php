<x-app-layout>
    <div class="container">
        <div class="card bg-slate-50 shadow-xl text-black">
            <div class="card-body">
                <h2 class="card-title">Create New Article</h2>
                <form action="/articles" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-control">
                        <label class="label">Title:</label>
                        <input type="text"
                            class="input input-bordered w-full dark:bg-gray-800 dark:text-white light:bg-white light:text-gray-700"
                            required="required" name="title">
                    </div>
                    <div class="form-control">
                        <label class="label">Content:</label>
                        <textarea
                            class="textarea textarea-bordered h-24 w-full dark:bg-gray-800 dark:text-white light:bg-white light:text-gray-700"
                            required="required" name="content"></textarea>
                    </div>
                    <div class="form-control">
                        <label class="label">Feature Image:</label>
                        <input type="file"
                            class="file-input file-input-bordered w-full dark:bg-gray-800 dark:text-white light:bg-white light:text-gray-700 "
                            required="required" name="image">
                    </div>
                    <div class="form-control mt-6">
                        <button type="submit" class="btn btn-primary btn-wide">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
