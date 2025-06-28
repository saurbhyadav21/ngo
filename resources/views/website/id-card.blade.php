@extends('layouts.header')

@section('title', 'Header List')

@section('content')
       <!-- <link rel="stylesheet" href="{{ asset('template/stylesheett.css') }}"> -->
<style>
    
    .main {
    background-color: gray; /* dark background for contrast */
}

.btn-warning {
    background-color: green;
    border: none;
}

#invalid {
    color: red;
    font-size: 0.9rem;
}

@media (max-width: 576px) {
    #print-div {
        padding: 2rem !important;
    }
}

</style>

<section class="only-for-top">

    <div class="container mt-5 pt-5">
          <h3 class="mb-4 text-center" style="margin-top: 80px; font-weight: 800; color:rgba(0, 146, 69, 1)">Print ID Card</h3>


        <div class="d-flex justify-content-center">
            <div class="row shadow p-4 p-md-5  text-white rounded-3" id="print-div" style="max-width: 500px; width: 100%;">
                <form id="form2" method="post">
                    @csrf <!-- If you're using Laravel -->

                    <div class="form-group mb-3">
                        <label for="user_id">User ID:</label>
                        <input type="text" id="user_id" name="Userid" class="form-control" required placeholder="Enter User ID">
                    </div>

                    <div class="form-group mb-3">
                        <label for="dob">Date of Birth:</label>
                        <input type="date" name="Dob" class="form-control" id="dob" required>
                        <span id="invalid"></span>
                    </div>

                    <div class="d-flex justify-content-between">
                        <input type="submit" class="btn btn-warning text-white w-50 me-2" style="
                            background: linear-gradient(122deg, rgba(0, 146, 69, 1) 0%, rgba(135, 190, 65, 1) 100%);
                            
                            " id="idcard" name="submit" value="Download ID Card">
                                                <input type="submit" class="btn btn-secondary text-white w-50"  style="
                            background: linear-gradient(122deg, rgba(0, 146, 69, 1) 0%, rgba(135, 190, 65, 1) 100%);
                            
                            " name="submit1" id="letter" value="Appointment Letter">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


@endsection