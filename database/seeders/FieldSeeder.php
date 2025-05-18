<?php

namespace Database\Seeders;
use App\Models\Field;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Field::insert([
            [
                'nama_lapangan' => 'Lapangan Futsal A',
                'tipe_lapangan' => 'futsal',
                'lokasi' => 'Jl. Kenangan No. 1',
                'harga_per_jam' => 75000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lapangan' => 'Lapangan Badminton B',
                'tipe_lapangan' => 'badminton',
                'lokasi' => 'Jl. Pemuda No. 2',
                'harga_per_jam' => 50000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
