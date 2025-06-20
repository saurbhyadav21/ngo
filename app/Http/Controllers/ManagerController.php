<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ManagerController extends Controller
{
    public function managerVerifiedUser(){
        return view('manager.varified-users');
    }

    public function getManagerVerifiedUser(Request $request){
             if ($request->ajax()) {
            $data = DB::table('customers')->where('status',1)->get();
            // dd($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                      $btn = '<a href="'.route('manager-user-details', ['id' => $row->id, 'type' => 'varified']).'" class="btn" style="margin-right:5px;">
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
      public function managerUnverifiedUser(){
        return view('manager.unverified-user');
    }

    public function getManagerUnverifiedUser(Request $request){
             if ($request->ajax()) {
            $data = DB::table('customers')->where('status',0)->get();
            // dd($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                      $btn = '<a href="'.route('manager-user-details', ['id' => $row->id, 'type' => 'unvarified']).'" class="btn" style="margin-right:5px;">
                        <img src="'.asset('images/view.png').'" alt="View" style="height:30px;">
                    </a>';
                    
                    $btn .= '<a href="javascript:void(0);" data-id="'.$row->id.'" class="delete btn">
                        <img src="'.asset('images/delete.png').'" alt="Delete" style="height:30px;">
                    </a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
         }
    }
      public function managerDoner(){
        return view('manager.donor');
    }

    public function getManagerDoner(Request $request){
             $query = DB::table('donation');

    // Default pe sirf Donation wale show honge (status = 3)
    if (!$request->has('status') || $request->status === '') {
        $query->where('status', 2);
    } else {
        $query->where('status', $request->status);
    }

    return datatables()->of($query)
        ->addColumn('action', function ($row) {
            
            $btn = '<a href="'.route('manager-doner-details', ['id' => $row->id]).'" class="btn" style="margin-right:5px;">
            <img src="'.asset('images/view.png').'" alt="View" style="height:30px;">
        </a>';
    $btn .= '<a href="'.route('doner-print', ['id' => $row->id]).'" target="_blank" class="btn">
            <img src="'.asset('images/pdf.png').'" alt="Print" style="height:30px;">
        </a>';
        $btn .= '<a href="javascript:void(0);" data-id="'.$row->id.'" class="delete btn">
            <img src="'.asset('images/delete.png').'" alt="Delete" style="height:30px;">
        </a>';


                    return $btn;
                })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function getManagerPendingUser(Request $request){
         if ($request->ajax()) {
            $data = DB::table('customers')->where('status',0)->get();
            // dd($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                      $btn = '<a href="'.route('manager-user-details', ['id' => $row->id, 'type' => 'pending']).'" class="btn" style="margin-right:5px;">
                        <img src="'.asset('images/view.png').'" alt="View" style="height:30px;">
                    </a>';
                  
                    $btn .= '<a href="javascript:void(0);" data-id="'.$row->id.'" class="delete btn">
                        <img src="'.asset('images/delete.png').'" alt="Delete" style="height:30px;">
                    </a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
         }
    }
    public function managerPending(Request $request){
        return view('manager.pending');
       
    }

    public function userDetails(Request $request,$id){
         $type=$request->query('type');
   
        //  dd($type);
    if ($type === 'varified') {
        $data = DB::table('customers')->where('id', $id)->first();
    } elseif ($type === 'unvarified') {
        $data = DB::table('customers')->where('id', $id)->first();
    }elseif ($type === 'pending') {
        $data = DB::table('customers')->where('id', $id)->first();
    }
     else {
        abort(404, 'Invalid type provided');
    }

    return view('manager.user-details', compact('data', 'type'));
    }

   public function deleteUser($id){
     DB::table('customers')->where('id',$id)->delete();

    return response()->json(['success'=> 'Customer Deleted Successfully']);
   }

   public function managerDonerDetails($id){

        $doner=DB::table('donation')->where('id',$id)->first();
    return view('manager.donor-details', compact('doner'));
   }

   public function donorStatusUpdate(Request $request){
        $user = DB::table('donation')->where('id', $request->id)->first();

        // dd($user);
if (!$user) {
    // Handle not found case manually
    return response()->json(['success' => false, 'message' => 'User not found']);
}

      $updated = DB::table('donation')
                ->where('id', $request->id)
                ->update(['status' => $request->status]);

    return response()->json([
        'success' => true,
        'message' => 'Status updated successfully.',
        'new_status' => $request->status
    ]);
   }

   public function deleteDoner($id){
 

      $doner = DB::table('donation')->where('id', $id)->first();

    if ($doner) {
        // Step 2: Delete the image file if it exists
        if (!empty($doner->image) && Storage::disk('public')->exists('uploads/' . $doner->image)) {
            Storage::disk('public')->delete('uploads/' . $doner->image);
        }

        // Step 3: Delete the database record
        DB::table('donation')->where('id', $id)->delete();

        return response()->json(['success' => 'Doner and image deleted successfully.']);
    }

    return response()->json(['error' => 'Doner not found.'], 404);
}
  }