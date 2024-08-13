<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Extracurricular;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::whereNull('deleted_at')->get();

        return view('content.pages.pages-students', compact('students'));
    }

    //view
    public function createStudent()
    {
        return view('content.pages.form-create-student');
    }

    //view
    public function editStudent($id)
    {
        $student = Student::findOrFail($id);

        return view('content.pages.form-edit-student', compact('student'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'student_number' => 'required|string|max:20|unique:students',
            'address' => 'required|string|max:255',
            'gender' => 'required|string|in:male,female',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $defaultPhotoPath = 'assets/img/avatars/4.png';

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->store('public/photos');
            $photoPath = str_replace('public/', 'storage/', $photoPath);
        } else {
            $photoPath = $defaultPhotoPath;
        }

        $student = Student::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone_number' => $request->input('phone_number'),
            'student_number' => $request->input('student_number'),
            'address' => $request->input('address'),
            'gender' => $request->input('gender'),
            'photo' => $photoPath,
        ]);

        return redirect()->back()->with('status', 'Student created successfully!');
    }

    public function indexWithExtracurriculars()
    {
        $students = Student::with('extracurriculars')->get();

        return view('content.pages.pages-students-extra', compact('students'));
    }

    public function show($id)
    {
        $student = Student::find($id);

        if ($student) {
            return response()->json($student);
        } else {
            return response()->json(['message' => 'Student not found'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'student_number' => 'required|string|max:20|unique:students,student_number,' . $id,
            'address' => 'required|string|max:255',
            'gender' => 'required|string|in:male,female',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo if it exists
            if ($student->photo && Storage::exists('public/' . $student->photo)) {
                Storage::delete('public/' . $student->photo);
            }
            $student->photo = $request->file('photo')->store('photos', 'public');
        }

        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->phone_number = $request->input('phone_number');
        $student->student_number = $request->input('student_number');
        $student->address = $request->input('address');
        $student->gender = $request->input('gender');

        $student->save();

        return redirect()->route('pages-students-edit', $student->id)
        ->with('status', 'Student updated successfully!');
    }

    public function delete($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        // Delete photo if it exists
        if ($student->photo && Storage::exists('public/' . $student->photo)) {
            Storage::delete('public/' . $student->photo);
        }

        $student->delete();

        return redirect()->route('pages-students')
        ->with('status', 'Student deleted successfully!');
    }

    public function showWithExtracurriculars($id)
    {
        $student = Student::with('extracurriculars')->find($id);
        $extracurriculars = Extracurricular::all();
    
        if ($student) {
            return view('content.pages.pages-students-extra-detail', compact('student', 'extracurriculars'));
        } else {
            return redirect()->route('pages-students-extra')->with('error', 'Student not found');
        }
    }


    //view
    public function editExtra($studentId, $extracurricularId)
    {
        $student = Student::with('extracurriculars')->findOrFail($studentId);
        $extracurricular = $student->extracurriculars()->wherePivot('extracurricular_id', $extracurricularId)->first();

        if ($extracurricular) {
            $allExtracurriculars = Extracurricular::all();
            return view('content.pages.form-edit-extra', compact('student', 'extracurricular', 'allExtracurriculars'));
        } else {
            return redirect()->route('pages-students-extra-detail', ['id' => $studentId]);
        }
    }

    public function createExtra(Request $request, $studentId)
    {
        $request->validate([
            'extracurricular_id' => 'required|exists:extracurriculars,id',
            'start_year' => 'required|integer',
        ]);

        $student = Student::findOrFail($studentId);
        
        $student->extracurriculars()->syncWithoutDetaching([
            $request->input('extracurricular_id') => ['start_year' => $request->input('start_year')]
        ]);

        return redirect()->route('pages-students-extra-detail', $studentId)->with('success', 'Extracurricular added successfully!');
    }


    public function updateExtra(Request $request, $studentId, $extracurricularId)
    {
        $request->validate([
            'extracurricular_id' => 'required|exists:extracurriculars,id',
            'start_year' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        $student = Student::findOrFail($studentId);
        $student->extracurriculars()->updateExistingPivot($extracurricularId, [
            'extracurricular_id' => $request->input('extracurricular_id'),
            'start_year' => $request->input('start_year'),
        ]);

        return redirect()->route('pages-edit-extra', ['studentId' => $studentId, 'extracurricularId' => $extracurricularId])
                        ->with('success', 'Extracurricular updated successfully!');
    }

    public function deleteExtra($studentId, $extracurricularId)
    {
        $student = Student::findOrFail($studentId);

        if ($student->extracurriculars()->wherePivot('extracurricular_id', $extracurricularId)->exists()) {
            $student->extracurriculars()->detach($extracurricularId);

            return redirect()->route('pages-students-extra-detail', ['id' => $studentId])
                            ->with('success', 'Extracurricular successfully removed from student');
        } else {
            return redirect()->route('pages-students-extra-detail', ['id' => $studentId])
                            ->with('error', 'Extracurricular not found for this student');
        }
    }



    
    
}
