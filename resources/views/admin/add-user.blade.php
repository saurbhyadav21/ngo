@extends('layouts.admin-layout')

@section('title', 'Home - Admin Dashboard')

@section('content')
 <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<style>
     @media (max-width: 991px) {
        .sub{
            margin-top: 10px;
        }
        
    .custom-margin {
      margin-top: 0px !important;
    }
  }

  span{
    color: red;
  }

  label{
    font-weight: bold;
  }
    
    .product-group { margin-bottom: 10px; }
  </style>
<div class="container mt-4 mb-5 ">
  <h4 class="mb-4 custom-margin">Add User</h4>
  @if(session('success'))
  <div class="alert alert-success mt-3">
    {{ session('success') }}
  </div>
@endif
    <form id="post-add-form" action="{{ route('update-member') }}" method="POST" enctype="multipart/form-data">
     @csrf
    
    <div class="row mb-3"> 
       <div class="col-md-6">
        <label class="form-label">Name <span>*</span></label>
        <input type="text" class="form-control" name="name" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Email:<span>*</span></label>
        <input type="email" class="form-control" name="email">
      </div>
      
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
                <label class="form-label">Gender <span>*</span></label>
                <select class="form-control" name="gender" required>
                    <option value="" disabled>Select</option>
                    <option value="Male" >Male</option>
                    <option value="Female" >Female</option>
                    <option value="Other" >Other</option>
                </select>
            </div>
      <div class="col-md-6"> 
        <label class="form-label">Mobile No. <span>*</span></label>
        <input type="text" class="form-control" name="phone" required>
      </div>
      
    </div>



    <div class="row mb-3">    
       <div class="col-md-6">
  <label class="form-label">Date Of Birth:</label>
  <input type="date" class="form-control" name="dob" id="dobField" required>
</div>
        <div class="col-md-6">
    <label class="form-label">Blood Group:</label>
    <select class="form-control" name="blood_group" required>
        <option value="" disabled selected>Select Blood Group</option>
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
    </select>
</div>
      
    </div>
<div class="row mb-3">
  <div class="col-md-6">
    <label class="form-label">State <span class="text-danger">*</span></label>
    <select class="form-control" name="state" id="stateDropdown" required>
      <option value="">Select State</option>
      <option value="Andhra Pradesh">Andhra Pradesh</option>
      <option value="Arunachal Pradesh">Arunachal Pradesh</option>
      <option value="Assam">Assam</option>
      <option value="Bihar">Bihar</option>
      <option value="Chhattisgarh">Chhattisgarh</option>
      <option value="Goa">Goa</option>
      <option value="Gujarat">Gujarat</option>
      <option value="Haryana">Haryana</option>
      <option value="Himachal Pradesh">Himachal Pradesh</option>
      <option value="Jharkhand">Jharkhand</option>
      <option value="Karnataka">Karnataka</option>
      <option value="Kerala">Kerala</option>
      <option value="Madhya Pradesh">Madhya Pradesh</option>
      <option value="Maharashtra">Maharashtra</option>
      <option value="Manipur">Manipur</option>
      <option value="Meghalaya">Meghalaya</option>
      <option value="Mizoram">Mizoram</option>
      <option value="Nagaland">Nagaland</option>
      <option value="Odisha">Odisha</option>
      <option value="Punjab">Punjab</option>
      <option value="Rajasthan">Rajasthan</option>
      <option value="Sikkim">Sikkim</option>
      <option value="Tamil Nadu">Tamil Nadu</option>
      <option value="Telangana">Telangana</option>
      <option value="Tripura">Tripura</option>
      <option value="Uttar Pradesh">Uttar Pradesh</option>
      <option value="Uttarakhand">Uttarakhand</option>
      <option value="West Bengal">West Bengal</option>
      <!-- Union Territories -->
      <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
      <option value="Chandigarh">Chandigarh</option>
      <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and Daman and Diu</option>
      <option value="Delhi">Delhi</option>
      <option value="Jammu and Kashmir">Jammu and Kashmir</option>
      <option value="Ladakh">Ladakh</option>
      <option value="Lakshadweep">Lakshadweep</option>
      <option value="Puducherry">Puducherry</option>
    </select>
  </div>

  <div class="col-md-6">
    <label class="form-label">City <span class="text-danger">*</span></label>
    <select class="form-control" name="city" id="cityDropdown" required>
      <option value="">Select City</option>
    </select>
  </div>
