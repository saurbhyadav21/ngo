<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\Manager;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [ProfileController::class, 'welcome'])->name('home');

    // Route::get('/getuser', [AdminController::class, 'getAllUser'])->name('getuser.data');
    Route::get('/get-varified-user', [AdminController::class, 'getVarifiedUser'])->name('get-varified-user');
    Route::get('/varified-user', [AdminController::class, 'index'])->name('varified-user.index');
    Route::get('/add-member', [AdminController::class, 'addMember'])->name('add-member');
    Route::post('/update-member', [AdminController::class, 'updateMember'])->name('update-member');
    
    Route::get('/get-unvarified-user', [AdminController::class, 'getUnvarifiedUser'])->name('get-unvarified-user');
    Route::get('/unvarified-user', [AdminController::class, 'index2'])->name('unvarified-user.index');

    Route::get('/user-details/{id}', [AdminController::class, 'userDetails'])->name('admin.user.details');
    Route::delete('/user-delete/{id}', [AdminController::class, 'deleteUser'])->name('user-delete.delete');

     Route::get('/get-pending-user', [AdminController::class, 'getPendingUser'])->name('get-pending-user');
    Route::get('/pending-user', [AdminController::class, 'pending'])->name('pending-user.index');

//activity routes

    Route::get('/all-activity', [AdminController::class, 'index3'])->name('all-activity.index');
    Route::get('/get-activity', [AdminController::class, 'getActivity'])->name('get-activity');
    Route::get('/add-activity', [AdminController::class, 'addActivity'])->name('add-activity');
    Route::post('/store-activity', [AdminController::class, 'storeActivity'])->name('store-activity');
    Route::get('/edit-activity/{id}', [AdminController::class, 'editActivity'])->name('edit-activity');
    Route::post('/edit-activity-store/{id}', [AdminController::class, 'storeEditActivity'])->name('edit-activity-store');
    Route::delete('/deleteActivity/{id}', [AdminController::class, 'deleteActivity'])->name('deleteActivity.delete');

//management routes

    Route::get('/management', [AdminController::class, 'management'])->name('management.index');
    Route::get('/get-management-list', [AdminController::class, 'getManagementList'])->name('get-management-list');
    Route::get('/add-new-management', [AdminController::class, 'addManagement'])->name('add-new-management');
    Route::post('/store-management', [AdminController::class, 'storeManagement'])->name('store-management');
    Route::get('/edit-management/{id}', [AdminController::class, 'editManagement'])->name('edit-management');
    Route::post('/edit-management-store/{id}', [AdminController::class, 'storeEditManagement'])->name('edit-management-store');
    Route::get('/view-management-details/{id}', [AdminController::class, 'managementDetails'])->name('view-management-details');
    Route::delete('/deleteManegement/{id}', [AdminController::class, 'deleteManegement'])->name('deleteManegement.delete');


//managers route
    Route::get('/managers', [AdminController::class, 'managers'])->name('managers.index');
    Route::get('/get-managers-list', [AdminController::class, 'getmanagersList'])->name('get-managers-list');
    Route::get('/add-new-manager', [AdminController::class, 'addManager'])->name('add-new-manager');
    Route::post('/store-manager', [AdminController::class, 'storeManager'])->name('store-manager');
    Route::get('/update-manager/{id}', [AdminController::class, 'updateManager'])->name('update-manager');
    Route::post('/edit-manager-store/{id}', [AdminController::class, 'storeEditManager'])->name('edit-manager-store');
    Route::get('/manager-details/{id}', [AdminController::class, 'managerDetails'])->name('managers-details');
    Route::delete('/deleteManagers/{id}', [AdminController::class, 'deleteManagers'])->name('deleteManegement.delete');



    //donation route

    Route::get('/donation', [AdminController::class, 'donation'])->name('donation');
    Route::get('/get-doner', [AdminController::class, 'getDoner'])->name('get-doner');
    Route::get('/add-new-doner', [AdminController::class, 'addDoner'])->name('add-new-doner');
    Route::post('/store-doner', [AdminController::class, 'storeDoner'])->name('store-doner');
    Route::get('/doner-details/{id}', [AdminController::class, 'donerDetails'])->name('doner-details');
    Route::get('/edit-doner/{id}', [AdminController::class, 'editDoner'])->name('edit-doner');
    Route::post('/edit-doner-store/{id}', [AdminController::class, 'storeEditDoner'])->name('edit-doner-store');
    Route::delete('/deleteDoner/{id}', [AdminController::class, 'deleteDoner'])->name('deleteDoner.delete');
