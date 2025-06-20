<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class CoordinatorController extends Controller
{
    public function getCustomers(Request $request){
          if ($request->ajax()) {
    $coordinatorId = auth()->guard('coordinator')->id();

            $data = DB::table('customers')->where('coordinator_id',$coordinatorId)->get();
            // dd($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                      $btn = '<a href="'.route('coordinator-user-details', ['id' => $row->id]).'" class="btn" style="margin-right:5px;">
                        <img src="'.asset('images/view.png').'" alt="View" style="height:30px;">
                    </a>';
                    // $btn .= '<a href="'.route('edit-coordinator', ['id' => $row->id]).'" class="btn" style="margin-right:5px;">
                    //     <img src="'.asset('images/edit.png').'" alt="Edit" style="height:30px;">
                    // </a>';
                    $btn .= '<a href="javascript:void(0);" data-id="'.$row->id.'" class="delete btn">
                        <img src="'.asset('images/delete.png').'" alt="Delete" style="height:30px;">
                    </a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
         }
    }

    public function addUser(){
        return view('coordinator.add-user');
    }

   public function createUser(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'gender' => 'required|string',
        'phone' => 'required|string',
        'profession' => 'required|string',
        'dob' => 'required|date|before:today',
        'blood_group' => 'required|string',
        'state' => 'required|string',
        'city' => 'required|string',
        'address' => 'required|string',
        'aadhar_number' => 'required|string',
        'validity_start'=>'nullable|string',
        'validity_end'=>'nullable|string',
        'Authority'=>'required|string',
        'pincode' => 'required|string',
        'sdw_type' => 'required|string',
        'sdw_name' => 'required|string',
        'id_type' => 'nullable|string',
        'id_file' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
        'image' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
        'other_document' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
        'remarks' => 'required|string',
    ]);

    // File uploads
    $profile_image = null;
    $id_image = null;
    $other_document = null;

    if ($request->hasFile('image')) {
        $image = $request->file('image'); 
        $profile_image = time().'_profile_image.'.$image->getClientOriginalExtension(); 
        $image->storeAs('uploads', $profile_image, 'public'); 
    }

    if ($request->hasFile('id_file')) {
        $image = $request->file('id_file'); 
        $id_image = time().'_id_image.'.$image->getClientOriginalExtension(); 
        $image->storeAs('uploads', $id_image, 'public'); 
    }

    if ($request->hasFile('other_document')) {
        $image = $request->file('other_document'); 
        $other_document = time().'_other_document.'.$image->getClientOriginalExtension(); 
        $image->storeAs('uploads', $other_document, 'public'); 
    }

    // ✅ Get authenticated coordinator ID
    $coordinatorId = auth()->guard('coordinator')->id();

    // Insert into DB
    DB::table('customers')->insert([
        'name' => $request->name,
        'email' => $request->email,
        'gender' => $request->gender,
        'mobile_number' => $request->phone,
        'profession' => $request->profession,
        'dob' => $request->dob,
        'blood_group' => $request->blood_group,
        'state' => $request->state,
        'district' => $request->city,
        'address' => $request->address,
        'pin_code' => $request->pincode,
        'aadhar_number' => $request->aadhar_number,
        'validity_start' => $request->validity_start,
        'validity_end' => $request->validity_end,
        'authority' => $request->authority,
        'relation_type' => $request->sdw_type,
        'relation_name' => $request->sdw_name,
        'id_type' => $request->id_type,
        'id_image' => $id_image,
        'profile_image' => $profile_image,
        'other_document' => $other_document,
        'remarks' => $request->remarks,
        'registered_by' => 'coordinator',
        'coordinator_id' => $coordinatorId,  // ✅ yahan coordinator ki ID store ho rahi hai
        'created_at' => now()
    ]);

    return redirect()->back()->with('success', 'User added successfully!');
}



    public function userDetails($id){
        $data=DB::table('customers')->where('id',$id)->first();
        return view('coordinator.coordinator-user-details',compact('data'));
    }

    public function deleteUser($id){
     $customer = DB::table('customers')->where('id', $id)->first();

if ($customer) {
    // Delete profile image
    if (!empty($customer->profile_image) && Storage::disk('public')->exists('uploads/' . $customer->profile_image)) {
        Storage::disk('public')->delete('uploads/' . $customer->profile_image);
    }

    // Delete ID image
    if (!empty($customer->id_image) && Storage::disk('public')->exists('uploads/' . $customer->id_image)) {
        Storage::disk('public')->delete('uploads/' . $customer->id_image);
    }

    // Delete other document
    if (!empty($customer->other_document) && Storage::disk('public')->exists('uploads/' . $customer->other_document)) {
        Storage::disk('public')->delete('uploads/' . $customer->other_document);
    }

    // Delete the customer record
    DB::table('customers')->where('id', $id)->delete();

    return response()->json(['success' => 'Customer and all images deleted successfully.']);
}

return response()->json(['error' => 'Customer not found.'], 404);
    }
}
