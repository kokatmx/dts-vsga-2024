<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['penjualan_id' => 1, 'user_id' => 1, 'pembeli' => 'John Doe', 'penjualan_kode' => 'TRX001', 'penjualan_tgl' => date('2024-07-23')],
            ['penjualan_id' => 2, 'user_id' => 1, 'pembeli' => 'Jane Doe', 'penjualan_kode' => 'TRX002', 'penjualan_tgl' => date('2024-07-24')],
            ['penjualan_id' => 3, 'user_id' => 1, 'pembeli' => 'Alice', 'penjualan_kode' => 'TRX003', 'penjualan_tgl' => date('2024-07-25')],
            ['penjualan_id' => 4, 'user_id' => 2, 'pembeli' => 'Bob', 'penjualan_kode' => 'TRX004', 'penjualan_tgl' => date('2024-07-23')],
            ['penjualan_id' => 5, 'user_id' => 2, 'pembeli' => 'Charlie', 'penjualan_kode' => 'TRX005', 'penjualan_tgl' => date('2024-07-24')],
            ['penjualan_id' => 6, 'user_id' => 2, 'pembeli' => 'David', 'penjualan_kode' => 'TRX006', 'penjualan_tgl' => date('2024-07-25')],
            ['penjualan_id' => 7, 'user_id' => 3, 'pembeli' => 'Eve', 'penjualan_kode' => 'TRX007', 'penjualan_tgl' => date('2024-07-23')],
            ['penjualan_id' => 8, 'user_id' => 3, 'pembeli' => 'Frank', 'penjualan_kode' => 'TRX008', 'penjualan_tgl' => date('2024-07-24')],
            ['penjualan_id' => 9, 'user_id' => 3, 'pembeli' => 'Grace', 'penjualan_kode' => 'TRX009', 'penjualan_tgl' => date('2024-07-25')],
            ['penjualan_id' => 10, 'user_id' => 3, 'pembeli' => 'Heidi', 'penjualan_kode' => 'TRX010', 'penjualan_tgl' => date('2024-07-26')],
        ];
        DB::table('t_penjualan')->insert($data);
    }
}