Route::post('/doner/status-update', [AdminController::class, 'donerUpdateStatus'])->name('doner.status.update');
Route::get('/doner-print/{id}', [AdminController::class, 'donerPrint'])->name('doner-print');


// upcoming event route
    Route::get('/upcoming-event', [AdminController::class, 'upcoming'])->name('upcoming-event');
    Route::get('/get-upcoming-event', [AdminController::class, 'getUpcomingEvent'])->name('get-upcoming-event');
    Route::get('/add-new-event', [AdminController::class, 'addUpcomingEvent'])->name('add-new-event');
    Route::post('/store-upcoming-event', [AdminController::class, 'storeUpcomingEvent'])->name('store-upcoming-event');
    Route::get('/edit-upcoming-event/{id}', [AdminController::class, 'editUpcomingEvent'])->name('edit-upcoming-event');
    Route::get('/update-upcoming-event/{id}', [AdminController::class, 'updateUpcomingEvent'])->name('update-upcoming-event');
    Route::delete('/deleteUpcomingEvent/{id}', [AdminController::class, 'deleteUpcomingEvent'])->name('deleteUpcomingEvent');


//Testimonials route
    Route::get('/testimonials', [AdminController::class, 'testimonials'])->name('testimonials');
    Route::get('/get-testimonials', [AdminController::class, 'getTestimonials'])->name('get-testimonials');
    Route::get('/add-new-testimonials', [AdminController::class, 'addTestimonials'])->name('add-new-testimonials');
    Route::post('/create-new-testimonials', [AdminController::class, 'storeTestimonials'])->name('create-new-testimonials');
    Route::get('/edit-testimonials/{id}', [AdminController::class, 'editTestimonials'])->name('edit-testimonials');
    Route::post('/update-testimonials/{id}', [AdminController::class, 'updateTestimonials'])->name('update-testimonials');
    Route::delete('/delete-testimonials/{id}', [AdminController::class, 'deleteTestimonials'])->name('delete-testimonials');


    //about us post routes
    Route::get('/about-us-post', [AdminController::class, 'aboutUsPost'])->name('about-us-post');
    Route::get('/get-about-us-post', [AdminController::class, 'getAboutUsPost'])->name('get-about-us-post');
    Route::get('/add-new-about-us-post', [AdminController::class, 'addAboutUsPost'])->name('add-new-about-us-post');
    Route::post('/create-new-about-us-post', [AdminController::class, 'storeAboutUsPost'])->name('create-new-about-us-post');
    Route::delete('/deleteAboutUsPost/{id}', [AdminController::class, 'deleteAboutUsPost'])->name('deleteAboutUsPost');


    //objective
    Route::get('/objective', [AdminController::class, 'objective'])->name('objective');
    Route::get('/get-objectives', [AdminController::class, 'getObjectives'])->name('get-objectives');
    Route::get('/add-new-objective', [AdminController::class, 'addNewObjective'])->name('add-new-objective');
    Route::post('/create-new-objective', [AdminController::class, 'storeObjective'])->name('create-new-objective');
    Route::post('/updateObjective/{id}', [AdminController::class, 'updateObjective'])->name('updateObjective');
    Route::get('/edit-objective/{id}', [AdminController::class, 'editObjective'])->name('edit-objective');
    Route::delete('/deleteObjective/{id}', [AdminController::class, 'deleteObjective'])->name('deleteObjective');


//project list
    Route::get('/project', [AdminController::class, 'project'])->name('project');
    Route::get('/get-project', [AdminController::class, 'getProject'])->name('get-project');
    Route::get('/add-new-project', [AdminController::class, 'addNewProject'])->name('add-new-project');
    Route::post('/create-new-project', [AdminController::class, 'storeProject'])->name('create-new-project');
    Route::get('/edit-project/{id}', [AdminController::class, 'editProject'])->name('edit-project');
    Route::post('/updateProject/{id}', [AdminController::class, 'updateProject'])->name('updateProject');
    Route::delete('/deleteProject/{id}', [AdminController::class, 'deleteProject'])->name('deleteProject');

//certificate
    Route::get('/certificate', [AdminController::class, 'certificate'])->name('certificate');
    Route::get('/get-certificate', [AdminController::class, 'getCertificate'])->name('get-certificate');
    Route::get('/add-new-certificate', [AdminController::class, 'addNewCertificate'])->name('add-new-certificate');
    Route::post('/create-new-certificate', [AdminController::class, 'storeCertificate'])->name('create-new-certificate');
    Route::get('/edit-certificate/{id}', [AdminController::class, 'editCertificate'])->name('edit-certificate');
    Route::post('/updateCertificate/{id}', [AdminController::class, 'updateCertificate'])->name('updateCertificate');
    Route::delete('/deleteCertificate/{id}', [AdminController::class, 'deleteCertificate'])->name('deleteCertificate');


