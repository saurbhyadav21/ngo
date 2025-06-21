

<!-- <!DOCTYPE html>
<html>
<head>
    <title>Multi Login System</title>
</head>
<body>

    <h2>Select Login Type</h2>

    <a href="{{ url('/login?type=admin') }}">
        <button>Admin</button>
    </a>

    <a href="{{ url('/login?type=manager') }}">
        <button>Manager</button>
    </a>

    <a href="{{ url('/login?type=coordinator') }}">
        <button>Coordinator</button>
    </a>

</body>
</html> -->
@extends('layouts.header') {{-- Or your layout file --}}

@section('title', 'Header List')

@section('content')


<style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

@font-face {
  font-family: "MyCustomFont";
  src: url("/fonts/fa-brands-400.woff2") format("woff2"),
    url("/fonts/fa-regular-400.woff2") format("woff2"),
    url("/fonts/fa-solid-900.woff2") format("woff2"),
    url("/fonts/fontawesome-webfont.woff2") format("woff2"); /* optional for older IE */
  font-weight: normal;
  font-style: normal;
}

body {
  background: #ffffff;
  font-family: "MyCustomFont", sans-serif;
}

.only-for-top {
  padding-top: 90px;
}

.main_name {
  font-size: 31px;
}

.icon-box {
  border: 2px solid #28a745;
  border-radius: 8px;
}

#form1 {
  border: 2px solid #28a745;
  margin-top: 30px;
  border-radius: 12px;
  font-weight: 600;
  font-size: 15px;
}

input {
  border: 2px solid black;
}

.line {
  height: 2px;
  background-color: #28a745; /* change to your desired color */
  width: 100%; /* or 80%, or fixed like 500px */
  margin: 10px auto;
}

#form1 #payment {
  color: #ffffff;
  font-weight: 900;
  border-color: linear-gradient(to right, #2ea043, #7ed957);
  border-radius: 8px;
  background: linear-gradient(to right, #2ea043, #7ed957);
  /* border-radius: 0 0 30px 30px; */
}

.upload-box {
  width: 150px;
  height: 150px;
  border: 2px dashed #000000;
  border-radius: 10px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  color: #555;
  font-family: sans-serif;
  margin: 20px;
}

.upload-box input[type="file"] {
  display: none;
}

.upload-box:hover {
  border: 2px solid #2ea043;
}

.upload-icon {
  font-size: 2rem;
  margin-bottom: 5px;
}
#print-div {
  max-width: 500px;
  width: 100%;
  /* border-color: #2ea043; */
}

#letter {
  border: 2px solid white;
}

.donation {
  max-width: 400px;
  height: auto;
  font-size: 35px;
  color: white;
  border-radius: 12px;
}

/* List Of Donors */

#Heading {
  font-weight: 400;
  font-size: 45px;
}

.people {
  padding: 20px;
}

.people_border {
  background: linear-gradient(
    122deg,
    rgba(0, 146, 69, 1) 0%,
    rgba(135, 190, 65, 1) 100%
  );
  border-radius: 15px;
  padding: 10px;
  margin: 20px;
  max-width: 290px;
  height: auto;
  color: white;
}

.People_sub_div {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.People_img {
  background-color: #a5d6a7;
  max-width: 200px;
  max-height: 200px;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 20px;
  overflow: hidden;
}

.People_img img {
  max-width: 98%;
  max-height: 98%;
  object-fit: contain;
}

.People_Content .Name_content {
  background-color: #1b5e20;
  padding: 15px 40px;
  border-radius: 5px;
  font-weight: bold;
  font-size: 25px;
  text-align: center;
  display: inline-block;
  width: 100%;
  margin-bottom: 20px;
}

.People_Content,
.row span {
  display: block;
  text-align: center;
  font-size: 1.1rem;
}

.NGO_About {
  font-size: 45px;
  font-weight: 400;
}

#Rest_Content {
  font-size: 20px;
}

.About_page_Photo {
  object-fit: contain;
}

.About_page_Photo img {
  max-width: 350px;
  height: auto;
  transition: transform 0.3s ease-in-out;
}

.About_page_Photo:hover img {
  transform: scale(1.3); /* Zoom 30% */
}

.Upcoming_events_row{

  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);

}

.Upcoming_events_content_photo {
  max-height: 400px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
}

.Upcoming_events_content_photo img {
  max-width: 100%;
  max-height: 100%;
  object-fit: contain;
}

.Upcoming_events_content{
  font-size: 20px;
}


