<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function register_form(){

        return view("register");
    
       }
       public function register(Request $request)
       {
           // Validate the request inputs
           $request->validate([
               'name' => 'required|string|max:255',
               'email' => 'required|email|unique:users,email',
               'password' => 'required|min:3|confirmed',
           ]);
   
           // Create a new user
           $user = User::create([
               'name' => $request->name,
               'email' => $request->email,
               'password' => Hash::make($request->password),
           ]);
   
           // Optionally log the user in or redirect them
           return view('login')->with('success', 'Registration successful! You can now log in.');
       }
    
   public function login_form(){

    return view("login");
   }

   public function login(Request $request)
{
    // Validate login inputs
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:3',
    ]);

    // Attempt to authenticate the user
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        // Authentication successful, redirect to dashboard
        return redirect()->route('admin.dashboard')->with('success', 'Login successful!');
    }

    // Authentication failed, return back with an error
    return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
}

public function admin_dashboard()
{
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

    return view('admin.admin_dashboard', compact('data'));
}


public function admin_bsit() {
    // Check if there is a search term in the request
    if (request()->has('search')) {
        $search = request()->get('search');
        
        // Paginate alumni records related to the BSIT course and apply the search filter
        $course = Course::with(['alumni' => function($query) use ($search) {
            // Apply the search filter if search term is provided
            $query->where('fullname', 'like', '%' . $search . '%')
                  ->orWhere('batch', 'like', '%' . $search . '%')
                  ->orWhere('employment_status_id', 'like', '%' . $search . '%')
                  ->paginate(10); // Adjust the number to your desired records per page
        }])->where('course_code', 'BSIT')->firstOrFail();
    } else {
        // If no search term is provided, just paginate normally
        $course = Course::with(['alumni' => function($query) {
            $query->paginate(10); // Adjust the number to your desired records per page
        }])->where('course_code', 'BSIT')->firstOrFail();
    }

    return view("admin.admin_bsit", compact('course'));
}


public function admin_bshm() {
    // Check if there is a search term in the request
    if (request()->has('search')) {
        $search = request()->get('search');
        
        // Paginate alumni records related to the BSHM course and apply the search filter
        $course = Course::with(['alumni' => function($query) use ($search) {
            // Apply the search filter if search term is provided
            $query->where('fullname', 'like', '%' . $search . '%')
                  ->orWhere('batch', 'like', '%' . $search . '%')
                  ->orWhere('employment_status_id', 'like', '%' . $search . '%')
                  ->paginate(10); // Adjust the number to your desired records per page
        }])->where('course_code', 'BSHM')->firstOrFail();
    } else {
        // If no search term is provided, just paginate normally
        $course = Course::with(['alumni' => function($query) {
            $query->paginate(10); // Adjust the number to your desired records per page
        }])->where('course_code', 'BSHM')->firstOrFail();
    }

    return view("admin.admin_bshm", compact('course'));
}


public function admin_beed() {
    // Check if there is a search term in the request
    if (request()->has('search')) {
        $search = request()->get('search');
        
        // Paginate alumni records related to the BEED course and apply the search filter
        $course = Course::with(['alumni' => function($query) use ($search) {
            // Apply the search filter if search term is provided
            $query->where('fullname', 'like', '%' . $search . '%')
                  ->orWhere('batch', 'like', '%' . $search . '%')
                  ->orWhere('employment_status_id', 'like', '%' . $search . '%')
                  ->paginate(10); // Adjust the number to your desired records per page
        }])->where('course_code', 'BEED')->firstOrFail();
    } else {
        // If no search term is provided, just paginate normally
        $course = Course::with(['alumni' => function($query) {
            $query->paginate(10); // Adjust the number to your desired records per page
        }])->where('course_code', 'BEED')->firstOrFail();
    }

    return view("admin.admin_beed", compact('course'));
}


public function admin_bsba() {
    // Check if there is a search term in the request
    if (request()->has('search')) {
        $search = request()->get('search');
        
        // Paginate alumni records related to the BSBA course and apply the search filter
        $course = Course::with(['alumni' => function($query) use ($search) {
            // Apply the search filter if search term is provided
            $query->where('fullname', 'like', '%' . $search . '%')
                  ->orWhere('batch', 'like', '%' . $search . '%')
                  ->orWhere('employment_status_id', 'like', '%' . $search . '%')
                  ->paginate(10); // Adjust the number to your desired records per page
        }])->where('course_code', 'BSBA')->firstOrFail();
    } else {
        // If no search term is provided, just paginate normally
        $course = Course::with(['alumni' => function($query) {
            $query->paginate(10); // Adjust the number to your desired records per page
        }])->where('course_code', 'BSBA')->firstOrFail();
    }

    return view("admin.admin_bsba", compact('course'));
}


public function manage_account()
{
    $users = User::all(); 
    return view("admin.admin_manage_account", compact('users'));
}


public function settings(){

    return view("admin.admin_settings");
}

public function logout(Request $request)
{
    // Log out the user
    Auth::logout();

    // Invalidate the session
    $request->session()->invalidate();

    // Regenerate the session token
    $request->session()->regenerateToken();

    // Redirect to the login page with a success message
    return redirect()->route('admin.login')->with('success', 'You have been logged out successfully.');
}

public function destroy($id)
{
    $user = User::findOrFail($id); // Find the alumni by ID
    $user->delete(); // Delete the record
    return redirect()->back()->with('success', 'User deleted successfully.');
}



}