// achievment And awards
    Route::get('/achievements-awards', [AdminController::class, 'achievementsAwards'])->name('achievements-awards');
    Route::get('/get-achievements-awards', [AdminController::class, 'getAchievementsAwards'])->name('get-achievements-awards');
    Route::get('/add-new-achievements-awards', [AdminController::class, 'addNewAchievementsAwards'])->name('add-new-achievements-awards');
    Route::post('/create-newachievements-awards', [AdminController::class, 'storeAchievementsAwards'])->name('create-new-achievements-awards');
    Route::get('/edit-achievements-awards/{id}', [AdminController::class, 'editAchievementsAwards'])->name('edit-achievements-awards');
    Route::post('/updateAchievements-awards/{id}', [AdminController::class, 'updateAchievementsAwards'])->name('updateAchievements');
    Route::delete('/deleteAchievements/{id}', [AdminController::class, 'deleteAchievementsAwards'])->name('deleteAchievements');


//slider image
    Route::get('/sliderImage', [AdminController::class, 'sliderImage'])->name('sliderImage');
    Route::get('/get-sliderImage', [AdminController::class, 'getSliderImage'])->name('get-sliderImage');
    Route::get('/add-sliderImage', [AdminController::class, 'addSliderImage'])->name('add-sliderImage');
    Route::post('/create-sliderImage', [AdminController::class, 'storeSliderImage'])->name('create-sliderImage');
    Route::get('/edit-sliderImage/{id}', [AdminController::class, 'editSliderImage'])->name('edit-sliderImage');
    Route::post('/updateSliderImage/{id}', [AdminController::class, 'updateSliderImage'])->name('updateSliderImage');
    Route::delete('/deleteSliderImage/{id}', [AdminController::class, 'deleteSliderImage'])->name('deleteSliderImage');


    //company profile
    Route::get('/companyProfile', [AdminController::class, 'companyProfile'])->name('companyProfile');
    Route::post('/updateCompanyProfile/{id}', [AdminController::class, 'updateCompanyProfile'])->name('updateCompanyProfile');

    //backup data
    Route::get('/backupdata', [AdminController::class, 'backupdata'])->name('backupdata');
    Route::get('/backup/download', [AdminController::class, 'download'])->name('backup.download');

    //coordinator
    Route::get('/coordinator', [AdminController::class, 'coordinator'])->name('coordinator');
    Route::get('/get-coordinator', [AdminController::class, 'getCoordinator'])->name('get-coordinator');
    Route::get('/add-coordinator', [AdminController::class, 'addCoordinator'])->name('add-coordinator');
    Route::post('/create-coordinator', [AdminController::class, 'storeCoordinator'])->name('create-coordinator');
    Route::get('/edit-coordinator/{id}', [AdminController::class, 'editCoordinator'])->name('edit-coordinator');
    Route::post('/updateCoordinator/{id}', [AdminController::class, 'updateCoordinator'])->name('updateCoordinator');
    Route::get('/coordinator-details/{id}', [AdminController::class, 'coordinatorDetails'])->name('coordinator-details');
    Route::delete('/deleteCoordinator/{id}', [AdminController::class, 'deleteCoordinator'])->name('deleteCoordinator');

    Route::get('/seatBooked', [AdminController::class, 'seatBooked'])->name('seatBooked');
    Route::get('/get-seatBooked', [AdminController::class, 'getSeatBooked'])->name('get-seatBooked');
    Route::delete('/deleteBookSeat/{id}', [AdminController::class, 'deleteBookSeat'])->name('deleteBookSeat');


    Route::get('/participate', [AdminController::class, 'participate'])->name('participate');
    Route::get('/get-participate', [AdminController::class, 'getParticipate'])->name('get-participate');
    Route::delete('/delete-participate/{id}', [AdminController::class, 'deleteParticipate'])->name('delete-participate');

// web.php


//complain and solution

    Route::get('/complain-solution', [AdminController::class, 'complainSolution'])->name('complain-solution');
    Route::get('/get-complain-solution', [AdminController::class, 'getComplainSolution'])->name('get-complain-solution');
Route::get('/complain-solution/edit/{id}', [AdminController::class, 'editComplainSolution']);
Route::post('/complain-solution/update', [AdminController::class, 'updateComplainSolution'])->name('complain-solution-update');

//change password
Route::get('/change-password', [AdminController::class, 'showChangePasswordForm'])->name('change.password.form');
Route::post('/change-password', [AdminController::class, 'updatePassword'])->name('change.password.update');

