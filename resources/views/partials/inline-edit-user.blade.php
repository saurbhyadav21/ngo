@csrf
<input type="hidden" name="id" value="{{ $user->id }}">

    <div class="row mb-3"> 
          <div class="col-md-4">

        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
    </div>
    <div class="col-md-4">
  <label class="form-label">Email:<span>*</span></label>
  <input type="email" class="form-control" name="email" 
         value="{{ old('email', $user->email) }}" required>
</div>

    <div class="form-group col-md-4">
        <label>Mobile. Number</label>
        <input type="text" name="mobile_number" class="form-control" value="{{ $user->mobile_number }}">
    </div>
    <!-- <div class="form-group col-md-4">
        <label>City</label>
        <input type="text" name="district" class="form-control" value="{{ $user->district }}">
    </div> -->
   <div class="col-md-4">
    <label class="form-label">Gender <span>*</span></label>
    <select class="form-control" name="gender" required>
        <option value="" disabled {{ $user->gender == '' ? 'selected' : '' }}>Select</option>
        <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
        <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
        <option value="Other" {{ $user->gender == 'Other' ? 'selected' : '' }}>Other</option>
    </select>
</div>
<div class="col-md-4">
    <label class="form-label">Date Of Birth:</label>
    <input type="date" class="form-control" name="dob" id="dobField" value="{{ $user->dob }}" required>
</div>
<div class="col-md-4">
    <label class="form-label">Blood Group:</label>
    <select class="form-control" name="blood_group" required>
        <option value="" disabled {{ $user->blood_group == '' ? 'selected' : '' }}>Select Blood Group</option>
        <option value="A+" {{ $user->blood_group == 'A+' ? 'selected' : '' }}>A+</option>
        <option value="A-" {{ $user->blood_group == 'A-' ? 'selected' : '' }}>A-</option>
        <option value="B+" {{ $user->blood_group == 'B+' ? 'selected' : '' }}>B+</option>
        <option value="B-" {{ $user->blood_group == 'B-' ? 'selected' : '' }}>B-</option>
        <option value="AB+" {{ $user->blood_group == 'AB+' ? 'selected' : '' }}>AB+</option>
        <option value="AB-" {{ $user->blood_group == 'AB-' ? 'selected' : '' }}>AB-</option>
        <option value="O+" {{ $user->blood_group == 'O+' ? 'selected' : '' }}>O+</option>
        <option value="O-" {{ $user->blood_group == 'O-' ? 'selected' : '' }}>O-</option>
    </select>
