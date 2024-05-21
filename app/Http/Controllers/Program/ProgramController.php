<?php

namespace App\Http\Controllers\Program;

use App\Http\Controllers\Controller;
use App\Models\course;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $courses = Course::all();

        $images = [
            1 => 'assets/images/program/sd.jpg',
            2 => 'assets/images/program/jarkom.jpg',
            3 => 'assets/images/program/pbo.jpg',
            4 => 'assets/images/program/multi.jpg',
            5 => 'assets/images/program/pwd.jpg',
        ];

        $descriptions = [
            1 => 'Ini Struktur Data',
            2 => 'Ini Jaringan Komputer',
            3 => 'Ini Pemrograman Berorientasi Objek',
            4 => 'Ini Multimedia',
            5 => 'Ini Pemrograman Web',
        ];

        foreach ($courses as $course) {
            $course->image = $images[$course->id] ?? 'assets/images/bg-hero.jpeg';
            $course->description = $descriptions[$course->id] ?? 'Default description';
        }


        return view('users.program.index', compact('courses'));
    }
}
