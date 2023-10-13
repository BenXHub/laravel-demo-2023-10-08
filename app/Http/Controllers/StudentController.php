<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    /**
     * List all students.
     */
    public function index()
    {
        $students = Student::all();
        return view('student.index', [
            'students' => $students
        ]);
    }

    /**
     * Display single student record.
     * @param $id
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view('student.show', [
            'student' => $student
        ]);
    }


    /**
     * Display create new student form.
     */
    public function create()
    {
        return view('student.create');
    }


    /**
     * Insert new student.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        /*
        $student = new Student();
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->is_male = $request->is_male;
        $student->save();
        */

        $this->validate($request, [
            'first_name' => 'required',
            'last_name'  => 'required',
            'is_male'    => 'required'
        ]);

        Student::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'is_male'    => $request->is_male
        ]);

        session()->flash('success', 'Student created successfully!');

        return redirect()->route('student_index');
    }

    /**
     * Display the form for editing a student.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return redirect()->route('student_index')->with('error', 'Student not found');
        }

        return view('student.edit', [
            'student' => $student
        ]);
    }

    /**
     * Update student information.
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'is_male' => 'required'
            // Add more validation rules for other fields if necessary
        ]);

        // Find the student record you want to update
        $student = Student::find($id);

        if (!$student) {
            return redirect()->route('student_index')->with('error', 'Student not found');
        }

        // Update the student record with the new data
        $student->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'is_male' => $request->is_male
            // Update other fields as needed
        ]);

        return redirect()->route('student_show', ['id' => $student->id])->with('success', 'Student updated successfully');
    }

    /**
     * Delete student information.
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Find the student record
        $student = Student::find($id);

        // If the student record is found, delete it
        if ($student) {
            $student->delete();
            return redirect()->route('student_index')->with('success', 'Student deleted successfully');
        } else {
            return redirect()->route('student_index')->with('error', 'Student not found');
        }
    }
}