// contact list
Route::get('/contact-list', [AdminController::class, 'contactList'])->name('contact-list');
Route::delete('/contacts/{id}', [AdminController::class, 'contactDelete'])->name('contacts.destroy');



Route::get('/coordinator/report', [AdminController::class, 'coordinatorReport'])->name('coordinator.report');
Route::get('/coordinator/data/{id}', function ($id) {
    $coordinator = DB::table('coordinators')->where('id', $id)->first();

    $customers = DB::table('customers')
        ->where('coordinator_id', $id)
        ->get();

    return response()->json([
        'coordinator' => $coordinator,
        'customers' => $customers
    ]);
});
Route::get('/user/edit-inline/{id}', function ($id) {   
    $user = DB::table('customers')->where('id', $id)->first();
    return view('partials.inline-edit-user', compact('user'));
});

Route::post('/user/update-inline', [AdminController::class, 'updateUserCoordinator'])->name('/user/update-inline');
Route::delete('/user/delete/{id}', [AdminController::class, 'deleteUserCoordinator'])->name('user.delete');

// web.php

Route::get('/member-t', function () {   
    
    return view('test.member');
});

Route::post('/user/status-update', [AdminController::class, 'ajaxUpdateStatus'])->name('user.status.update');
//  Route::get('/logoutAdmin', function () {
//     Auth::logout();
//     return redirect('/'); 
// })->name('logoutAdmin');


    Route::get('/dashboard', function () {
         $unverifiedCount     =  DB::table('customers')->where('status', 0)->count();
         $verifiedCount       =  DB::table('customers')->where('status', 1)->count();
         $donationCount       =  DB::table('donation')->count();
         $managementTeamCount =  DB::table('management')->count();
         $testimonialCount    =  DB::table('testimonials')->count();

        return view('dashboard', compact('unverifiedCount','verifiedCount','donationCount','managementTeamCount','testimonialCount'));
    })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/admin/dashboard', function () {
         $unverifiedCount     =  DB::table('customers')->where('status', 0)->count();
         $verifiedCount       =  DB::table('customers')->where('status', 1)->count();
         $donationCount       =  DB::table('donation')->count();
         $managementTeamCount =  DB::table('management')->count();
         $testimonialCount    =  DB::table('testimonials')->count();
         $contactList         =  DB::table('contact_list')->count();

        return view('dashboard', compact('unverifiedCount','verifiedCount','donationCount','managementTeamCount','testimonialCount','contactList'));
})->middleware('auth:web');

Route::middleware(['auth:manager'])->group(function () {
    Route::get('/manager/dashboard', function () {
        $unverifiedCount = DB::table('customers')->where('status', 0)->count();
        $verifiedCount   = DB::table('customers')->where('status', 1)->count();
        $pendingUser     = DB::table('customers')->where('status', 2)->count();
        $donationCount   = DB::table('donation')->count();

        return view('manager.dashboard', compact(
            'unverifiedCount',
            'verifiedCount',
            'pendingUser',
            'donationCount'
        ));
    })->name('manager.dashboard');
}); 
Route::get('/coordinator/dashboard', function () {
    // 1. Get logged-in coordinator ID
    $coordinatorId = auth()->guard('coordinator')->id();
// dd($coordinatorId);
    // 2. Get customers registered by this coordinator
    $customers = DB::table('customers')
        ->where('coordinator_id', $coordinatorId)
        ->get();

    // 3. Return to view
    return view('coordinator.dashboard', compact('customers'));
})->middleware('auth:coordinator');





// manager routes for verified user unverified user pending user donor 
Route::get('/managerVerifiedUser', [ManagerController::class, 'managerVerifiedUser'])->name('managerVerifiedUser.index');
Route::get('/get-managerVerifiedUser', [ManagerController::class, 'getManagerVerifiedUser'])->name('getManagerVerifiedUser');

Route::get('/managerUnverifiedUser', [ManagerController::class, 'managerUnverifiedUser'])->name('managerUnverifiedUser.index');
Route::get('/get-managerUnverifiedUser', [ManagerController::class, 'getManagerUnverifiedUser'])->name('getManagerUnverifiedUser');

Route::get('/managerDoner', [ManagerController::class, 'managerDoner'])->name('managerDoner');
Route::get('/get-managerDoner', [ManagerController::class, 'getManagerDoner'])->name('get-managerDoner');

Route::get('/get-managerpending-user', [ManagerController::class, 'getManagerPendingUser'])->name('get-managerpending-user');
Route::get('/managerpending-user', [ManagerController::class, 'managerPending'])->name('managerpending-user.index');

