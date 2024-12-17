<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alumni Profile</title>
  <style>
    /* General Styles */
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      color: #333;
      margin: 0;
      padding: 20px;
    }

    .profile-container {
      max-width: 900px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    h2 {
      color: maroon;
      margin-bottom: 20px;
      text-align: center;
    }

    .profile-header {
      display: flex;
      align-items: center;
      gap: 20px;
      width: 100%;
      padding-bottom: 20px;
      border-bottom: 1px solid #ddd;
      margin-bottom: 20px;
    }

    .profile-picture {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      background-color: #ddd;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
      color: #888;
    }

    .profile-picture img {
      width: 100%;
      height: 100%;
      border-radius: 50%;
      object-fit: cover;
    }

    .profile-basic-info {
      flex: 1;
    }

    .profile-basic-info h3 {
      margin: 0;
      color: #555;
    }

    .profile-basic-info p {
      margin: 5px 0;
      color: #333;
    }

    .section {
      margin-bottom: 20px;
      padding: 15px;
      border: 1px solid #ddd;
      border-radius: 6px;
      width: 100%;
    }

    .section h3 {
      margin-top: 0;
      color: #555;
    }

    .profile-info {
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
    }

    .profile-item {
      flex: 1 1 250px;
    }

    .profile-item label {
      font-weight: bold;
      color: darkgray;
      display: block;
      margin-bottom: 4px;
    }

    .profile-item span {
      display: block;
      color: #333;
    }

    /* Responsive Design */
    @media (max-width: 600px) {
      .profile-info {
        flex-direction: column;
      }
      .profile-header {
        flex-direction: column;
        text-align: center;
      }
    }
  </style>
</head>
<body>

  <div class="profile-container">
    <h2>Alumni Profile Information</h2>

    <!-- Profile Header with Image and Basic Info -->
    <div class="profile-header">
      <div class="profile-picture">
        <!-- Placeholder Image -->
        <!-- Replace this with an actual image by setting src on <img> below -->
        <img src="https://via.placeholder.com/150" alt="Profile Picture">
      </div>
      <div class="profile-basic-info">
        <h3>{{ $alumni->fullname }}</h3>
        <p>Alumni of {{$alumni->course->course_name}}, Class of {{$alumni->batch}}</p>
        <p>Currently working at {{$alumni->company}}.</p>
      </div>
    </div>

    <!-- Personal Information Section -->
    <div class="section">
      <h3>Personal Information</h3>
      <div class="profile-info">
        <div class="profile-item">
          <label>Full Name</label>
          <span>{{$alumni->fullname}}</span>
        </div>
        <div class="profile-item">
          <label>Age</label>
          <span>{{$alumni->age}}</span>
        </div>
        <div class="profile-item">
          <label>Date of Birth</label>
          <span>{{$alumni->dob}}</span>
        </div>
        <div class="profile-item">
          <label>Civil Status</label>
          <span>{{$alumni->civilstatus}}<</span>
        </div>
        <div class="profile-item">
          <label>Sex</label>
          <span>{{$alumni->sex}}</span>
        </div>
        <div class="profile-item">
          <label>Religion</label>
          <span>{{$alumni->religion}}</span>
        </div>
      </div>
    </div>

    <!-- Address Information Section -->
    <div class="section">
      <h3>Address Information</h3>
      <div class="profile-info">
        <div class="profile-item">
          <label>Street</label>
          <span>{{$alumni->street}}.</span>
        </div>
        <div class="profile-item">
          <label>Barangay</label>
          <span>{{$alumni->barangay}}</span>
        </div>
        <div class="profile-item">
          <label>Municipality</label>
          <span>{{$alumni->municipality}}</span>
        </div>
        <div class="profile-item">
          <label>Province</label>
          <span>{{$alumni->province}}</span>
        </div>
        <div class="profile-item">
          <label>Region</label>
          <span>{{$alumni->region}}</span>
        </div>
        <div class="profile-item">
          <label>Zip Code</label>
          <span>{{$alumni->zipcode}}</span>
        </div>
      </div>
    </div>

    <!-- Contact Information Section -->
    <div class="section">
      <h3>Contact Information</h3>
      <div class="profile-info">
        <div class="profile-item">
          <label>Phone Number</label>
          <span>{{$alumni->phone}}</span>
        </div>
        <div class="profile-item">
          <label>Email</label>
          <span>{{$alumni->email}}</span>
        </div>
        <div class="profile-item">
          <label>Facebook</label>
          <span>{{$alumni->facebook}}</span>
        </div>
      </div>
    </div>

    <!-- Professional Details Section -->
    <div class="section">
      <h3>Professional Details</h3>
      <div class="profile-info">
        <div class="profile-item">
          <label>Course</label>
          <span>{{$alumni->course->course_name}}</span>
        </div>
        <div class="profile-item">
          <label>Status</label>
          <span>{{$alumni->employmentStatus->status}}</span>
        </div>
        <div class="profile-item">
          <label>Organization</label>
          <span>{{$alumni->organization}}</span>
        </div>
        <div class="profile-item">
          <label>Profession</label>
          <span>{{$alumni->profession}}</span>
        </div>
        <div class="profile-item">
          <label>Company Name</label>
          <span>{{$alumni->company}}</span>
        </div>
      </div>
    </div>
  </div>

</body>
</html>