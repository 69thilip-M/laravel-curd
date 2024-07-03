<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::get();
        return view('studentdetail.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('studentdetail.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'image' => 'nullable|mimes:png,jpg,jpeg,gif,webp,svg',
            'address' => 'required|max:255|string',
            'class' => 'required|max:255|string',
            'phone' => 'required|max:255|string',
        ]);

        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/studentsimg/';
            $file->move($path, $filename);
        }

        Student::create([
            'name' => $request->name,
            'image' => $path . $filename,
            'address' => $request->address,
            'phone' => $request->phone,
            'class' => $request->class,
        ]);

        return redirect('/students/create')->with('status', 'Student Detail Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);

        return view('studentdetail.edit', compact('student'))->with('status', 'Student Detail Updated Successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'image' => 'nullable|mimes:png,jpg,jpeg,gif,webp,svg',
            'address' => 'required|max:255|string',

            'class' => 'required|max:255|string',
            'phone' => 'required|max:255|string',
        ]);


        $student = Student::findOrFail($id);

        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/studentsimg/';
            $file->move($path, $filename);
        }

        if (File::exists($student->image)) {
            File::delete($student->image);
        }
        ;


        $student->update([
            'name' => $request->name,
            'image' => $path . $filename,
            'address' => $request->address,
            'phone' => $request->phone,
            'class' => $request->class,
        ]);

        return redirect()->back()->with('status', 'Student Detail Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        if (File::exists($student->image)) {
            File::delete($student->image);
        }
        $student->delete();
        return redirect()->back()->with('status', 'Student Detail Deleted Successfully');
    }
}
