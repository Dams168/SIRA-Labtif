<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert([
            [
                'name' => 'Struktur Data',
                'image' => 'assets/images/program/sd.jpg',
                'description' => 'Mempelajari berbagai cara menyimpan dan mengelola data secara efisien.'
            ],
            [
                'name' => 'Jaringan Komputer',
                'image' => 'assets/images/program/jarkom.jpg',
                'description' => 'Mengenal dasar-dasar jaringan komputer dan cara membangun koneksi yang aman dan stabil.'
            ],
            [
                'name' => 'Pemrograman Berorientasi Objek',
                'image' => 'assets/images/program/pbo.jpg',
                'description' => 'Memahami konsep dasar pemrograman yang berfokus pada objek dan kelas.'
            ],
            [
                'name' => 'Multimedia',
                'image' => 'assets/images/program/multi.jpg',
                'description' => 'Belajar menggabungkan teks, gambar, audio, dan video untuk membuat konten menarik.'
            ],
            [
                'name' => 'Pemrograman Web',
                'image' => 'assets/images/program/pwd.jpg',
                'description' => 'Mempelajari cara membuat dan mengelola situs web interaktif.'
            ],
        ]);
    }
}