</div>

<div class="row mb-3"> 
    <div class="col-12">
        <label class="form-label">Address <span>*</span></label>
           <textarea class="form-control" name="address" rows="3" required></textarea>
      </div>
    </div>
<div class="row mb-3"> 
  <div class="col-md-6">
    <label class="form-label">Pincode:<span>*</span></label>
    <input type="text" class="form-control" name="pincode" required>
  </div>

  <div class="col-md-3">
    <label class="form-label">Relation:<span>*</span></label>
    <select class="form-control" onchange="sdw()" id="sdwType" name="sdw_type">
      <option value="S/O">S/O</option>
      <option value="D/O">D/O</option>
      <option value="W/O">W/O</option>
    </select>
  </div>

  <div class="col-md-3">
    <label class="form-label">&nbsp;</label> <!-- for spacing alignment -->
    <input type="text" name="sdw_name" required class="form-control" id="sdwName" placeholder="Son of">
  </div>
</div>
<!-- <div class="row mb-3">
 
</div> -->

    <div class="row mb-3">
      <div class="col-md-6">
        <label class="form-label">Photo (Optional):</label>
        <input type="file" class="form-control" name="image">
      </div>
       <div class="col-md-6">
        <label class="form-label">Aadhar No.:<span>*</span></label>
        <input type="text" class="form-control" name="aadhar_number">
      </div>
    
    </div>
    <!-- <div class="row mb-3">
      <div class="col-md-6">
        <label class="form-label">Validity Start:<span>*</span></label>
        <input type="date" class="form-control" name="validity_start">
      </div>
      <div class="col-md-6">
        <label class="form-label">Validity End:<span>*</span></label>
        <input type="date" class="form-control" name="validity_end">
      </div>
    </div> -->
    <div class="row mb-3">
<div class="col-md-6 ">
  <label class="form-label">Profession <span>*</span></label>
  <select class="form-control" name="profession" required>
    <option value="" disabled selected>Select Profession</option>
    <option value="Government Employee">Government Employee</option>
    <option value="Private Job">Private Job</option>
    <option value="Self Employed">Self Employed</option>
    <option value="Business">Business</option>
    <option value="Farmer">Farmer</option>
    <option value="Student">Student</option>
    <option value="Retired">Retired</option>
    <option value="Unemployed">Unemployed</option>
    <option value="Other">Other</option>
  </select>
</div>

      <!-- <div class="col-md-6">
        <label class="form-label">Authority:<span>*</span></label>
        <input type="text" class="form-control" name="Authority"required>
      </div> -->
      </div>
<div class="row mb-3">
  <div class="col-md-6">
    <label class="form-label">Select Your ID:</label>
    <select class="form-control" name="id_type" >
      <option value="">-- Select ID Type --</option>
      <option value="Aadhaar Card">Aadhaar Card</option>
      <option value="PAN Card">PAN Card</option>
      <option value="Voter ID">Voter ID</option>
      <option value="Driving License">Driving License</option>
      <option value="Passport">Passport</option>
      <option value="RasanCard">RasanCard</option>
      <option value="Marksheet">10th Marksheet</option>
    </select>
  </div>

  <div class="col-md-6">
    <label class="form-label">Upload ID Proof:</label>
    <input type="file" name="id_file" class="form-control" accept=".jpg,.jpeg,.png,.pdf" >
  </div>
</div>

<div class="col-md-6 mb-3">
  <label class="form-label">Other Document:</label>
  <input type="file" name="other_document" class="form-control" accept=".jpg,.jpeg,.png,.pdf">
</div>

<!-- <div class="row mb-3">
  <label class="form-label">Remarks:<span>*</span></label>
  <textarea class="form-control" name="remarks" rows="3" placeholder="Enter your remarks here..."></textarea>
</div> -->

    <button type="submit" class="btn btn-primary mt-4 w-100">Submit</button>
  </form>
</div>



