<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function public_dashboard(){
        $data = Course::with(['alumni.employmentStatus'])
        ->get()
        ->map(function ($course) {
            // Group alumni by employment_status_id and count
            $statuses = $course->alumni->groupBy('employment_status_id')->map(function ($alumni) {
                return $alumni->count();
            });

            return [
                'course_name' => $course->course_name, // Correct field from your Course model
                'total' => $course->alumni->count(),
                'employed' => $statuses->get(1, 0), // Assuming EmploymentStatus ID 1 = Employed
                'unemployed' => $statuses->get(2, 0), // Assuming EmploymentStatus ID 2 = Unemployed
                'self_employed' => $statuses->get(3, 0), // Assuming EmploymentStatus ID 3 = Self-Employed
            ];
        });

        return view("public.public_dashboard", compact('data'));
    }








    public function public_bsit()
    {
        $search = request()->get('search', ''); // Get the search term, default to empty
    
        // Fetch the BSIT course
        $course = Course::where('course_code', 'BSIT')->firstOrFail();
    
        // Query alumni with the search term
        $alumniQuery = $course->alumni()->where(function ($query) use ($search) {
            $query->where('fullname', 'like', '%' . $search . '%')
                  ->orWhere('batch', 'like', '%' . $search . '%')
                  ->orWhere('employment_status_id', 'like', '%' . $search . '%');
        });
    
        // Paginate alumni
        $alumni = $alumniQuery->paginate(10);
    
        return view('public.public_bsit', compact('course', 'alumni'));
    }
    








    public function public_bshm(){

        $search = request()->get('search', ''); // Get the search term, default to empty
    
        // Fetch the BSIT course
        $course = Course::where('course_code', 'BSHM')->firstOrFail();
    
        // Query alumni with the search term
        $alumniQuery = $course->alumni()->where(function ($query) use ($search) {
            $query->where('fullname', 'like', '%' . $search . '%')
                  ->orWhere('batch', 'like', '%' . $search . '%')
                  ->orWhere('employment_status_id', 'like', '%' . $search . '%');
        });
    
        // Paginate alumni
        $alumni = $alumniQuery->paginate(10);
    
        return view('public.public_bshm', compact('course', 'alumni'));
    }





    
    public function public_bsba(){

        $search = request()->get('search', ''); // Get the search term, default to empty
    
        // Fetch the BSIT course
        $course = Course::where('course_code', 'BSBA')->firstOrFail();
    
        // Query alumni with the search term
        $alumniQuery = $course->alumni()->where(function ($query) use ($search) {
            $query->where('fullname', 'like', '%' . $search . '%')
                  ->orWhere('batch', 'like', '%' . $search . '%')
                  ->orWhere('employment_status_id', 'like', '%' . $search . '%');
        });
    
        // Paginate alumni
        $alumni = $alumniQuery->paginate(10);
    
        return view('public.public_bsba', compact('course', 'alumni'));
    }






    public function public_beed(){

        $search = request()->get('search', ''); // Get the search term, default to empty
    
        // Fetch the BSIT course
        $course = Course::where('course_code', 'BEED')->firstOrFail();
    
        // Query alumni with the search term
        $alumniQuery = $course->alumni()->where(function ($query) use ($search) {
            $query->where('fullname', 'like', '%' . $search . '%')
                  ->orWhere('batch', 'like', '%' . $search . '%')
                  ->orWhere('employment_status_id', 'like', '%' . $search . '%');
        });
    
        // Paginate alumni
        $alumni = $alumniQuery->paginate(10);
    
        return view('public.public_beed', compact('course', 'alumni'));
    }
}