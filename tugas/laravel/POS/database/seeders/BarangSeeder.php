<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $data = [
        //     ['barang_id' => 1, 'kategori_id' => 1, 'barang_kode' => 'BRG001', 'barang_nama' => 'Laptop', 'harga_beli' => 5000000, 'harga_jual' => 6000000],
        //     ['barang_id' => 2, 'kategori_id' => 1, 'barang_kode' => 'BRG002', 'barang_nama' => 'Smartphone', 'harga_beli' => 3000000, 'harga_jual' => 3500000],
        //     ['barang_id' => 3, 'kategori_id' => 2, 'barang_kode' => 'BRG003', 'barang_nama' => 'Kaos', 'harga_beli' => 50000, 'harga_jual' => 75000],
        //     ['barang_id' => 4, 'kategori_id' => 2, 'barang_kode' => 'BRG004', 'barang_nama' => 'Jaket', 'harga_beli' => 150000, 'harga_jual' => 200000],
        //     ['barang_id' => 5, 'kategori_id' => 3, 'barang_kode' => 'BRG005', 'barang_nama' => 'Snack', 'harga_beli' => 10000, 'harga_jual' => 15000],
        //     ['barang_id' => 6, 'kategori_id' => 3, 'barang_kode' => 'BRG006', 'barang_nama' => 'Minuman Ringan', 'harga_beli' => 5000, 'harga_jual' => 8000],
        //     ['barang_id' => 7, 'kategori_id' => 4, 'barang_kode' => 'BRG007', 'barang_nama' => 'Pensil', 'harga_beli' => 2000, 'harga_jual' => 3000],
        //     ['barang_id' => 8, 'kategori_id' => 4, 'barang_kode' => 'BRG008', 'barang_nama' => 'Buku Tulis', 'harga_beli' => 5000, 'harga_jual' => 8000],
        //     ['barang_id' => 9, 'kategori_id' => 5, 'barang_kode' => 'BRG009', 'barang_nama' => 'Oli Mesin', 'harga_beli' => 35000, 'harga_jual' => 50000],
        //     ['barang_id' => 10, 'kategori_id' => 5, 'barang_kode' => 'BRG010', 'barang_nama' => 'Ban Sepeda Motor', 'harga_beli' => 150000, 'harga_jual' => 200000],
        // ];
        // DB::table('m_barang')->insert($data);
        DB::insert(
            "insert into m_barang (barang_id, kategori_id, barang_kode, barang_nama, harga_beli, harga_jual) values (?, ?, ?, ?, ?, ?)",
            [
                [1, 1, 'BRG001', 'Laptop', 5000000, 6000000],
                [2, 1, 'BRG002', 'Smartphone', 3000000, 3500000],
                [3, 2, 'BRG003', 'Kaos', 50000, 75000],
                [4, 2, 'BRG004', 'Jaket', 150000, 200000],
                [5, 3, 'BRG005', 'Snack', 10000, 15000],
                [6, 3, 'BRG006', 'Minuman Ringan', 5000, 8000],
                [7, 4, 'BRG007', 'Pensil', 2000, 3000],
                [8, 4, 'BRG008', 'Buku Tulis', 5000, 8000],
                [9, 5, 'BRG009', 'Oli Mesin', 35000, 50000],
                [10, 5, 'BRG010', 'Ban Sepeda Motor', 150000, 200000],
            ]
        );
    }
}