</div>

  <div class="col-md-4">
    <label class="form-label">State <span class="text-danger">*</span></label>
    <select class="form-control" name="state" id="stateDropdown" required>
      <option value="" disabled {{ $user->state == '' ? 'selected' : '' }}>Select State</option>
      <option value="Andhra Pradesh" {{ $user->state == 'Andhra Pradesh' ? 'selected' : '' }}>Andhra Pradesh</option>
      <option value="Arunachal Pradesh" {{ $user->state == 'Arunachal Pradesh' ? 'selected' : '' }}>Arunachal Pradesh</option>
      <option value="Assam" {{ $user->state == 'Assam' ? 'selected' : '' }}>Assam</option>
      <option value="Bihar" {{ $user->state == 'Bihar' ? 'selected' : '' }}>Bihar</option>
      <option value="Chhattisgarh" {{ $user->state == 'Chhattisgarh' ? 'selected' : '' }}>Chhattisgarh</option>
      <option value="Goa" {{ $user->state == 'Goa' ? 'selected' : '' }}>Goa</option>
      <option value="Gujarat" {{ $user->state == 'Gujarat' ? 'selected' : '' }}>Gujarat</option>
      <option value="Haryana" {{ $user->state == 'Haryana' ? 'selected' : '' }}>Haryana</option>
      <option value="Himachal Pradesh" {{ $user->state == 'Himachal Pradesh' ? 'selected' : '' }}>Himachal Pradesh</option>
      <option value="Jharkhand" {{ $user->state == 'Jharkhand' ? 'selected' : '' }}>Jharkhand</option>
      <option value="Karnataka" {{ $user->state == 'Karnataka' ? 'selected' : '' }}>Karnataka</option>
      <option value="Kerala" {{ $user->state == 'Kerala' ? 'selected' : '' }}>Kerala</option>
      <option value="Madhya Pradesh" {{ $user->state == 'Madhya Pradesh' ? 'selected' : '' }}>Madhya Pradesh</option>
      <option value="Maharashtra" {{ $user->state == 'Maharashtra' ? 'selected' : '' }}>Maharashtra</option>
      <option value="Manipur" {{ $user->state == 'Manipur' ? 'selected' : '' }}>Manipur</option>
      <option value="Meghalaya" {{ $user->state == 'Meghalaya' ? 'selected' : '' }}>Meghalaya</option>
      <option value="Mizoram" {{ $user->state == 'Mizoram' ? 'selected' : '' }}>Mizoram</option>
      <option value="Nagaland" {{ $user->state == 'Nagaland' ? 'selected' : '' }}>Nagaland</option>
      <option value="Odisha" {{ $user->state == 'Odisha' ? 'selected' : '' }}>Odisha</option>
      <option value="Punjab" {{ $user->state == 'Punjab' ? 'selected' : '' }}>Punjab</option>
      <option value="Rajasthan" {{ $user->state == 'Rajasthan' ? 'selected' : '' }}>Rajasthan</option>
      <option value="Sikkim" {{ $user->state == 'Sikkim' ? 'selected' : '' }}>Sikkim</option>
      <option value="Tamil Nadu" {{ $user->state == 'Tamil Nadu' ? 'selected' : '' }}>Tamil Nadu</option>
      <option value="Telangana" {{ $user->state == 'Telangana' ? 'selected' : '' }}>Telangana</option>
      <option value="Tripura" {{ $user->state == 'Tripura' ? 'selected' : '' }}>Tripura</option>
      <option value="Uttar Pradesh" {{ $user->state == 'Uttar Pradesh' ? 'selected' : '' }}>Uttar Pradesh</option>
      <option value="Uttarakhand" {{ $user->state == 'Uttarakhand' ? 'selected' : '' }}>Uttarakhand</option>
      <option value="West Bengal" {{ $user->state == 'West Bengal' ? 'selected' : '' }}>West Bengal</option>
      <!-- Union Territories -->
      <option value="Andaman and Nicobar Islands" {{ $user->state == 'Andaman and Nicobar Islands' ? 'selected' : '' }}>Andaman and Nicobar Islands</option>
      <option value="Chandigarh" {{ $user->state == 'Chandigarh' ? 'selected' : '' }}>Chandigarh</option>
      <option value="Dadra and Nagar Haveli and Daman and Diu" {{ $user->state == 'Dadra and Nagar Haveli and Daman and Diu' ? 'selected' : '' }}>Dadra and Nagar Haveli and Daman and Diu</option>
      <option value="Delhi" {{ $user->state == 'Delhi' ? 'selected' : '' }}>Delhi</option>
      <option value="Jammu and Kashmir" {{ $user->state == 'Jammu and Kashmir' ? 'selected' : '' }}>Jammu and Kashmir</option>
      <option value="Ladakh" {{ $user->state == 'Ladakh' ? 'selected' : '' }}>Ladakh</option>
      <option value="Lakshadweep" {{ $user->state == 'Lakshadweep' ? 'selected' : '' }}>Lakshadweep</option>
      <option value="Puducherry" {{ $user->state == 'Puducherry' ? 'selected' : '' }}>Puducherry</option>
    </select>
  </div>
<div class="col-md-4">
    <label class="form-label">City <span class="text-danger">*</span></label>
    <select class="form-control" name="district" id="cityDropdown" >
  <option value="">Select City</option>
</select>

<input type="hidden" id="selectedCity" value="{{ $user->district }}">
  </div>
<div class="col-md-4">
    <label class="form-label">Pincode:<span>*</span></label>
    <input type="text" class="form-control" name="pincode" value="{{ $user->pin_code }}" required>
  </div>
<div class="col-12">
    <label class="form-label">Address:<span>*</span></label>
    <textarea class="form-control" name="address" rows="3" required>{{ $user->address }}</textarea>
</div>

<div class="col-md-4">
    <label class="form-label">Relation:<span>*</span></label>
    <select class="form-control" onchange="sdw()" id="sdwType" name="sdw_type" required>
        <option value="S/O" {{ $user->relation_type == 'S/O' ? 'selected' : '' }}>S/O</option>
        <option value="D/O" {{ $user->relation_type == 'D/O' ? 'selected' : '' }}>D/O</option>
        <option value="W/O" {{ $user->relation_type == 'W/O' ? 'selected' : '' }}>W/O</option>
    </select>
</div>
<div class="col-md-4">
    <label class="form-label">Relation Name</label> 
    <input type="text" name="sdw_name" required class="form-control" id="sdwName" placeholder="Son of" value="{{ $user->relation_name }}">
  </div>

<div class="col-md-4">
    <label class="form-label">Photo (Optional):</label>
    <input type="file" class="form-control" name="image" id="image">
    
    @if(!empty($user->profile_image))
        <div class="mt-2">
            <a href="{{ asset('storage/uploads/' . $user->profile_image) }}" target="_blank" class="btn btn-sm btn-primary">
                View Image
            </a>
        </div>
    @endif
</div>
<div class="col-md-4">
    <label class="form-label">Aadhar No.:<span>*</span></label>
    <input type="text" class="form-control" name="aadhar_number" value="{{ $user->aadhar_number }}" required>