Route::get('/manager-user-details/{id}', [ManagerController::class, 'userDetails'])->name('manager-user-details');
Route::delete('/manager-user-delete/{id}', [ManagerController::class, 'deleteUser'])->name('manager-user-delete');

    Route::get('/manager-doner-details/{id}', [ManagerController::class, 'managerDonerDetails'])->name('manager-doner-details');

Route::post('/donation/status-update', [ManagerController::class, 'donorStatusUpdate'])->name('donation.status.update');

    Route::delete('/managerDeleteDoner/{id}', [ManagerController::class, 'deleteDoner'])->name('managerDeleteDoner.delete');
  Route::get('/logoutManager', function () {
    Auth::logout();
    return redirect('/'); 
})->name('logoutManager');

    //coordinator   
Route::get('/getCustomers', [CoordinatorController::class, 'getCustomers'])->name('getCustomers.index');

    Route::get('/add-user', [CoordinatorController::class, 'addUser'])->name('add-user');
    
    Route::post('/store-CoordinatorUser', [CoordinatorController::class, 'createUser'])->name('store-CoordinatorUser');
Route::get('/coordinator-user-details/{id}', [CoordinatorController::class, 'userDetails'])->name('coordinator-user-details');
    Route::delete('/coordinatorDeleteUser/{id}', [CoordinatorController::class, 'deleteUser'])->name('coordinatorDeleteUser.delete');


    Route::post('/logoutCoordinator', function () {
    Auth::logout();
    return redirect('/'); 
})->name('logoutCoordinator');




































//website links


Route::get('/member-apply', function () {
    return view('website.member-apply');
});
Route::get('/id-card', function () {
    return view('website.id-card');
});
Route::get('/upcoming-event-website', function () {
        $events = DB::table('upcoming_event')
        ->orderBy('created_at', 'desc')
        ->limit(5)
        ->get();

    return view('website.upcoming-event',compact('events'));
});

Route::get('/donate-website', function () {
    return view('website.donate');
});


Route::get('/list-of-donors', function () {
    $donors = DB::table('donation')
        ->where('status', 1)
        ->orderBy('created_at', 'desc')
        ->get();

    return view('website.list-of-donors', compact('donors'));
});

Route::post('/donors/search', [WebsiteController::class, 'search'])->name('donors.search');

Route::get('/contact-us-website', function () {
    return view('website.contact-us');
});

Route::post('/create-contact-list-website', [WebsiteController::class, 'addContactList'])->name('create-contact-list-website');


Route::get('/about-us-website', function () {
    $companyProfile = DB::table('company_profile')->first();
    $aboutUsPost = DB::table('about_us_post')->first();

    return view('website.about-us', compact('companyProfile','aboutUsPost'));
});
Route::get('/management-team-website', function () {
    $managementTeams = DB::table('management')
        ->orderBy('created_at', 'desc')
        ->get();

    return view('website.management-team', compact('managementTeams'));
});

Route::post('/management/search', [WebsiteController::class, 'searchManagement'])->name('management.search');

Route::get('/team-member-website', function () {
    $customers = DB::table('customers')
        ->where('status', 1)
        ->orderBy('created_at', 'desc')
        ->get();

    return view('website.our-team', compact('customers'));
});

Route::post('/team-member/search', [WebsiteController::class, 'searchCustomers'])->name('team-member.search');


Route::get('/achievement-website', function () {
    $achievements = DB::table('achievementsawards')
        ->where('status', 1)
        ->orderBy('created_at', 'desc')
        ->get();

    return view('website.achievement', compact('achievements'));
});

Route::get('/certification-website', function () {
    $certificates = DB::table('certificate')
        ->where('status', 1)
        ->orderBy('created_at', 'desc')
        ->get();

    return view('website.certification', compact('certificates'));
});

Route::get('/crowdfunding-website', function () {
        $events = DB::table('upcoming_event')
        ->orderBy('created_at', 'desc')
        ->limit(5)
        ->get();

    return view('website.crowdfunding',compact('events'));
});
Route::get('/our-solution-website', function () {
        $complains = DB::table('complain_suggestion')
        ->orderBy('created_at', 'desc')
        ->limit(2)
        ->get();

    return view('website.our-solution',compact('complains'));
});

Route::get('/your-problem-website', function () {
    
    return view('website.your-problem');
});
Route::post('/add-your-problem', [WebsiteController::class, 'addYourProblem'])->name('add-your-problem');

Route::get('/our-project-website', function () {
        $projects = DB::table('project_list')
        ->orderBy('created_at', 'desc')
        ->limit(2)
        ->get();

    return view('website.our-project',compact('projects'));
});
require __DIR__.'/auth.php';