@media (max-width: 992px) {
  .only-for-top {
    padding-top: 140px;
  }

  .main_name {
    font-size: 30px;
  }

  .payment_row,
  .donation p {
    max-width: 150px;
    max-height: 150px;
    font-size: 10px;
  }

  /* About Us */
  .NGO_About {
    font-size: 30px;
  }

  #Rest_Content {
    font-size: 15px !important;
  }

  /* Management team */

  #Heading {
    font-weight: 400;
    font-size: 15px;
  }

  .people {
    flex-direction: column;
  }
}

</style>

  <section class="only-for-top">
        <div class="container-fluid mt-5 pt-5 px-5">
            <h1 class="d-flex justify-content-center">Registration Form</h1>
            <form class="p-5" id="form1">

                <!-- Name & Gender -->

                <div class="form-group mt-2 mb-5">
                    <div class="row">
                        <!-- Name Label -->
                        <div class=" col-lg-3 col-md-6 d-flex align-items-center required-field">
                            <label for="Name" class="mb-0">Name :</label>
                        </div>
                        <!-- Name Input -->
                        <div class="col-lg-3 col-md-6">
                            <input type="text" class="form-control" id="Name" placeholder="">
                        </div>
                        <!-- Gender Label -->
                        <div class="col-lg-3 col-md-6 d-flex align-items-center required-field">
                            <label for="Gender" class="mb-0">Gender :</label>
                        </div>
                        <!-- Gender Select -->
                        <div class="col-lg-3 col-md-6">
                            <select class="form-control" required name="Gender" id="Gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- DOB AND S/O D/O -->
                <div class="line"></div>
                <div class="form-group mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-3 required-field">
                            <label for="">Date of Birth :</label>
                        </div>
                        <div class="col-md-3">
                            <input type="date" name="Dob" value="" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <select class="form-control  ml-md-3 mb-2" onchange="sdw()" name="sdw_type">
                                <option value="S/O">S/O</option>
                                <option value="D/O">D/O</option>
                                <option value="W/O">W/O</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="sdw_name" required="" value="" class="form-control"
                                placeholder="Son of">
                        </div>
                    </div>
                </div>

                <!--Profession and Blood Group -->

                <div class="line"></div>
                <div class="form-group mb-5 mt-5">
                    <div class="row">
                        <div class="col-md-3 required-field">
                            <label for="">Profession :</label>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control" name="Profession">
                                <option value="">Select Profession</option>
                                <option value="Government Job">Government Job</option>
                                <option value="Private Job">Private Job</option>
                                <option value="Police">Police</option>
                                <option value="Army">Army</option>
                                <option value="Farmer">Farmer</option>
                                <option value="Self Business">Self Business</option>
                                <option value="Student">Student</option>
                                <option value="House Wife">House Wife</option>
                            </select>
                        </div>
                        <div class="col-md-3 required-field">
                            <label for="">Blood Group :</label>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control" name="Aadhar_no">
                                <option value="">Select Blood Group</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                        </div>
                    </div>
                </div>


                <!-- State and district -->
                <div class="line"></div>
                <div class="form-group mb-5 mt-5">
                    <div class="row">
                        <div class="col-md-3 required-field">
                            <label for="">State :</label>
                        </div>
                        <div class="col-md-3">
                            <select required="" onchange="print_state('state', this.selectedIndex);" id="sts"
                                name="State" class="form-control">
                                <option value="">Select State</option>
                                <option value="Andaman &amp; Nicobar">Andaman &amp; Nicobar</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Dadra &amp; Nagar Haveli">Dadra &amp; Nagar Haveli</option>
                                <option value="Daman &amp; Diu">Daman &amp; Diu</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu &amp; Kashmir">Jammu &amp; Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Orissa">Orissa</option>
                                <option value="Pondicherry">Pondicherry</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Telangana">Telangana</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="Uttarakhand">Uttarakhand</option>
                                <option value="West Bengal">West Bengal</option>
                            </select>
                        </div>
                        <div class="col-md-3 required-field">
                            <label for="">District :</label>
                        </div>
                        <div class="col-md-3">
                            <select id="state" required="" class="form-control" name="City"></select>
                        </div>
                    </div>
                </div>


                <!-- Mobile and aadhar -->
                <div class="line"></div>
                <div class="form-group mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-3 required-field">
                            <label for="">Mobile No. :</label>
                        </div>

                        <div class="col-md-3">
                            <input type="text" required="" name="Mobile" value="" class="form-control"
                                placeholder="Mobile Number">
                        </div>
                        <div class="col-md-3 required-field">
                            <label for="">Aadhar No. :</label>
                        </div>

                        <div class="col-md-3">
                            <input type="text" name="whatsapp" value="" class="form-control" placeholder="Aadhar No.">
                        </div>
                    </div>
                </div>

                <!-- Address -->
                <div class="line"></div>
                <div class="form-group mb-5 mt-5">
                    <div class="row">
                        <div class="col-md-3 required-field">
                            <label for="">Address :</label>
                        </div>
                        <div class="col-md-9">
                            <textarea name="Address" required="" placeholder="Address" class="form-control"></textarea>
                        </div>
                    </div>
                </div>


                <!-- PINCODE and Email -->
                <div class="line"></div>
                <div class="form-group mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-3 required-field">
                            <label for="">Pin Code :</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="Pincode" value="" class="form-control" placeholder="Pincode"
                                required="">
                        </div>
                        <div class="col-md-3">
                            <label for="">Email :</label>
                        </div>
                        <div class="col-md-3">
                            <input type="email" name="Email" value="" class="form-control" placeholder="Email">
                        </div>
                    </div>
                </div>



                <!-- Button  -->
                <div class="line"></div>
                <div class="form-group">
                    <div class="d-flex justify-content-center">
                        <div class="">
                            <button type="button"
                                class="amount-btn btn-grad sub-btn px-4 py-2 mb-2 main text-white fs-5">PAY</button>
                        </div>
                    </div>
                </div>


                <!-- Profile Picture upload -->
                <div class="form-group">
                    <div class="row mt-5 mb-5">
                        <div class="col-md-3">
                            <label for="">Profile Picture :</label>
                        </div>
                        <div class="col-md-3">
                            <label class="upload-box">
                                <div class="upload-icon">+</div>
                                Upload
                                <input type="file" name="otherDocument">
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Document -->
                <div class="line"></div>
                <div class="form-group mt-5">
                    <div class="row">
                        <div class="col-md-3">
                            <select class="form-control" name="Doc_type" id="drop">
                                <option value="">Select Your ID</option>
                                <option value="Aadhar Card">Aadhar Card</option>
                                <option value="PAN Card">PAN Card</option>
                                <option value="Voter Card">Voter Card</option>
                                <option value="Driving Licence">Driving Licence</option>
                                <option value="Rashan Card">Rashan Card</option>
                                <option value="Class 10th Marksheet">Class 10th Marksheet</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="upload-box">
                                <div class="upload-icon">+</div>
                                Upload
                                <input type="file" name="otherDocument">
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label for="" id="label">Other Document</label>
                        </div>
                        <div class="col-md-3">
                            <label class="upload-box">
                                <div class="upload-icon">+</div>
                                Upload
                                <input type="file" name="otherDocument">
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Membership Card -->
                <div class="line"></div>
                <div class="payment_row" style="">
                    <div class="row">
                        <div class=" col-12 col-md-6">
                            <div class="donation main">
                                <p></p>
                                <p>Membership Fee - 100/-</p>

                                <p>Lifetime Fee - 2,100/-</p>

                                <p>&nbsp;</p>
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-3 p-4 required-field">
                            <label for="upi_scan">UPI SCAN :</label>
                        </div>
                        <div class="col-md-3">
                            <div class="qr_div">
                                <div class="qrcode">
                                    <img src="" height="auto" width="200px">
                                </div>
                                <a href="" download="scan_and_pay" class="donation_payment_img">
                                    <button type="button" class="btn btn-primary btn-block mt-1">Download</button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- UPI scan -->

                    <div class="line"></div>
                    <div class="form-group mt-5 mb-5">
                        <div class="row">
                            <div class="col-md-3 required-field">
                                <label for="payment_mode">Payment Mode :</label>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" name="Payment_mode" id="payment_mode">
                                    <option hidden="" selected="" value="">Payment Mode</option>
                                    <option value="Bank Transfer Slip">Bank Transfer Slip</option>
                                    <option value="Paytm">Paytm</option>
                                    <option value="Google Pay">Google Pay</option>
                                    <option value="Phonepe">Phonepe</option>
                                    <option value="Amazon Pay">Amazon Pay</option>
                                    <option value="Cheque">Cheque</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-3 required-field">
                                <label for="payment_receipt">Payment Receipt Upload :</label>
                            </div>
                            <div class="col-md-3">
                                <label class="upload-box">
                                    <div class="upload-icon">+</div>
                                    Upload
                                    <input type="file" name="otherDocument">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
                            


@endsection