</div>
<div class="col-md-4">
    <label class="form-label">Validity Start:<span>*</span></label>
    <input type="date" class="form-control" name="validity_start" 
           value="{{ \Carbon\Carbon::parse($user->validity_start)->format('Y-m-d') }}" required>
</div>

<div class="col-md-4">
    <label class="form-label">Validity End:<span>*</span></label>
    <input type="date" class="form-control" name="validity_end" 
           value="{{ \Carbon\Carbon::parse($user->validity_end)->format('Y-m-d') }}" required>
</div>
<div class="col-md-4">
  <label class="form-label">Profession <span>*</span></label>
  <select class="form-control" name="profession" required>
    <option value="" disabled {{ empty($user->profession) ? 'selected' : '' }}>Select Profession</option>
    <option value="Government Employee" {{ $user->profession == 'Government Employee' ? 'selected' : '' }}>Government Employee</option>
    <option value="Private Job" {{ $user->profession == 'Private Job' ? 'selected' : '' }}>Private Job</option>
    <option value="Self Employed" {{ $user->profession == 'Self Employed' ? 'selected' : '' }}>Self Employed</option>
    <option value="Business" {{ $user->profession == 'Business' ? 'selected' : '' }}>Business</option>
    <option value="Farmer" {{ $user->profession == 'Farmer' ? 'selected' : '' }}>Farmer</option>
    <option value="Student" {{ $user->profession == 'Student' ? 'selected' : '' }}>Student</option>
    <option value="Retired" {{ $user->profession == 'Retired' ? 'selected' : '' }}>Retired</option>
    <option value="Unemployed" {{ $user->profession == 'Unemployed' ? 'selected' : '' }}>Unemployed</option>
    <option value="Other" {{ $user->profession == 'Other' ? 'selected' : '' }}>Other</option>
  </select>
</div>

  <div class="col-md-4">
  <label class="form-label">Authority:<span>*</span></label>
  <input type="text" class="form-control" name="Authority" value="{{ $user->authority }}" required>
</div>
  <div class="col-md-4">
    <label class="form-label">Select Your ID:</label>
    <select class="form-control" name="id_type">
      <option value="" {{ empty($user->id_type) ? 'selected' : '' }}>-- Select ID Type --</option>
      <option value="Aadhaar Card" {{ $user->id_type == 'Aadhaar Card' ? 'selected' : '' }}>Aadhaar Card</option>
      <option value="PAN Card" {{ $user->id_type == 'PAN Card' ? 'selected' : '' }}>PAN Card</option>
      <option value="Voter ID" {{ $user->id_type == 'Voter ID' ? 'selected' : '' }}>Voter ID</option>
      <option value="Driving License" {{ $user->id_type == 'Driving License' ? 'selected' : '' }}>Driving License</option>
      <option value="Passport" {{ $user->id_type == 'Passport' ? 'selected' : '' }}>Passport</option>
      <option value="RasanCard" {{ $user->id_type == 'RasanCard' ? 'selected' : '' }}>RasanCard</option>
      <option value="Marksheet" {{ $user->id_type == 'Marksheet' ? 'selected' : '' }}>10th Marksheet</option>
    </select>
  </div>

  <div class="col-md-4">
    <label class="form-label">Upload ID Proof:</label>
    <input type="file" name="id_file" class="form-control" accept=".jpg,.jpeg,.png,.pdf">

    @if (!empty($user->id_image))
        <div class="mt-2">
            <a href="{{ asset('storage/uploads/' . $user->id_image) }}" target="_blank" class="btn btn-sm btn-primary">
                View File
            </a>
        </div>
    @endif
</div>
<div class="col-md-4">
  <label class="form-label">Other Document:</label>
  <input type="file" name="other_document" class="form-control" accept=".jpg,.jpeg,.png,.pdf">

  @if (!empty($user->other_document))
    <div class="mt-2">
      <a href="{{ asset('storage/uploads/' . $user->other_document) }}" 
         target="_blank" class="btn btn-sm btn-primary">
        View File
      </a>
    </div>
  @endif
</div>
<div class="row mb-4">
  <label class="form-label">Remarks:<span>*</span></label>
  <textarea class="form-control" name="remarks" rows="3" placeholder="Enter your remarks here..." required>{{ old('remarks', $user->remarks) }}</textarea>
</div>



</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#inlineEditForm').submit(function (e) {
        e.preventDefault();

        let formData = new FormData(this); // Capture file + other inputs

        $.ajax({
            url: '/user/update-inline',
            type: 'POST',
            data: formData,
            processData: false, // Important for file upload
            contentType: false, // Important for file upload
            success: function (res) {
                alert('User updated successfully!');
                $('#editUserSection').slideUp();
                $('#coordinatorSelect').trigger('change'); // Reload user list
            },
            error: function (xhr) {
                console.log(xhr.responseText);
                alert('Update failed. Check console for errors.');
            }
        });
    });
</script>

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