<x-app-layout>
    <div class="container mx-auto px-4 py-16">
        <div class="max-w-md mx-auto bg-white rounded shadow-md overflow-hidden md:max-w-lg">
            <div class="md:flex">
                <div class="w-full py-8 px-6 md:w-8/12 md:px-8">
                    <form action="/articles" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                            <input type="text" id="title" name="title"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required>
                        </div>

                        <div class="form-group mt-4">
                            <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content:</label>
                            <textarea id="content" name="content"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required></textarea>
                        </div>

                        <div class="form-group mt-4">
                            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Feature
                                Image:</label>
                            <input type="file" id="image" name="image"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                required>
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" name="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline float-right">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
{{-- <div class="container mx-auto  
 px-4 py-16">
    <div class="max-w-md mx-auto bg-white rounded shadow-md overflow-hidden md:max-w-lg">
        <div class="md:flex">
            <div class="w-full py-8 px-6 md:w-8/12 md:px-8">
                <h2 class="text-2xl font-bold text-gray-900">Login</h2>
                <p class="text-gray-600">Masukkan email dan password Anda</p>
                <form>
                    <div class="mt-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                            Email
                        </label>
                        <input type="email" id="email"
                            class="shadow appearance-none  
 border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Masukkan email">
                    </div>
                    <div class="mt-4 mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Password
                        </label>
                        <input type="password" id="password"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Masukkan password">
                    </div>
                    <div class="flex items-center justify-between">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold  
 py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            Login
                        </button>
                    </div>
                </form>
            </div>
            <div   class="w-full md:w-4/12">
                <img src="https://source.unsplash.com/random" alt="Login Image" class="object-cover h-64 w-full">
            </div>
        </div>
    </div>
</div> --}}
