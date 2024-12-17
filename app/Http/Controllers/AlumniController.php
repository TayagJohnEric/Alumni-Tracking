<?php

namespace App\Http\Controllers;
use App\Models\Alumni;
use App\Models\Course;
use App\Models\EmploymentStatus;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function alumni_form(){

    
        $courses = Course::all();  // Assuming Course is a model that fetches courses from the database
        $employmentStatus = EmploymentStatus::all();  // Assuming EmploymentStatus is a model
        
        return view('alumni_form', compact('courses', 'employmentStatus'));
    
       }

    
       public function store(Request $request)
       {
           // Validation with custom error messages
           $validatedData = $request->validate([
               'employment_status_id' => 'required|exists:employment_status,id',
               'course_id' => 'required|exists:courses,id',
               'fullname' => 'required|string|max:255',
               'age' => 'required|integer|min:18|max:100',
               'dob' => 'required|date',
               'civilstatus' => 'nullable|string|max:50',
               'sex' => 'required|in:Male,Female,Other',
               'religion' => 'nullable|string|max:100',
               'street' => 'nullable|string|max:255',
               'barangay' => 'nullable|string|max:255',
               'municipality' => 'nullable|string|max:255',
               'province' => 'nullable|string|max:255',
               'region' => 'nullable|string|max:255',
               'zipcode' => 'nullable|string|max:10',
               'batch' => 'required|integer|min:1900|max:' . date('Y'),
               'facebook' => 'nullable|string|max:255',
               'organization' => 'nullable|string|max:255',
               'profession' => 'nullable|string|max:255',
               'type' => 'nullable|string|max:50',
               'location' => 'nullable|string|max:255',
               'expectedincome' => 'nullable|integer',
               'relatedfield' => 'nullable|string|max:255',
               'reason' => 'nullable|string',
               'company' => 'nullable|string|max:255',
               'incomerange' => 'nullable|integer',
               'phone' => 'required|string|max:15',
               'email' => 'required|email|unique:alumni,email',
           ], [
               'employment_status_id.required' => 'Employment status is required.',
               'employment_status_id.exists' => 'The selected employment status is invalid.',
               'course_id.required' => 'Course is required.',
               'course_id.exists' => 'The selected course is invalid.',
               'fullname.required' => 'Full Name is required.',
               'fullname.max' => 'Full Name must not exceed 255 characters.',
               'age.required' => 'Age is required.',
               'age.integer' => 'Age must be a valid number.',
               'age.min' => 'Age must be at least 18.',
               'age.max' => 'Age must not exceed 100.',
               'dob.required' => 'Date of Birth is required.',
               'dob.date' => 'Date of Birth must be a valid date.',
               'sex.required' => 'Sex is required.',
               'sex.in' => 'Sex must be Male, Female, or Other.',
               'batch.required' => 'Batch is required.',
               'batch.integer' => 'Batch must be a valid number.',
               'batch.min' => 'Batch must not be earlier than 1900.',
               'batch.max' => 'Batch must not be later than the current year.',
               'phone.required' => 'Phone Number is required.',
               'phone.max' => 'Phone Number must not exceed 15 characters.',
               'email.required' => 'Email is required.',
               'email.email' => 'Email must be a valid email address.',
               'email.unique' => 'This email is already in use.',
           ]);
       
           // Store Data
           Alumni::create($validatedData);
       
           // Redirect or Respond
           return redirect()->back()->with('success', 'Alumni information has been added successfully.');
       }
       


public function show($id)
{
    $alumni = Alumni::findOrFail($id); // Retrieve alumni by ID
    return view('admin.profile_show', compact('alumni')); // Pass alumni data to the view
}

public function destroy($id)
{
    $alumnus = Alumni::findOrFail($id); // Find the alumni by ID
    $alumnus->delete(); // Delete the record
    return redirect()->back()->with('success', 'Alumnus deleted successfully.');
}




       
}