<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   <style>
.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 266px;
    height: 100%;
    background: #222;
    color: #fff;
    z-index: 1000;
    padding-top: 40px;
    transition: 0.3s;
    overflow-y: auto;
}

/* Push body content on desktop */
body {
    padding-left: 250px;
}

/* Sidebar header */
.sidebar-header {
    position: absolute;
    top: 0; 
    width: 250px;
    /* background: #fad02c; */
    color: #000;
    padding: 15px 20px;
    z-index: 1001;
    font-weight: bold;
}

.sidebar-header button {
    background: transparent;
    border: none;
    font-size: 20px;
    float: right;
    cursor: pointer;
}

.sidebar-menu {
    list-style: none;
    padding: 0;
    margin-top: 20px;
}

.sidebar-menu li {
    border-bottom: 1px solid #444;
}

.sidebar-menu li a {
    display: block;
    color: #fff;
    text-decoration: none;
    padding: 15px 20px;
}

.sidebar-menu li a:hover {
    background-color: #333;
}

/* Sidebar toggle button */
.open-sidebar {
    position: fixed;
    top: 15px;
    left: 15px;
    /* background: #fad02c; */
    border: none;
    padding: 8px 12px;
    font-size: 20px;
    z-index: 1100;
    border-radius: 5px;
    cursor: pointer;
}

@media (max-width: 991px) {
    .sidebar {
        left: -250px;
        
    }

    

    .sidebar.active {
        left: 0;
    }

    body {
        padding-left: 0;
    }
 
}
.has-dropdown > a {
    cursor: pointer;
    position: relative;
}

.dropdown-menu {
    display: none;
    list-style: none;
    padding-left: 20px;
    background-color: #222;
}

.dropdown-menu li a {
    padding: 10px 50px;
    display: block;
    color: #fff;
    text-decoration: none;
   
}

.dropdown-menu li a:hover {
    background-color: #333;
}

</style>
<div class="sidebar" id="sidebar" >
    <div class="sidebar-header">
        <h3 style="color: white;">Menu</h3>
        <!-- <img src="{{ asset('images/edit.png') }}" alt="Edit" style="height:30px;"> -->

        <button class="close-sidebar d-lg-none" onclick="toggleSidebar()">×</button>
    </div>
    <ul class="sidebar-menu">
        <li><a href="/dashboard">Dashboard</a></li>
        <li class="has-dropdown">
            <a href="javascript:void(0)" onclick="toggleDropdown()">Users ▾</a>
            <ul class="dropdown-menu" id="users-dropdown">
                <li><a href="{{ route('varified-user.index') }}">Varified Users</a></li>
                <li><a href="{{ route('unvarified-user.index') }}">Unvarified User</a></li>
                <li><a href="{{ route('pending-user.index') }}">Pending User</a></li>
            </ul>
        </li>

        <li><a href="{{ route('all-activity.index') }}">All Activity</a></li>
        <li><a href="{{ route('upcoming-event') }}">Upcoming Event</a></li>
        <li><a href="{{ route('seatBooked') }}">Seat Booked</a></li>
        <li><a href="{{ route('participate') }}">Participation</a></li>
        <li><a href="{{ route('donation') }}" id="login-button">Donation</a></li>
        <li><a href="{{ route('management.index') }}" id="login-button">Management Team</a></li>
        <li><a href="{{ route('managers.index') }}" id="login-button">Managers</a></li>
        <li><a href="{{ route('coordinator') }}" id="login-button">Cordinators</a></li>
        <li><a href="#" id="login-button">Cordinator Report</a></li>
        <li><a href="#" id="login-button">Complain / Solution Event</a></li>
        <li><a href="{{ route('testimonials') }}" id="login-button">Testimonials</a></li>
        <li><a href="{{ route('about-us-post') }}" id="login-button">About Us Post</a></li>
        <li><a href="{{ route('companyProfile') }}" >Company Profile</a></li>
        <li><a href="{{ route('objective') }}" id="login-button">Objectives</a></li>
        <li><a href="{{ route('project') }}" id="login-button">Projects</a></li>
        <li><a href="{{ route('certificate') }}" id="login-button">Certification</a></li>
        <li><a href="{{ route('achievements-awards') }}" id="login-button">Achievements/Awards</a></li>
        <li><a href="{{ route('sliderImage') }}" id="login-button">Slider Image</a></li>
        <li><a href="{{ route('backupdata') }}" id="login-button">Backup Data</a></li>
        <li><a href="{{ route('logout') }}">Logout</a></li>
    </ul>
</div>
 {{-- Page Content --}}
    <div class="container mt-4">
         @yield('header')
        @yield('content')
    </div>


    <script>
function toggleDropdown() {
    const menu = document.getElementById("users-dropdown");
    menu.style.display = (menu.style.display === "block") ? "none" : "block";
}
</script>


</x-app-layout>
