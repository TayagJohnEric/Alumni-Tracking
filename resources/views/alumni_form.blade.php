<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alumni Information Form</title>
  <style>
    /* General Styles */
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      color: #333;
      margin: 0;
      padding: 20px;
    }
    .error {
        color: red;
        font-size: 0.9em;
    }

    h2 {
      color: rgb(144, 40, 40);
      margin: 0;
      margin-top:28px;
      
    }

    .logo-title{
     margin-left:10px;
      display: flex;
      gap:5px;
    }

    .divider {
      margin: 20px 0;
      border-top: 2px solid #e9e9e9;
    }

    form {
  max-width: 800px;
  margin: 0 auto;
  background-color: #fff;
  padding: 20px;
  border-radius: 12px;
  box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
  transform: translateY(-10px);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

form:hover {
  transform: translateY(-15px);
  box-shadow: 0 12px 20px rgba(0, 0, 0, 0.3);
}
    fieldset {
      border: 1px solid rgb(255, 255, 255);
      padding: 15px;
      margin-bottom: 20px;
      border-radius: 6px;
    }

    legend {
      font-size: 20px;
      font-weight: bold;
      color: rgb(46, 46, 46);
    }

    label {
      display: block;
      font-weight: bold;
      margin: 8px 0 4px;
      color: rgb(75, 75, 75);
    }

    input[type="text"],
    input[type="number"],
    input[type="date"],
    input[type="email"],
    select,
    textarea {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: 2px solid rgb(236, 236, 236);
      border-radius: 4px;
    }

    textarea {
      resize: vertical;
    }

    .form-row {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    .form-row > div {
      flex: 1 1 200px;
    }

    /* Button Styles */
    button {
      width: 100%;
      padding: 10px;
      background-color: rgb(174, 50, 50);
      color: #fff;
      border: none;
      border-radius: 15px;
      font-weight: bold;
      cursor: pointer;
    }

    button:hover {
      background-color: #800000;
    }

    /* Responsive Design */
    @media (max-width: 600px) {
      .form-row {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>
  
  <form action="{{ route('alumni.store') }}" method="POST">
    @csrf
<div class="logo-title">
  <a href="{{ route('admin.login') }}" method="get"><!-- Add the link here -->
    <img src="{{ asset('images/logo.png') }}" alt="Alumni Logo" style="width: 100px; height: auto; max-height: 85px;">
</a>
    <h2>Alumni Information Form</h2>
</div>
    <div class="divider"></div>

    <!-- Personal Information Section -->
    <fieldset>
      <legend>Personal Information</legend>
      <label for="fullname">Full Name</label>
      <input type="text" id="fullname" name="fullname" placeholder="Enter your Full Name"  value="{{ old('fullname') }}" required>
      @error('fullname')
      <span class="error">{{ $message }}</span>
  @enderror

      <div class="form-row">
        <div>
          <label for="age">Age</label>
          <input type="number" id="age" name="age" placeholder="Enter your age" value="{{ old('age') }}"  required>
          @error('age')
          <span class="error">{{ $message }}</span>
      @enderror
        </div>
        
        <div>
          <label for="dob">Date of Birth</label>
          <input type="date" id="dob" name="dob" value="{{ old('dob') }}" required>
          @error('dob')
          <span class="error">{{ $message }}</span>
      @enderror
        </div>
      </div>

      <label for="civilstatus">Civil Status</label>
      <input type="text" id="civilstatus" name="civilstatus"  value="{{ old('civilstatus') }}" placeholder="e.g., Single, Married">
      @error('civilstatus')
      <span class="error">{{ $message }}</span>
  @enderror

      <label for="sex">Sex</label>
      <select id="sex" name="sex" required>
        <option value="Male" {{ old('sex') == 'Male' ? 'selected' : '' }}>Male</option>
        <option value="Female" {{ old('sex') == 'Female' ? 'selected' : '' }}>Female</option>
        <option value="Other" {{ old('sex') == 'Other' ? 'selected' : '' }}>Other</option>
      </select>
      @error('sex')
      <span class="error">{{ $message }}</span>
  @enderror


      <label for="religion">Religion</label>
      <input type="text" id="religion" name="religion" placeholder="Enter your religion" value="{{ old('religion') }}">
      @error('religion')
      <span class="error">{{ $message }}</span>
  @enderror
    </fieldset>

    <!-- Address Information Section -->
    <fieldset>
      <legend>Address Information</legend>
      <label for="street">Street</label>
      <input type="text" id="street" name="street" placeholder="Enter your street address">

      <label for="barangay">Barangay</label>
      <input type="text" id="barangay" name="barangay" placeholder="Enter your barangay">

      <div class="form-row">
        <div>
          <label for="municipality">Municipality</label>
          <input type="text" id="municipality" name="municipality" placeholder="Enter municipality">
        </div>
        <div>
          <label for="province">Province</label>
          <input type="text" id="province" name="province" placeholder="Enter province">
        </div>
      </div>

      <div class="form-row">
        <div>
          <label for="region">Region</label>
          <input type="text" id="region" name="region" placeholder="Enter region">
        </div>
        <div>
          <label for="zipcode">Zip Code</label>
          <input type="text" id="zipcode" name="zipcode" placeholder="Enter zip code">
        </div>
      </div>
    </fieldset>

    <!-- Contact Information Section -->
    <fieldset>
      <legend>Contact Details</legend>
      <label for="phone">Phone Number</label>
      <input type="number" id="phone" name="phone" placeholder="Enter phone number" required>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Enter email address" required>
      @error('email')
            <span class="error">{{ $message }}</span>
        @enderror

      <label for="facebook">Facebook</label>
      <input type="text" id="facebook" name="facebook" placeholder="Enter Facebook profile">
    </fieldset>

    <!-- Educational and Professional Details -->
    <fieldset>
      <legend>Educational and Professional Details</legend>
      <label for="course_id">Course</label>
      <select id="course_id" name="course_id" required>
        @foreach ($courses as $course)
          <option value="{{ $course->id }}">{{ $course->course_name }}</option>
        @endforeach
      </select>
      @error('course_id')
      <span class="error">{{ $message }}</span>
  @enderror

      <label for="batch">Batch</label>
      <input type="text" id="batch" name="batch" placeholder="Enter your batch">


      <label for="employment_status_id">Employment Status</label>
      <select id="employment_status_id" name="employment_status_id" required>
        @foreach ($employmentStatus as $status)
          <option value="{{ $status->id }}">{{ $status->status }}</option>
        @endforeach
      </select>
      @error('employment_status_id')
      <span class="error">{{ $message }}</span>
  @enderror

      <label for="organization">Organization</label>
      <input type="text" id="organization" name="organization" placeholder="Enter organization">
      @error('organization')
      <span class="error">{{ $message }}</span>
  @enderror

      <label for="profession">Profession</label>
      <input type="text" id="profession" name="profession" placeholder="Enter profession">
      @error('profession')
      <span class="error">{{ $message }}</span>
  @enderror


      <label for="type">Type</label>
      <input type="text" id="type" name="type" placeholder="e.g., Full-Time, Part-Time">
      @error('type')
      <span class="error">{{ $message }}</span>
  @enderror

      
      <label for="location">Location</label>
      <input type="text" id="location" name="location" placeholder="Enter location">
      @error('location')
      <span class="error">{{ $message }}</span>
  @enderror


      <label for="expectedincome">Expected Income</label>
      <input type="number" id="expectedincome" name="expectedincome" placeholder="Enter expected income">
      @error('expectedincome')
      <span class="error">{{ $message }}</span>
  @enderror


      <label for="company">Company</label>
      <input type="text" id="company" name="company" placeholder="Enter company name">
      @error('company')
      <span class="error">{{ $message }}</span>
  @enderror


      <label for="incomerange">Income Range</label>
      <input type="number" id="incomerange" name="incomerange" placeholder="Enter income range">
      @error('incomerange')
      <span class="error">{{ $message }}</span>
  @enderror


      <label for="relatedfield">Related Field</label>
      <input type="text" id="relatedfield" name="relatedfield" placeholder="Enter related field">
      @error('relatedfield')
      <span class="error">{{ $message }}</span>
  @enderror

      
      <label for="reason">Reason</label>
      <textarea id="reason" name="reason" rows="3" placeholder="Enter reason"></textarea>
    </fieldset>
    @error('reason')
    <span class="error">{{ $message }}</span>
@enderror


    <button type="submit">Submit</button>
    
  </form>
 
</body>

</html>