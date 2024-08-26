<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')

</head>

<body>
    <h5 class="text-center text-2xl font-semibold">Laporan Artikel</h5>
    <div class="overflow-x-auto">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Judul</th>
                    <th class="text-center">Isi</th>
                    <th class="text-center">Gambar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $a)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $a->title }}</td>
                        <td class="text-center">{{ $a->content }}</td>
                        <td class="text-center">
                            <img src="{{ $a->featured_image }}" alt="Featured Image"
                                class="w-full max-h-48 object-cover rounded-lg">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
