**LAPORAN TUGAS DTS VSGA 2024**

**Laravel Upload Files and Excel**

Disusun Oleh

Nama : Suko Dwi Atmodjo

Email : <2231740034@student.polinema.ac.id>

Mitra Pelatihan : Politeknik Negeri Malang

Tanggal Pelaksanaan : 21 Agustus 2024

**Tugas Praktikum 1**

1\. Pada project sebelumnya, tambahkan migration articles

![](Aspose.Words.1225cf60-cb58-4a48-9341-33f89d80f30f.001.png)

2\. Ubahlah fungsi up() menjadi seperti ini

![](Aspose.Words.1225cf60-cb58-4a48-9341-33f89d80f30f.002.png)

3\. Lalu jalankan perintah migrate untuk menambahkan table

![](Aspose.Words.1225cf60-cb58-4a48-9341-33f89d80f30f.003.png)

4\. Selanjutnya yaitu membuat Controller Article dengan atribut resource beserta modelnya

![](Aspose.Words.1225cf60-cb58-4a48-9341-33f89d80f30f.004.png)

5\. Tambahkan fillable pada modelnya

![](Aspose.Words.1225cf60-cb58-4a48-9341-33f89d80f30f.005.png)

6\. Pada routenya tambahkan route untuk mengakses article

![](Aspose.Words.1225cf60-cb58-4a48-9341-33f89d80f30f.006.png)

7\. Buatlah create view folder articles dan tambahkan kode ini

| <p><x-app-layout></p><p>`    `<div class="container"></p><p>`        `<form action="/articles" method="post" enctype="multipart/form-data"></p><p>`            `@csrf</p><p>`            `<div class="form-group"></p><p>`                `<label for="title">Title: </label></p><p>`                `<input type="text" class="form-control" required="required" name="title"></br></p><p>`                `<label for="content">Content: </label></p><p>`                `<textarea type="text" class="form-control" required="required" name="content"></textarea></br></p><p>`                `<label for="image">Feature Image: </label></p><p>`                `<input type="file" class="form-control" required="required" name="image"></br></p><p>`                `<button type="submit" name="submit"</p><p>`                    `class="btn btn-primary</p><p>`                `float-right">Simpan</button></p><p>`            `</div></p><p>`        `</form></p><p>`    `</div></p><p></x-app-layout></p> |
| :----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |

8\. Pada ArticleController modifikasi function store seperti ini

| <p>public function **store**(Request $request)</p><p>`    `{</p><p>`        `if ($request->**file**('image')) {</p><p>`            `$image_name = $request->**file**('image')->**store**('image', 'public');</p><p>`        `}</p><p>`        `Article::**create**([</p><p>`            `'title' => $request->title,</p><p>`            `'content' => $request->content,</p><p>`            `'featured\_image' => $image\_name</p><p>`        `]);</p><p>`        `return "Berhasil di simpan";</p><p>`    `}</p> |
| :---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |

Dan function index seperti ini

| <p>`    `public function **create**(Request $request)</p><p>`    `{</p><p>`        `return **view**('articles.create');</p><p>`    `}</p> |
| :---------------------------------------------------------------------------------------------------------------------------------------- |

9\. Lalu gunakan perintah untuk mirroring file

![](Aspose.Words.1225cf60-cb58-4a48-9341-33f89d80f30f.007.png)