<script>
  const citiesByState = {
    "Andhra Pradesh": ["Visakhapatnam", "Vijayawada", "Guntur"],
    "Arunachal Pradesh": ["Itanagar", "Tawang"],
    "Assam": ["Guwahati", "Silchar"],
    "Bihar": ["Patna", "Gaya", "Bhagalpur"],
    "Chhattisgarh": ["Raipur", "Bilaspur", "Durg"],
    "Goa": ["Panaji", "Margao"],
    "Gujarat": ["Ahmedabad", "Surat", "Vadodara", "Rajkot"],
    "Haryana": ["Gurgaon", "Faridabad", "Panchkula"],
    "Himachal Pradesh": ["Shimla", "Mandi", "Manali"],
    "Jharkhand": ["Ranchi", "Jamshedpur", "Dhanbad"],
    "Karnataka": ["Bengaluru", "Mysuru", "Mangalore"],
    "Kerala": ["Thiruvananthapuram", "Kochi", "Kozhikode"],
    "Madhya Pradesh": ["Bhopal", "Indore", "Gwalior"],
    "Maharashtra": ["Mumbai", "Pune", "Nagpur", "Nashik"],
    "Manipur": ["Imphal"],
    "Meghalaya": ["Shillong"],
    "Mizoram": ["Aizawl"],
    "Nagaland": ["Kohima", "Dimapur"],
    "Odisha": ["Bhubaneswar", "Cuttack", "Puri"],
    "Punjab": ["Amritsar", "Ludhiana", "Patiala"],
    "Rajasthan": ["Jaipur", "Udaipur", "Jodhpur", "Ajmer"],
    "Sikkim": ["Gangtok"],
    "Tamil Nadu": ["Chennai", "Coimbatore", "Madurai"],
    "Telangana": ["Hyderabad", "Warangal", "Nizamabad"],
    "Tripura": ["Agartala"],
    "Uttar Pradesh": ["Lucknow", "Kanpur", "Varanasi", "Noida"],
    "Uttarakhand": ["Dehradun", "Haridwar", "Nainital"],
    "West Bengal": ["Kolkata", "Howrah", "Asansol"],

    // Union Territories
    "Andaman and Nicobar Islands": ["Port Blair"],
    "Chandigarh": ["Chandigarh"],
    "Dadra and Nagar Haveli and Daman and Diu": ["Daman", "Silvassa"],
    "Delhi": ["Central Delhi", "East Delhi", "North Delhi", "North East Delhi", "North West Delhi", "South Delhi", "South East Delhi", "South West Delhi", "West Delhi"],
    "Jammu and Kashmir": ["Srinagar", "Jammu", "Anantnag"],
    "Ladakh": ["Leh", "Kargil"],
    "Lakshadweep": ["Kavaratti"],
    "Puducherry": ["Puducherry", "Karaikal", "Mahe", "Yanam"]
  };

  document.getElementById("stateDropdown").addEventListener("change", function () {
    const state = this.value;
    const cityDropdown = document.getElementById("cityDropdown");
    cityDropdown.innerHTML = '<option value="">Select City</option>'; // reset

    if (state && citiesByState[state]) {
      citiesByState[state].forEach(function (city) {
        const option = document.createElement("option");
        option.value = city;
        option.textContent = city;
        cityDropdown.appendChild(option);
      });
    }
  });
    function sdw() {
    const type = document.getElementById('sdwType').value;
    const input = document.getElementById('sdwName');

    if (type === 'S/O') {
      input.placeholder = "Son of";
    } else if (type === 'D/O') {
      input.placeholder = "Daughter of";
    } else if (type === 'W/O') {
      input.placeholder = "Wife of";
    }
  }

  // Optional: run on page load to sync placeholder
  window.onload = sdw;


    const today = new Date();
  today.setDate(today.getDate() - 1); // to disallow today
  const yyyy = today.getFullYear();
  const mm = String(today.getMonth() + 1).padStart(2, '0'); // Months are 0-based
  const dd = String(today.getDate()).padStart(2, '0');
  const maxDate = `${yyyy}-${mm}-${dd}`;
  
  document.getElementById('dobField').setAttribute('max', maxDate);
</script>



@endsection
