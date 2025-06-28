<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{
  public function search(Request $request)
{
    $search = trim($request->input('search'));

    $donors = DB::table('donation')
        ->where('status', 1)
        ->when($search, function ($q) use ($search) {
            $q->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('phone', 'like', "%{$search}%")
                      ->orWhere('amount', 'like', "%{$search}%");
            });
        })
        ->orderBy('created_at', 'desc')
        ->get();

    $html = view('partials.donor-cards', compact('donors'))->render();

    return response()->json(['html' => $html]);
}

public function searchManagement(Request $request){
     $search = trim($request->input('search'));

    $managementTeams = DB::table('management')
        ->when($search, function ($q) use ($search) {
            $q->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('mobile', 'like', "%{$search}%")
                      ->orWhere('position', 'like', "%{$search}%")
                      ->orWhere('designation', 'like', "%{$search}%");
            });
        })
        ->orderBy('created_at', 'desc')
        ->get();

    $html = view('partials.management-cards', compact('managementTeams'))->render();

    return response()->json(['html' => $html]);
}

public function searchCustomers(Request $request){
     $search = trim($request->input('search'));

    $customers = DB::table('customers')
        ->where('status', 1)
        ->when($search, function ($q) use ($search) {
            $q->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('district', 'like', "%{$search}%")
                      ->orWhere('authority', 'like', "%{$search}%")
                      ->orWhere('state', 'like', "%{$search}%");
            });
        })
        ->orderBy('created_at', 'desc')
        ->get();

    $html = view('partials.team-member-cards', compact('customers'))->render();

    return response()->json(['html' => $html]);
}

public function addContactList(Request $request){

    $validateData=$request->validate([
        'name'=>'required|string',
        'phone'=>'required|string',
        'email'=>'required|string',
        'topic'=>'required|string',
        'description'=>'required|string', 
    ]);

    $saveData=[
        'name'=>$validateData['name'],
        'phone'=>$validateData['phone'],
        'email'=>$validateData['email'],
        'topic'=>$validateData['topic'],
        'description'=>$validateData['description'],
        'created_at'=>now(),
    ];

    DB::table('contact_list')->insert($saveData);
    
    return redirect()->back()->with('success','Application Send Succesfully'); 
}

public function addYourProblem(Request $request){
     $validated = $request->validate([
        'name' => 'required|string',
        'phone' => 'required|string',
        'city' => 'required|string',
        'video_url' => 'nullable|string',
        'message' => 'nullable|string',
        'description' => 'nullable|string',
        'upload_document_1' => 'required|file|mimes:pdf,jpg,jpeg,png',
        'upload_document_2' => 'required|file|mimes:pdf,jpg,jpeg,png',
    ]);

    // dd($validated);

    $upload_document_1 = null;
    $upload_document_2 = null;

    // Handle profile image
    // dd($request->hasFile('image'));
    if ($request->hasFile('upload_document_1')) {
       
        $file = $request->file('upload_document_1');
        $upload_document_1 = time() . '_upload_document_1_' . $file->getClientOriginalName();
        $file->storeAs('uploads', $upload_document_1, 'public');
        
    }

    if ($request->hasFile('upload_document_2')) {
      
        $file = $request->file('upload_document_2');
        $upload_document_2 = time() . '_upload_document_2_' . $file->getClientOriginalName();
        $file->storeAs('uploads', $upload_document_2, 'public');
    }

 
    DB::table('complain_suggestion')->insert([
        'name' => $request->name,
        'phone' => $request->phone,
        'city' => $request->city,
        'video_url' => $request->video_url,
        'message' => $request->message,
        'description' => $request->description,
        'status' => '0',
        'upload_document_1' => $upload_document_1,
        'upload_document_2' => $upload_document_2,   
        'created_at' => now(),
    ]);

    return redirect()->back()->with('success', 'Your Problem Send successfully!');

}

public function bookSeatPage($id){
    return view('website.book-seat',compact('id'));
}

public function bookSeat(Request $request,$id){
    $validated=$request->validate([
        'name'=>'required|string',
        'phone'=>'required|string',
        'city'=>'required|string',
        'in_team'=>'nullable|string',
        'id_number'=>'nullable|string',
    ]);
    $saveBooking=[
        'name'=>$validated['name'],
        'mobile'=>$validated['phone'],
        'city'=>$validated['city'],
        'team_member'=>$validated['in_team'],
        'id_number'=>$validated['id_number'],
        'upcoming_event_id'=>$id,
        'created_at'=>now(),
    ];

    DB::table('seat_booked')->insert($saveBooking);

    return redirect()->back()->with('success','Seat Booked Succefully');
}

public function participatedPage($id){
    return view('website.participate',compact('id'));
}

public function addParticipated(Request $request,$id){
    $validated=$request->validate([
        'name'=>'required|string',
        'phone'=>'required|string',
        'city'=>'required|string',
        'want_to_donate'=>'required|string',
        'in_team'=>'nullable|string',
        'id_number'=>'nullable|string',
    ]);
    $saveBooking=[
        'name'=>$validated['name'],
        'mobile'=>$validated['phone'],
        'city'=>$validated['city'],
        'team_member'=>$validated['in_team'],
        'id_number'=>$validated['id_number'],
        'want_to_donate'=>$validated['want_to_donate'],
        'upcoming_event_id'=>$id,
        'created_at'=>now(),
    ];

    DB::table('participation')->insert($saveBooking);

    return redirect()->back()->with('success','Participation Add Succefully');
}

public function showMembershipInfo()
{
    $company = DB::table('company_profile')->first(); // or use Eloquent if applicable

    return view('website.donate-page', compact('company'));
}

}
