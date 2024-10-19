<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\course;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $courses = course::all();
        return view('admin.course.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.course.create');
    }

    public function store(Request $request)
    {
        $course = new course();
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $defaultImage = 'assets/images/bg-hero.jpeg';
        if ($request->hasFile('image')) {

            $path = $request->file('image')->storeAs(
                'public/course',
                'course_' . $course->name . '.' . $request->file('image')->extension()
            );
            $validated['image'] = basename($path);
        } else {
            $validated['image'] = $defaultImage;
        }

        course::create($validated);

        $notification = array(
            'message' => 'Course created successfully',
            'alert-type' => 'success'
        );

        if ($request->save == true) {
            return redirect()->route('kelola.course')->with($notification);
        } else {
            return redirect()->route('admin.course.create')->with($notification);
        }
    }

    public function edit($id)
    {
        $course = course::findOrFail($id);
        return view('admin.course.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $course = course::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048' ?? $course->image,
        ]);

        $defaultImage = 'assets/images/bg-hero.jpeg';
        if ($request->hasFile('image')) {
            Storage::delete('public/course/' . basename($course->image));
            $path = $request->file('image')->storeAs(
                'public/course',
                'course_' . $course->name . '.' . $request->file('image')->extension()
            );
            $validated['image'] = basename($path);
        } else {
            $validated['image'] = $defaultImage;
        }
        $course->update($validated);

        $notification = array(
            'message' => 'Course updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('kelola.course')->with($notification);
    }

    public function destroy($id)
    {
        $course = course::findOrFail($id);
        $course->delete();

        Storage::delete('public/course/' . basename($course->image));

        $notification = array(
            'message' => 'Course deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('kelola.course')->with($notification);
    }
}
