<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

use Excel;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;
use PDF;

class AdminController extends Controller
{

    //user
    public function index(){

        return view('admin.varified-user');
        // dd('ff');
    }
    public function index2(){
        
        return view('admin.unvarified-user');
        // dd('ff');
    }

    //activity
// ----------------------------------------------------------------------------------------------------------------------

     public function index3(){
        return view('admin.all-activity');
        // dd('ff');
    }

    public function addActivity(){
        return view('admin.add-activity');
    }

    public function editActivity(Request $request,$id){

        $activity=DB::table('activity')->where('id',$id)->first();

        return view('admin.edit-add',compact('activity'));
    }


    //management
// ----------------------------------------------------------------------------------------------------------------------

    public function management(){
        return view('admin.management-team');
    }
      public function addManagement(Request $request){

    return view('admin.add-management');
   }

    public function managementDetails(Request $request,$id){

        $managementId=DB::table('management')->where('id',$id)->first();
        return view('admin.management-details',compact('managementId'));
   }
   public function editManagement(Request $request,$id){
        $management=DB::table('management')->where('id',$id)->first();
        return view('admin.edit-management',compact('management'));
   }

// ----------------------------------------------------------------------------------------------------------------------
   //about us post
// ----------------------------------------------------------------------------------------------------------------------

   public function aboutUsPost(){
    return view('admin.about-us-post');
   }

   public function addAboutUsPost(){
    return view('admin.add-about-us-post');
   }

   public function storeAboutUsPost(Request $request){
        $validate=$request->validate([

            'image'=>'required|image|mimes:jpg,png,jpeg',
            'title'=>'required|string',
            'description'=>'required|string',
            

    ]);

    if ($request->hasFile('image')) {
                $image = $request->file('image'); 
                $image_name = time().'_aboutuspost_image.'.$image->getClientOriginalExtension(); 
                $image->storeAs('uploads', $image_name, 'public'); 

                }
$plainDescription = strip_tags($validate['description']);
                DB::table('about_us_post')->insert([
                    'image'=>$image_name,
                    'title'=>$request->title,
                    'description'=>$plainDescription,
                   
                    'created_at'=>now(),
                ]);

                return redirect()->back()->with('success','New About Us Post Add Successfully');
   }

   public function getAboutUsPost(Request $request){
     if ($request->ajax()) {
            $data = DB::table('about_us_post')->get();
            // dd($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    
                    $btn = ' <a href="javascript:void(0);" data-id="'.$row->id.'" class="delete btn">
                    <img src="'.asset('images/delete.png').'" alt="Delete" style="height:30px;">
                    
                    </a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
         }
   }



public function deleteAboutUsPost($id)
{
    // Step 1: Get the record
    $post = DB::table('about_us_post')->where('id', $id)->first();

    if ($post) {
        // Step 2: Delete image using Laravel Storage
        if (!empty($post->image) && Storage::disk('public')->exists('uploads/' . $post->image)) {
            Storage::disk('public')->delete('uploads/' . $post->image);
        }

        // Step 3: Delete database record
        DB::table('about_us_post')->where('id', $id)->delete();

        return response()->json(['success' => 'Post and image deleted successfully.']);
    }

    return response()->json(['error' => 'Post not found.'], 404);
}

// ----------------------------------------------------------------------------------------------------------------------
    //objectives
// ----------------------------------------------------------------------------------------------------------------------

    public function objective(){
        return view('admin.objective');
    }

    public function getObjectives(Request $request){
        if ($request->ajax()) {
            $data = DB::table('objectives')->get();
            // dd($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                     $btn = '<a href="'.route('edit-objective', ['id' => $row->id]).'" class="view btn ">
                    <img src="'.asset('images/edit.png').'" alt="Edit" style="height:30px;">
                    </a>';
                    $btn .= ' <a href="javascript:void(0);" data-id="'.$row->id.'" class="delete btn">
                    <img src="'.asset('images/delete.png').'" alt="Delete" style="height:30px;">
                    
                    </a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
         }
    }

    public function addNewObjective(){
        return view('admin.add-objective');
    }
        public function editObjective($id){

        $objectiveId=DB::table('objectives')->where('id',$id)->first();
        return view('admin.edit-objective',compact('objectiveId'));
    }

    public function storeObjective(Request $request){
         $validate=$request->validate([

            'project_image'=>'required|image|mimes:jpg,png,jpeg',
            'title'=>'required|string',
            'description'=>'required|string',
            
    ]);

    if ($request->hasFile('project_image')) {
                $image = $request->file('project_image'); 
                $image_name = time().'_objective_image.'.$image->getClientOriginalExtension(); 
                $image->storeAs('uploads', $image_name, 'public'); 

                }
$plainDescription = strip_tags($validate['description']);
                DB::table('objectives')->insert([
                    'project_image'=>$image_name,
                    'title'=>$request->title,
                    'description'=>$plainDescription,
                   
                    'created_at'=>now(),
                ]);

                return redirect()->back()->with('success','New Objective Add Successfully');
    } 



public function updateObjective(Request $request, $id)
{
    $validate = $request->validate([
        'objective_image' => 'required|image|mimes:jpg,png,jpeg',
        'title' => 'required|string',
        'description' => 'required|string',
    ]);

    $objective = DB::table('objectives')->where('id', $id)->first();

    if (!$objective) {
        return redirect()->back()->with('error', 'Objective not found.');
    }

    $image_name = $objective->project_image; // default to old image

    if ($request->hasFile('objective_image')) {
        $oldPath = 'uploads/' . $objective->project_image;

        // ✅ Check if file exists, then delete it
        if (!empty($objective->project_image) && Storage::disk('public')->exists($oldPath)) {
            Storage::disk('public')->delete($oldPath);
        }

        // ✅ Upload new image
        $image = $request->file('objective_image');
        $image_name = time() . '_objective_image.' . $image->getClientOriginalExtension();
        $image->storeAs('uploads', $image_name, 'public');
    }

    $plainDescription = strip_tags($validate['description']);

    DB::table('objectives')->where('id', $id)->update([
        'objective_image' => $image_name,
        'title' => $validate['title'],
        'description' => $plainDescription,
    ]);

    return redirect()->back()->with('success', 'Objective updated successfully.');
}



    public function deleteObjective($id){
        $post = DB::table('objectives')->where('id', $id)->first();

    if ($post) {
        // Step 2: Delete image using Laravel Storage
        if (!empty($post->objective_image) && Storage::disk('public')->exists('uploads/' . $post->objective_image)) {
            Storage::disk('public')->delete('uploads/' . $post->objective_image);
        }


        // Step 3: Delete database record
        DB::table('objectives')->where('id', $id)->delete();

        return response()->json(['success' => 'Objective and image deleted successfully.']);
    }

    return response()->json(['error' => 'Post not found.'], 404);
    }



// ----------------------------------------------------------------------------------------------------------------------
    //projects
// ----------------------------------------------------------------------------------------------------------------------

public function project(){

    return view('admin.project');

}

public function getProject (Request $request){
if ($request->ajax()) {
            $data = DB::table('project_list')->get();
            // dd($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                     $btn = '<a href="'.route('edit-project', ['id' => $row->id]).'" class="view btn ">
                    <img src="'.asset('images/edit.png').'" alt="Edit" style="height:30px;">
                    </a>';
                    $btn .= ' <a href="javascript:void(0);" data-id="'.$row->id.'" class="delete btn">
                    <img src="'.asset('images/delete.png').'" alt="Delete" style="height:30px;">
                    
                    </a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
         }
}

public function addNewProject(){

    return view('admin.add-project');
}

public function editProject($id){

    $projectId=DB::table('project_list')->where('id',$id)->first();
    return view('admin.edit-project',compact('projectId'));
}

public function storeProject(Request $request){
     
         $validate=$request->validate([

            'project_image'=>'required|image|mimes:jpg,png,jpeg',
            'title'=>'required|string',
            'description'=>'required|string',
            
    ]);

    if ($request->hasFile('project_image')) {
                $image = $request->file('project_image'); 
                $image_name = time().'_project_image.'.$image->getClientOriginalExtension(); 
                $image->storeAs('uploads', $image_name, 'public'); 

                }
$plainDescription = strip_tags($validate['description']);
                DB::table('project_list')->insert([
                    'project_image'=>$image_name,
                    'title'=>$request->title,
                    'description'=>$plainDescription,
                   
                    'created_at'=>now(),
                ]);

                return redirect()->back()->with('success','New Project Add Successfully');
}

public function updateProject(Request $request ,$id){
    $validate = $request->validate([
        'project_image' => 'required|image|mimes:jpg,png,jpeg',
        'title' => 'required|string',
        'description' => 'required|string',
    ]);

    $objective = DB::table('project_list')->where('id', $id)->first();

    if (!$objective) {
        return redirect()->back()->with('error', 'Objective not found.');
    }

    $image_name = $objective->project_image; // default to old image

    if ($request->hasFile('project_image')) {
        $oldPath = 'uploads/' . $objective->project_image;

        // ✅ Check if file exists, then delete it
        if (!empty($objective->project_image) && Storage::disk('public')->exists($oldPath)) {
            Storage::disk('public')->delete($oldPath);
        }

        // ✅ Upload new image
        $image = $request->file('project_image');
        $image_name = time() . '_project_image.' . $image->getClientOriginalExtension();
        $image->storeAs('uploads', $image_name, 'public');
    }

    $plainDescription = strip_tags($validate['description']);

    DB::table('project_list')->where('id', $id)->update([
        'project_image' => $image_name,
        'title' => $validate['title'],
        'description' => $plainDescription,
    ]);

    return redirect()->back()->with('success', 'Project  updated successfully.');
}


public function deleteProject($id){
     $post = DB::table('project_list')->where('id', $id)->first();

    if ($post) {
        // Step 2: Delete image using Laravel Storage
        if (!empty($post->project_image) && Storage::disk('public')->exists('uploads/' . $post->project_image)) {
            Storage::disk('public')->delete('uploads/' . $post->project_image);
        }

        // Step 3: Delete database record
        DB::table('project_list')->where('id', $id)->delete();

        return response()->json(['success' => 'Project and image deleted successfully.']);
    }

    return response()->json(['error' => 'Post not found.'], 404);
}




// ----------------------------------------------------------------------------------------------------------------------
    //certiificate
// ----------------------------------------------------------------------------------------------------------------------

public function certificate(){
    return view('admin.certificate');
}

public function getCertificate(Request $request){

    if ($request->ajax()) {
            $data = DB::table('certificate')->get();
            // dd($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                     $btn = '<a href="'.route('edit-certificate', ['id' => $row->id]).'" class="view btn ">
                    <img src="'.asset('images/edit.png').'" alt="Edit" style="height:30px;">
                    </a>';
                    $btn .= ' <a href="javascript:void(0);" data-id="'.$row->id.'" class="delete btn">
                    <img src="'.asset('images/delete.png').'" alt="Delete" style="height:30px;">
                    
                    </a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
         }
}

public function addNewCertificate(){
    return view('admin.add-certificate');
}


public function storeCertificate(Request $request){
      $validate=$request->validate([

            'certificate_image'=>'required|image|mimes:jpg,png,jpeg',
            'title'=>'required|string',
            'Position'=>'required|string',
            'Status'=>'required|string',
            
    ]);

    if ($request->hasFile('certificate_image')) {
                $image = $request->file('certificate_image'); 
                $image_name = time().'_certificate_image.'.$image->getClientOriginalExtension(); 
                $image->storeAs('uploads', $image_name, 'public'); 

                }

                DB::table('certificate')->insert([
                    'certificate_image'=>$image_name,
                    'title'=>$request->title,
                    'position'=>$validate['Position'],
                    'status'=>$validate['Status'],
                   
                    'created_at'=>now(),
                ]);

                return redirect()->back()->with('success','Certificate Add Successfully');
}

public function editCertificate($id){

    $certificateId= DB::table('certificate')->where('id',$id)->first();
    return view('admin.edit-certificate',compact('certificateId'));

}

public function updateCertificate(Request $request,$id){
     $validate = $request->validate([
         'certificate_image'=>'required|image|mimes:jpg,png,jpeg',
            'title'=>'required|string',
            'Position'=>'required|string',
            'Status'=>'required|string',
    ]);

    $objective = DB::table('certificate')->where('id', $id)->first();

    if (!$objective) {
        return redirect()->back()->with('error', 'Objective not found.');
    }

    $image_name = $objective->certificate_image; // default to old image

    if ($request->hasFile('certificate_image')) {
        $oldPath = 'uploads/' . $objective->certificate_image;

        
        if (!empty($objective->certificate_image) && Storage::disk('public')->exists($oldPath)) {
            Storage::disk('public')->delete($oldPath);
        }

        
        $image = $request->file('certificate_image');
        $image_name = time() . '_certificate_image.' . $image->getClientOriginalExtension();
        $image->storeAs('uploads', $image_name, 'public');
    }



    DB::table('certificate')->where('id', $id)->update([
        'certificate_image'=>$image_name,
                    'title'=>$request->title,
                    'position'=>$validate['Position'],
                    'status'=>$validate['Status'],
                   
                    'updated_at'=>now(),
    ]);

    return redirect()->back()->with('success', 'Certificate  updated successfully.');
}


public function deleteCertificate($id){
    $post = DB::table('certificate')->where('id', $id)->first();

    if ($post) {
        // Step 2: Delete image using Laravel Storage
        if (!empty($post->certificate_image) && Storage::disk('public')->exists('uploads/' . $post->certificate_image)) {
            Storage::disk('public')->delete('uploads/' . $post->certificate_image);
        }

        // Step 3: Delete database record
        DB::table('certificate')->where('id', $id)->delete();

        return response()->json(['success' => 'Project and image deleted successfully.']);
    }

    return response()->json(['error' => 'Post not found.'], 404);
}

// ----------------------------------------------------------------------------------------------------------------------
    //achievementsAwards
// ----------------------------------------------------------------------------------------------------------------------

public function achievementsAwards(){
    return view('admin.achievements-awards');
}

public function getAchievementsAwards(Request $request){
if ($request->ajax()) {
            $data = DB::table('achievementsAwards')->get();
            // dd($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                     $btn = '<a href="'.route('edit-achievements-awards', ['id' => $row->id]).'" class="view btn ">
                    <img src="'.asset('images/edit.png').'" alt="Edit" style="height:30px;">
                    </a>';
                    $btn .= ' <a href="javascript:void(0);" data-id="'.$row->id.'" class="delete btn">
                    <img src="'.asset('images/delete.png').'" alt="Delete" style="height:30px;">
                    
                    </a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
         }
}

public function addNewAchievementsAwards(){

    return view('admin.add-achievements-awards');
}


public function storeAchievementsAwards(Request $request){
 $validate=$request->validate([

            'achievementsAwards_image'=>'required|image|mimes:jpg,png,jpeg',
            'title'=>'required|string',
            'Position'=>'required|string',
            'Status'=>'required|string',
            
    ]);

    if ($request->hasFile('achievementsAwards_image')) {
                $image = $request->file('achievementsAwards_image'); 
                $image_name = time().'_achievementsAwards_image.'.$image->getClientOriginalExtension(); 
                $image->storeAs('uploads', $image_name, 'public'); 

                }

                DB::table('achievementsAwards')->insert([
                    'achievementsAwards_image'=>$image_name,
                    'title'=>$request->title,
                    'position'=>$validate['Position'],
                    'status'=>$validate['Status'],
                   
                    'created_at'=>now(),
                ]);

                return redirect()->back()->with('success','Achievements/Awards Add Successfully');
}

public function editAchievementsAwards($id){

    $achievementsAwardsId=DB::table('achievementsAwards')->where('id',$id)->first();
    return view('admin.edit-achievements-awards',compact('achievementsAwardsId'));

}

public function updateAchievementsAwards( Request $request,$id){

         $validate = $request->validate([
         'achievementsAwards_image'=>'required|image|mimes:jpg,png,jpeg',
            'title'=>'required|string',
            'Position'=>'required|string',
            'Status'=>'required|string',
    ]);

    $objective = DB::table('achievementsAwards')->where('id', $id)->first();

    if (!$objective) {
        return redirect()->back()->with('error', 'Objective not found.');
    }

    $image_name = $objective->achievementsAwards_image; // default to old image

    if ($request->hasFile('achievementsAwards_image')) {
        $oldPath = 'uploads/' . $objective->achievementsAwards_image;

        
        if (!empty($objective->achievementsAwards_image) && Storage::disk('public')->exists($oldPath)) {
            Storage::disk('public')->delete($oldPath);
        }

        
        $image = $request->file('achievementsAwards_image');
        $image_name = time() . '_achievementsAwards_image.' . $image->getClientOriginalExtension();
        $image->storeAs('uploads', $image_name, 'public');
    }



    DB::table('achievementsAwards')->where('id', $id)->update([
        'achievementsAwards_image'=>$image_name,
                    'title'=>$request->title,
                    'position'=>$validate['Position'],
                    'status'=>$validate['Status'],
                   
                    'updated_at'=>now(),
    ]);

    return redirect()->back()->with('success', 'Achievements/Awards  updated successfully.');
}

public function deleteAchievementsAwards($id){
    $post = DB::table('achievementsAwards')->where('id', $id)->first();

    if ($post) {
        // Step 2: Delete image using Laravel Storage
        if (!empty($post->achievementsAwards_image) && Storage::disk('public')->exists('uploads/' . $post->achievementsAwards_image)) {
            Storage::disk('public')->delete('uploads/' . $post->achievementsAwards_image);
        }

        // Step 3: Delete database record
        DB::table('achievementsAwards')->where('id', $id)->delete();

        return response()->json(['success' => 'Project and image deleted successfully.']);
    }

    return response()->json(['error' => 'Post not found.'], 404);
}









// UserController.php

public function ajaxUpdateStatus(Request $request)
{
    // $user = DB::table('customers')-> findOrFail($request->id);
    $user = DB::table('customers')->where('id', $request->id)->first();

if (!$user) {
    // Handle not found case manually
    return response()->json(['success' => false, 'message' => 'User not found']);
}

      $updated = DB::table('customers')
                ->where('id', $request->id)
                ->update(['status' => $request->status]);

    return response()->json([
        'success' => true,
        'message' => 'Status updated successfully.',
        'new_status' => $request->status
    ]);
}

// ----------------------------------------------------------------------------------------------------------------------
    //seatBooked
// ----------------------------------------------------------------------------------------------------------------------

public function seatBooked(){

    return view('admin.seat-booked');
}


public function getSeatBooked(Request $request){

if ($request->ajax()) {
            $data = DB::table('seat_booked')->get();
            // dd($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                   
                    $btn = ' <a href="javascript:void(0);" data-id="'.$row->id.'" class="delete btn">
                    <img src="'.asset('images/delete.png').'" alt="Delete" style="height:30px;">
                    
                    </a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
         }
        }


        public function deleteBookSeat($id){
             DB::table('seat_booked')->where('id', $id)->delete();

        return response()->json(['success' => 'Deleted successfully.']);
        }


// ----------------------------------------------------------------------------------------------------------------------
    //  Participate
// ----------------------------------------------------------------------------------------------------------------------

public function participate(){
    return view('admin.participate');
}

public function getParticipate(Request $request){

    if ($request->ajax()) {
            $data = DB::table('participation')->get();
            // dd($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                   
                    $btn = ' <a href="javascript:void(0);" data-id="'.$row->id.'" class="delete btn">
                    <img src="'.asset('images/delete.png').'" alt="Delete" style="height:30px;">
                    
                    </a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
         }
}

public function deleteParticipate($id){
     DB::table('participate')->where('id', $id)->delete();

        return response()->json(['success' => 'Deleted successfully.']);
}
// ----------------------------------------------------------------------------------------------------------------------
    //coordinator
// ----------------------------------------------------------------------------------------------------------------------


public function coordinator(){
    return view('admin.coordinator');
}

public function getCoordinator(Request $request){
     if ($request->ajax()) {
            $data = DB::table('coordinators')->get();
            // dd($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                      $btn = '<a href="'.route('coordinator-details', ['id' => $row->id]).'" class="btn" style="margin-right:5px;">
                        <img src="'.asset('images/view.png').'" alt="View" style="height:30px;">
                    </a>';

                    $btn .= '<a href="'.route('edit-coordinator', ['id' => $row->id]).'" class="btn" style="margin-right:5px;">
                        <img src="'.asset('images/edit.png').'" alt="Edit" style="height:30px;">
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


public function addCoordinator(){

return view('admin.add-coordinator');

}

public function storeCoordinator(Request $request){
 $validate = $request->validate([
        'name'     => 'required|string',
        'password' => 'required|min:6|confirmed',
        'phone'    => 'required|string',
        'email'    => 'required|email',
        'gender'    => 'required|string',
        'dob'    => 'required|date',
        'pincode'  => 'required|string',
        'state'  => 'required|string',
        'city'  => 'required|string',
        'address'  => 'required|string',
        'image'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);


    $imageName=null;
    if($request->hasFile('image')){
        $image=$request->file('image');
        $imageName = time().'_coordinator_image'.$image->getClientOriginalName();
        $image->storeAs('uploads', $imageName, 'public');
    }
     DB::table('coordinators')->insert([
    'name'     => $validate['name'],
    'password' => Hash::make($validate['password']),
    'mobile'    => $validate['phone'],
    'email'    => $validate['email'],
    'gender'    => $validate['gender'],
    'dob'    => $validate['dob'],
    'pincode'=> $validate['state'],
    'state'=> $validate['pincode'],
    'city'=> $validate['city'],
    'address'  => $validate['address'],
    'image'    => $imageName,
        
    
]);
    return redirect()->back()->with('success', 'coordinator Created successfully');
}

public function editCoordinator($id){

    $coordinatorId=DB::table('coordinators')->where('id',$id)->first();
    return view('admin.edit-coordinator',compact('coordinatorId'));
}

public function updateCoordinator(Request $request,$id){
 $validate = $request->validate([
        'name'     => 'required|string',
        'password' => 'required|min:6|confirmed',
        'phone'    => 'required|string',
        'email'    => 'required|email',
        'gender'    => 'required|string',
        'dob'    => 'required|date',
        'pincode'  => 'required|string',
        'state'  => 'required|string',
        'city'  => 'required|string',
        'address'  => 'required|string',
        'image'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);
 $donation = DB::table('coordinators')->where('id', $id)->first();

    if (!$donation) {
        return redirect()->back()->with('error', 'Management record not found.');
    }

    $image_name = $donation->image; // Keep existing image by default

    if ($request->hasFile('image')) {
        // Delete old image if it exists
        if (!empty($donation->image) && Storage::exists('public/uploads/' . $donation->image)) {
            Storage::delete('public/uploads/' . $donation->image);
        }

        $image = $request->file('image');
        $image_name = time() . '_coordinator_image.' . $image->getClientOriginalExtension();
        $image->storeAs('uploads', $image_name, 'public');
    }



    DB::table('coordinators')->where('id',$id)->update([
    'name'     => $validate['name'],
    'password' => Hash::make($validate['password']),
    'mobile'    => $validate['phone'],
    'email'    => $validate['email'],
    'gender'    => $validate['gender'],
    'dob'    => $validate['dob'],
    'pincode'=> $validate['pincode'],
    'state'=> $validate['state'],
    'city'=> $validate['city'],
    'address'  => $validate['address'],
    'image'    => $image_name
    
    
]);
    return redirect()->back()->with('success', 'coordinator Created successfully');
}

public function deleteCoordinator($id){
 $post = DB::table('coordinators')->where('id', $id)->first();

    if ($post) {
        // Step 2: Delete image using Laravel Storage
        if (!empty($post->achievementsAwards_image) && Storage::disk('public')->exists('uploads/' . $post->image)) {
            Storage::disk('public')->delete('uploads/' . $post->image);
        }

        // Step 3: Delete database record
        DB::table('coordinators')->where('id', $id)->delete();

        return response()->json(['success' => 'Coordinator and image deleted successfully.']);
    }

    return response()->json(['error' => 'Post not found.'], 404);
}

public function coordinatorDetails($id){

    $coordinator=DB::table('coordinators')->where('id',$id)->first();
    return view('admin.coordinator-details',compact('coordinator'));
} 

// ----------------------------------------------------------------------------------------------------------------------
    // slider Image
// ----------------------------------------------------------------------------------------------------------------------

public function sliderImage(){
    return view('admin.slider-image');
}

public function getSliderImage(Request $request){
if ($request->ajax()) {
            $data = DB::table('slider_image')->get();
            // dd($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                     $btn = '<a href="'.route('edit-sliderImage', ['id' => $row->id]).'" class="view btn ">
                    <img src="'.asset('images/edit.png').'" alt="Edit" style="height:30px;">
                    </a>';
                    $btn .= ' <a href="javascript:void(0);" data-id="'.$row->id.'" class="delete btn">
                    <img src="'.asset('images/delete.png').'" alt="Delete" style="height:30px;">
                    
                    </a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
         }
}


public function addSliderImage(){
    return view('admin.add-slider-image');
}


public function storeSliderImage(Request $request){

 $validate=$request->validate([

            'slider_image'=>'required|image|mimes:jpg,png,jpeg',
            'title'=>'required|string',
            'Position'=>'required|string',
            'Description'=>'required|string',
            
    ]);

    if ($request->hasFile('slider_image')) {
                $image = $request->file('slider_image'); 
                $image_name = time().'_slider_image.'.$image->getClientOriginalExtension(); 
                $image->storeAs('uploads', $image_name, 'public'); 

                }

                DB::table('slider_image')->insert([
                    'image'=>$image_name,
                    'title'=>$request->title,
                    'position'=>$validate['Position'],
                    'description'=>$validate['Description'],
                   
                    'created_at'=>now(),
                ]);

                return redirect()->back()->with('success','Slider Image Add Successfully');
}


public function editSliderImage($id){

    $sliderImageId=DB::table('slider_image')->where('id',$id)->first();
    return  view('admin.edit-slider-image',compact('sliderImageId'));
}

public function updateSliderImage(Request $request,$id){
    $validate = $request->validate([
          'slider_image'=>'required|image|mimes:jpg,png,jpeg',
            'title'=>'required|string',
            'Position'=>'required|string',
            'Description'=>'required|string',
    ]);

    $objective = DB::table('slider_image')->where('id', $id)->first();

    if (!$objective) {
        return redirect()->back()->with('error', 'Objective not found.');
    }

    $image_name = $objective->image; // default to old image

    if ($request->hasFile('slider_image')) {
        $oldPath = 'uploads/' . $objective->image;

        
        if (!empty($objective->image) && Storage::disk('public')->exists($oldPath)) {
            Storage::disk('public')->delete($oldPath);
        }

        
        $image = $request->file('slider_image');
        $image_name = time() . '_slider_image.' . $image->getClientOriginalExtension();
        $image->storeAs('uploads', $image_name, 'public');
    }



    DB::table('slider_image')->where('id', $id)->update([
                    'image'=>$image_name,
                    'title'=>$request->title,
                    'position'=>$validate['Position'],
                    'description'=>$validate['Description'],
                   
                    'updated_at'=>now(),
    ]);

    return redirect()->back()->with('success', 'Slider Image updated successfully.');
}

public  function deleteSliderImage($id){
        $post = DB::table('slider_image')->where('id', $id)->first();

    if ($post) {
        // Step 2: Delete image using Laravel Storage
        if (!empty($post->image) && Storage::disk('public')->exists('uploads/' . $post->image)) {
            Storage::disk('public')->delete('uploads/' . $post->image);
        }

        // Step 3: Delete database record
        DB::table('slider_image')->where('id', $id)->delete();

        return response()->json(['success' => 'Slider image deleted successfully.']);
    }

    return response()->json(['error' => 'Post not found.'], 404);
}


// ----------------------------------------------------------------------------------------------------------------------
    //company Profile
// ----------------------------------------------------------------------------------------------------------------------

public function companyProfile(){

  
    $companyDetails=DB::table('company_profile')->first();
    // dd($companyDetails);
    return view('admin.company-profile',compact('companyDetails'));
}

public function updateCompanyProfile(Request $request,$id){


    // Validate text fields
    $validate = $request->validate([
        'brand_name' => 'nullable|string',
        'email' => 'nullable|email',
        'website_name' => 'nullable|string',
        'facebook_link' => 'nullable|string',
        'twitter_link'=>'nullable|string',
        'instagram_link' => 'nullable|string',
        'youtube_link' => 'nullable|string',
        'facebookpage_link' => 'nullable|string',
        'whatsapp_link_number' => 'nullable|string',
        'mobile' => 'nullable|string',
        'site_key' => 'nullable|string',
        'secret_key' => 'nullable|string',
        'address' => 'nullable|string',
        'privacy_name' => 'nullable|string',
        'aboutus' => 'nullable|string',
        'privacy_policy' => 'nullable|string',
        'tnc' => 'nullable|string',
        'disclaimer' => 'nullable|string',
        'refund_policy' => 'nullable|string',
        'website_link' => 'nullable|string',
        'youtube_video_1' => 'nullable|string',
        'youtube_video_2' => 'nullable|string',
        'membership_charges_details' => 'nullable|string',
        'playstore_app_link' => 'nullable|string',
        'payment_gateway_link' => 'nullable|string',
        'payment_details' => 'nullable|string',
        'donation_amount' => 'nullable|string',
        'president_message' => 'nullable|string',
        'slider'=>'nullable|string',
    ]);

    // Fetch existing record (assuming only one row exists)
    $settings = DB::table('company_profile')->where('id', $id)->first();

    // Initialize data array for update
    $data = $validate;

    // File fields array
    $fileFields = [
        'website_logo',
        'signature_pic',
        'id_card_front',
        'id_card_back',
        'certificate',
        'niyukti',
        'aboutus_image',
        'slip',
        'president_image',
        'qrcode_image',
    ];

    foreach ($fileFields as $field) {
        if ($request->hasFile($field)) {

            // Delete old file if exists
            if (!empty($settings->$field)) {
                $oldPath = storage_path('app/public/uploads/' . $settings->$field);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            // Store new file
            $file = $request->file($field);
            $fileName = time() . '_' . $field . '.' . $file->getClientOriginalExtension();
            $file->storeAs('uploads', $fileName, 'public');

            $data[$field] = $fileName;
        }
    }

    // Update the record
    DB::table('company_profile')->where('id', $id)->update($data);

    return redirect()->back()->with('success', 'Website Settings updated successfully.');
}

// ----------------------------------------------------------------------------------------------------------------------
    //backup data
// ----------------------------------------------------------------------------------------------------------------------

public function backupdata(){

    $backups = [
        ['name' => 'Verified Users', 'total' => DB::table('customers')->where('status', 1)->count()],
        ['name' => 'Unverified Users', 'total' => DB::table('customers')->where('status', 0)->count()],
        ['name' => 'Donation Data', 'total' => DB::table('donation')->count()],
        ['name' => 'Managers Data', 'total' => DB::table('managers')->count()],
    ];

    return view('admin.backup-data', compact('backups'));
}
public function download(Request $request)
{
    $type = $request->get('type');
    $format = $request->get('format');

    // Database se data fetch karo according to type
    if ($type == 'Verified Users') {
        $data = DB::table('customers')->where('status', 1)->select('name', 'email')->get()->toArray();
    } elseif ($type == 'Unverified Users') {
        $data = DB::table('customers')->where('status', 0)->select('name', 'email')->get()->toArray();
    } elseif ($type == 'Donation Data') {
        $data = DB::table('donation')->select('donor_name as name', 'donor_email as email')->get()->toArray();
    } elseif ($type == 'Membership Data') {
        $data = DB::table('managers')->select('member_name as name', 'member_email as email')->get()->toArray();
    } else {
        $data = []; // default empty
    }

    // Convert objects to array for export
    $exportData = array_map(function($item) {
        return (array)$item;
    }, $data);

    if ($format == 'excel') {
        return FacadesExcel::download(new \App\Exports\GenericExport($exportData), $type . '.xlsx');
    } elseif ($format == 'pdf') {
        $pdf = FacadePdf::loadView('exports.pdf', ['data' => $exportData, 'title' => $type]);
        return $pdf->download($type . '.pdf');
    } elseif ($format == 'word') {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $section->addText($type . " Report");

        foreach ($exportData as $row) {
            $section->addText("Name: {$row['name']}, Email: {$row['email']}");
        }

        $tempFile = tempnam(sys_get_temp_dir(), 'word');
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($tempFile);

        return response()->download($tempFile, $type . '.docx')->deleteFileAfterSend(true);
    }

    return redirect()->back()->with('error', 'Invalid format selected.');
}










// ----------------------------------------------------------------------------------------------------------------------
    //donation
// ----------------------------------------------------------------------------------------------------------------------

    public function donation(){
        return view('admin.donation');
    }

    public function addDoner(Request $request){

    return view('admin.add-new-doner');
   }
    
    //manager
// ----------------------------------------------------------------------------------------------------------------------

    public function managers(){
        return view('admin.managers');
    }

   public function managerDetails($id){
    $manager=DB::table('managers')->where('id',$id)->first();
        return view('admin.manager-details',compact('manager'));
   }

   public function updateManager($id){
$manager=DB::table('managers')->where('id',$id)->first();
        return view('admin.edit-manager',compact('manager'));
}
   
   public function addManager(){
    return view('admin.add-new-manager');
   }

// ----------------------------------------------------------------------------------------------------------------------
   //testimonials
// ----------------------------------------------------------------------------------------------------------------------

  public function testimonials(){

    return view('admin.testimonial');

  }

public function getTestimonials(Request $request){

 if ($request->ajax()) {
            $data = DB::table('testimonials')->get();
            // dd($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                     $btn = '<a href="'.route('edit-testimonials', ['id' => $row->id]).'" class="view btn ">
                    <img src="'.asset('images/edit.png').'" alt="Edit" style="height:30px;">
                    </a>';
                    $btn .= ' <a href="javascript:void(0);" data-id="'.$row->id.'" class="delete btn">
                    <img src="'.asset('images/delete.png').'" alt="Delete" style="height:30px;">
                    
                    </a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
         }

}

public function addTestimonials(){

    return view('admin.add-testimonial');
}

public function editTestimonials($id){

    $testimonialId=DB::table('testimonials')->where('id',$id)->first();
    return view('admin.edit-testimonial',compact('testimonialId'));
}

public function storeTestimonials(Request $request){
     $validate=$request->validate([

            'image'=>'required|image|mimes:jpg,png,jpeg',
            'name'=>'required|string',
            'designation'=>'required|string',
            'message'=>'required|string',
            

    ]);

    if ($request->hasFile('image')) {
                $image = $request->file('image'); 
                $image_name = time().'_testimonial_image.'.$image->getClientOriginalExtension(); 
                $image->storeAs('uploads', $image_name, 'public'); 

                }

                DB::table('testimonials')->insert([
                    'image'=>$image_name,
                    'name'=>$request->name,
                    'designation'=>$request->designation,
                    'message'=>$request->message,
                    
                    'created_at'=>now(),
                ]);

                return redirect()->back()->with('success','New Testimonial Add Successfully');
}

public function updateTestimonials(Request $request, $id)
{
    $validate = $request->validate([
        'image' => 'required|image|mimes:jpg,png,jpeg',
        'name' => 'required|string',
        'designation' => 'required|string',
        'message' => 'required|string',
    ]);

    $testimonial = DB::table('testimonials')->where('id', $id)->first();

    if (!$testimonial) {
        return redirect()->back()->with('error', 'Testimonial not found.');
    }

    $image_name = $testimonial->image; // default to old image

    if ($request->hasFile('image')) {
        $oldImagePath = 'uploads/' . $testimonial->image;

        // ✅ Delete old image if it exists in storage
        if (!empty($testimonial->image) && Storage::disk('public')->exists($oldImagePath)) {
            Storage::disk('public')->delete($oldImagePath);
        }

        // ✅ Store new image
        $image = $request->file('image');
        $image_name = time() . '_testimonial_image.' . $image->getClientOriginalExtension();
        $image->storeAs('uploads', $image_name, 'public');
    }

    // ✅ Update testimonial record
    DB::table('testimonials')->where('id', $id)->update([
        'image' => $image_name,
        'name' => $validate['name'],
        'designation' => $validate['designation'],
        'message' => $validate['message'],
    ]);

    return redirect()->back()->with('success', 'Testimonial Updated Successfully');
}



// ----------------------------------------------------------------------------------------------------------------------
   //upcoming
// ----------------------------------------------------------------------------------------------------------------------
   public function upcoming(){
    return view ('admin.upcoming');
   }

public function addUpcomingEvent(){
    return view ('admin.add-upcoming-event');

}

public function editUpcomingEvent($id){

    $eventId=DB::table('upcoming_event')->where('id',$id)->first();
    return view('admin.edit-upcoming-event',compact('eventId'));

}

public function updateUpcomingEvent(Request $request, $id)
{
    $validate = $request->validate([
        'event_image' => 'required|image|mimes:jpg,png,jpeg',
        'title' => 'required|string',
        'description' => 'required|string',
        'venue' => 'required|string',
        'event_date' => 'required|string',
    ]);

    $event = DB::table('upcoming_event')->where('id', $id)->first();

    if (!$event) {
        return redirect()->back()->with('error', 'Event not found.');
    }

    $image_name = $event->event_image; // fallback to old image name

    if ($request->hasFile('event_image')) {
        $oldImagePath = 'uploads/' . $event->event_image;

        // ✅ Delete old image if it exists
        if (!empty($event->event_image) && Storage::disk('public')->exists($oldImagePath)) {
            Storage::disk('public')->delete($oldImagePath);
        }

        // ✅ Store new image
        $image = $request->file('event_image');
        $image_name = time() . '_event_image.' . $image->getClientOriginalExtension();
        $image->storeAs('uploads', $image_name, 'public');
    }

    $plainDescription = strip_tags($validate['description']);

    // ✅ Update DB record
    DB::table('upcoming_event')->where('id', $id)->update([
        'event_image' => $image_name,
        'title' => $validate['title'],
        'description' => $plainDescription,
        'venue' => $validate['venue'],
        'event_date' => $validate['event_date'],
        'updated_at' => now(), // created_at should not change on update
    ]);

    return redirect()->back()->with('success', 'Event Updated Successfully');
}


public function storeUpcomingEvent(Request $request){

    $validate=$request->validate([

            'event_image'=>'required|image|mimes:jpg,png,jpeg',
            'title'=>'required|string',
            'description'=>'required|string',
            'venue'=>'required|string',
            'event_date'=>'required|string',

    ]);

    if ($request->hasFile('event_image')) {
                $image = $request->file('event_image'); 
                $image_name = time().'_event_image.'.$image->getClientOriginalExtension(); 
                $image->storeAs('uploads', $image_name, 'public'); 

                }
$plainDescription = strip_tags($validate['description']);
                DB::table('upcoming_event')->insert([
                    'event_image'=>$image_name,
                    'title'=>$request->title,
                    'description'=>$plainDescription,
                    'venue'=>$request->venue,
                    'event_date'=>$request->event_date,
                    'created_at'=>now(),
                ]);

                return redirect()->back()->with('success','New Event Add Successfully');
}

   public function getUpcomingEvent(Request $request){
    if ($request->ajax()) {
            $data = DB::table('upcoming_event')->get();
            // dd($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                     $btn = '<a href="'.route('edit-upcoming-event', ['id' => $row->id]).'" class="view btn ">
                    <img src="'.asset('images/edit.png').'" alt="Edit" style="height:30px;">
                    </a>';
                    $btn .= ' <a href="javascript:void(0);" data-id="'.$row->id.'" class="delete btn">
                    <img src="'.asset('images/delete.png').'" alt="Delete" style="height:30px;">
                    
                    </a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
         }
   }

    public function getVarifiedUser(Request $request){
// dd('d');
        
          if ($request->ajax()) {
            $data = DB::table('customers')->where('status',1)->get();
            // dd($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="'.route('admin.user.details', ['id' => $row->id, 'type' => 'varified']).'" class="view btn">
                    <img src="'.asset('images/view.png').'" alt="View" style="height:30px;">      
                    </a>';
                    $btn .= ' <a href="javascript:void(0);" data-id="'.$row->id.'" class="delete btn">
                    <img src="'.asset('images/delete.png').'" alt="Delete" style="height:30px;">
                    
                    </a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
         }
        
    }

   public function getUnvarifiedUser(Request $request){
 if ($request->ajax()) {
            $data = DB::table('customers')->where('status',0)->get();
            // dd($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="'.route('admin.user.details', ['id' => $row->id, 'type' => 'unvarified']).'" class="view btn">
                    <img src="'.asset('images/view.png').'" alt="View" style="height:30px;">      
                    </a>';
                    $btn .= ' <a href="javascript:void(0);" data-id="'.$row->id.'" class="delete btn">
                    <img src="'.asset('images/delete.png').'" alt="Delete" style="height:30px;">
                    
                    </a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
         }
        
   }

   public function pending(){
    return view('admin.pending-user');
   } 

public function getPendingUser(Request $request){
     if ($request->ajax()) {
            $data = DB::table('customers')->where('status',2)->get();
            // dd($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="'.route('admin.user.details', ['id' => $row->id, 'type' => 'pending']).'" class="view btn">
                    <img src="'.asset('images/view.png').'" alt="View" style="height:30px;">      
                    </a>';
                    $btn .= ' <a href="javascript:void(0);" data-id="'.$row->id.'" class="delete btn">
                    <img src="'.asset('images/delete.png').'" alt="Delete" style="height:30px;">
                    
                    </a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
         }
}

   public function userDetails(Request $request,$id){

    $type=$request->query('type');
   
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

    return view('admin.user-details', compact('data', 'type'));
}


public function getActivity(Request $request){
    if ($request->ajax()) {
            $data = DB::table('activity')->get();
            // dd($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="'.route('edit-activity', ['id' => $row->id]).'" class="view btn ">
                    <img src="'.asset('images/edit.png').'" alt="Edit" style="height:30px;">
                    </a>';
                    $btn .= ' <a href="javascript:void(0);" data-id="'.$row->id.'" class="delete btn">
                    <img src="'.asset('images/delete.png').'" alt="Edit" style="height:30px;">
                    </a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
         }
}

public function storeActivity(Request $request){
        $validate=$request->validate([

            'timeline_post'=>'nullable|image|mimes:jpg,png,jpeg',
            'title'=>'required|string',
            'description'=>'required|string',
            'venue'=>'required|string',
            'event_start'=>'required|string',
            'event_end'=>'required|string'

        ]);

        
           if ($request->hasFile('timeline_post')) {
                $image = $request->file('timeline_post'); 
                $image_name = time().'_timeline_post.'.$image->getClientOriginalExtension(); 
                $image->storeAs('uploads', $image_name, 'public'); 

                }

                DB::table('activity')->insert([
                    'timeline_post'=>$image_name,
                    'title'=>$request->title,
                    'description'=>$request->description,
                    'venue'=>$request->venue,
                    'event_start'=>$request->event_start,
                    'event_end'=>$request->event_end,

                    'post_date'=>now(),
                ]);

                return redirect()->back()->with('success','Activity Add Successfully');
        }

public function storeEditActivity(Request $request, $id)
{
    $validate = $request->validate([
        'post_date'      => 'required|string',
        'timeline_post'  => 'nullable|image|mimes:jpg,png,jpeg',
        'title'          => 'required|string',
        'description'    => 'required|string',
        'venue'          => 'required|string',
        'event_start'    => 'nullable|string',
        'event_end'      => 'nullable|string',
    ]);

    $activity = DB::table('activity')->where('id', $id)->first();
    $image_name = $activity->timeline_post; // default to old image

    if ($request->hasFile('timeline_post')) {
        // delete old image if exists
        if ($activity->timeline_post) {
            Storage::delete('public/uploads/' . $activity->timeline_post);
        }

        $image = $request->file('timeline_post');
        $image_name = time() . '_timeline_post.' . $image->getClientOriginalExtension();
        $image->storeAs('uploads', $image_name, 'public');
    }

    DB::table('activity')->where('id', $id)->update([
        'post_date'     => $request->post_date,
        'timeline_post' => $image_name,
        'title'         => $request->title,
        'description'   => $request->description,
        'venue'         => $request->venue,
        'event_start'   => $request->event_start,
        'event_end'   => $request->event_end,
        'updated_at'    => now(),
    ]);

    return redirect()->back()->with('success', 'Activity Store successfully');
}

public function getManagementList(Request $request){
    if ($request->ajax()) {
            $data = DB::table('management')->get();
            // dd($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                  $btn = '<a href="'.route('view-management-details', ['id' => $row->id]).'" class="btn" style="margin-right:5px;">
            <img src="'.asset('images/view.png').'" alt="View" style="height:30px;">
        </a>';

        $btn .= '<a href="'.route('edit-management', ['id' => $row->id]).'" class="btn" style="margin-right:5px;">
            <img src="'.asset('images/edit.png').'" alt="Edit" style="height:30px;">
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
public function getDoner(Request $request){
    $query = DB::table('donation');

    // Default pe sirf Donation wale show honge (status = 3)
    if (!$request->has('status') || $request->status === '') {
        $query->where('status', 2);
    } else {
        $query->where('status', $request->status);
    }

    return datatables()->of($query)
        ->addColumn('action', function ($row) {
            
            $btn = '<a href="'.route('doner-details', ['id' => $row->id]).'" class="btn" style="margin-right:5px;">
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

public function donerUpdateStatus(Request $request){
     $user = DB::table('donation')->where('id', $request->id)->first();

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
public function donerPrint($id)
{
    $doner = DB::table('donation')->where('id', $id)->first();

    if (!$doner) {
        abort(404, "Doner not found");
    }

    $pdf = FacadePdf::loadView('exports.doner-print', compact('doner'));
    return $pdf->download('doner_'.$id.'.pdf');
}
public function getmanagersList(Request $request){
    if ($request->ajax()) {
            $data = DB::table('managers')->get();
            // dd($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                       $btn = '<a href="'.route('managers-details', ['id' => $row->id]).'" class="btn" style="margin-right:5px;">
                        <img src="'.asset('images/view.png').'" alt="View" style="height:30px;">
                    </a>';

                    $btn .= '<a href="'.route('update-manager', ['id' => $row->id]).'" class="btn" style="margin-right:5px;">
                        <img src="'.asset('images/edit.png').'" alt="Edit" style="height:30px;">
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

public function storeDoner(Request $request){

    $validate=$request->validate([

        'name'=>'required|string',
        'phone'=>'required|string',
        'email'=>'nullable|string',
        'pancard'=>'nullable|string',
        'address'=>'required|string',
        'image'=>'nullable|image|mimes:jpg,png,jpeg',
        'amount'=>'required|string',

    ]);

    $imageName=null;
    if($request->hasFile('image')){
        $image=$request->file('image');
        $imageName = time().'_doner_image'.$image->getClientOriginalName();
        $image->storeAs('uploads', $imageName, 'public');
    }

    DB::table('donation')->insert([
    'name'     => $validate['name'],
    'phone'    => $validate['phone'],
    'email'    => $validate['email'] ?? null,
    'pancard'  => $validate['pancard'] ?? null,
    'address'  => $validate['address'],
    'image'    => $imageName,
    'amount'   => $validate['amount'],
    'created_at' => now()
    
]);
    return redirect()->back()->with('success', 'Doner Created successfully');

}

public function storeManagement(Request $request){

    $validate=$request->validate([
        'name'=>'required|string',
        'phone'=>'required|string',
        'email'=>'required|string',
        'designation'=>'required|string',
        'category'=>'required|string',
        'image'=>'nullable|image|mimes:jpg,png,jpeg',
        'position'=>'required|string',
    ]);

      $imageName=null;
    if($request->hasFile('image')){
        $image=$request->file('image');
        $imageName = time().'_management_image'.$image->getClientOriginalName();
        $image->storeAs('uploads', $imageName, 'public');
    }
     DB::table('management')->insert([
    'name'     => $validate['name'],
    'mobile'    => $validate['phone'],
    'email'    => $validate['email'],
    'designation'=> $validate['designation'],
    'category'  => $validate['category'],
    'image'    => $imageName,
    'position'   => $validate['position'],
    'created_at' => now()
    
]);
    return redirect()->back()->with('success', 'Management Created successfully');

}



public function storeEditDoner(Request $request, $id)
{
    $validated = $request->validate([
        'name'     => 'required|string',
        'phone'    => 'required|string',
        'email'    => 'nullable|email',
        'pancard'  => 'nullable|string',
        'address'  => 'required|string',
        'image'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'amount'   => 'required|string',
    ]);

    $donation = DB::table('donation')->where('id', $id)->first();

    if (!$donation) {
        return redirect()->back()->with('error', 'Donation record not found.');
    }

    $image_name = $donation->image; // Keep existing image by default

    if ($request->hasFile('image')) {
        // Delete old image if it exists
        if (!empty($donation->image) && Storage::exists('public/uploads/' . $donation->image)) {
            Storage::delete('public/uploads/' . $donation->image);
        }

        $image = $request->file('image');
        $image_name = time() . '_doner_image.' . $image->getClientOriginalExtension();
        $image->storeAs('uploads', $image_name, 'public');
    }

    DB::table('donation')->where('id', $id)->update([
        'name'     => $validated['name'],
        'phone'    => $validated['phone'],
        'email'    => $validated['email'] ?? null,
        'pancard'  => $validated['pancard'] ?? null,
        'address'  => $validated['address'],
        'image'    => $image_name,
        'amount'   => $validated['amount'],
    ]);

    return redirect()->back()->with('success', 'Donor updated successfully.');
}




public function storeEditManagement(Request $request,$id){
    
    // dd($request->all());
     $validated = $request->validate([
      'name'=>'required|string',
        'mobile'=>'required|string',
        'email'=>'required|string',
        'designation'=>'required|string',
        'category'=>'required|string',
        'image'=>'nullable|image|mimes:jpg,png,jpeg',
        'position'=>'required|string',
    ]);

    $donation = DB::table('management')->where('id', $id)->first();

    if (!$donation) {
        return redirect()->back()->with('error', 'Management record not found.');
    }

    $image_name = $donation->image; // Keep existing image by default

    if ($request->hasFile('image')) {
        // Delete old image if it exists
        if (!empty($donation->image) && Storage::exists('public/uploads/' . $donation->image)) {
            Storage::delete('public/uploads/' . $donation->image);
        }

        $image = $request->file('image');
        $image_name = time() . '_management_image.' . $image->getClientOriginalExtension();
        $image->storeAs('uploads', $image_name, 'public');
    }

    DB::table('management')->where('id', $id)->update([
       'name'     => $validated['name'],
    'mobile'    => $validated['mobile'],
    'email'    => $validated['email'],
    'designation'=> $validated['designation'],
    'category'  => $validated['category'],
    'image'    => $image_name,
    'position'   => $validated['position'],
    'updated_at'=>now()
    ]);

    return redirect()->back()->with('success', 'Management updated successfully.');
}


public function storeManager(Request $request){

    $validate = $request->validate([
        'name'     => 'required|string',
        'password' => 'required|min:6|confirmed',
        'phone'    => 'required|string',
        'email'    => 'required|email',
        'gender'    => 'required|string',
        'dob'    => 'required|date',
        'pincode'  => 'required|string',
        'state'  => 'required|string',
        'city'  => 'required|string',
        'address'  => 'required|string',
        'image'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);


    $imageName=null;
    if($request->hasFile('image')){
        $image=$request->file('image');
        $imageName = time().'_manager_image'.$image->getClientOriginalName();
        $image->storeAs('uploads', $imageName, 'public');
    }
     DB::table('managers')->insert([
    'name'     => $validate['name'],
    'password' => Hash::make($validate['password']),
    'phone'    => $validate['phone'],
    'email'    => $validate['email'],
    'gender'    => $validate['gender'],
    'dob'    => $validate['dob'],
    'pincode'=> $validate['state'],
    'state'=> $validate['pincode'],
    'city'=> $validate['city'],
    'address'  => $validate['address'],
    'image'    => $imageName,
    'created_at' => now()
    
]);
    return redirect()->back()->with('success', 'Management Created successfully');

}

public function storeEditManager(Request $request,$id){

  $validate = $request->validate([
        'name'     => 'required|string',
        'password' => 'required|min:6|confirmed',
        'phone'    => 'required|string',
        'email'    => 'required|email',
        'gender'    => 'required|string',
        'dob'    => 'required|date',
        'pincode'  => 'required|string',
        'state'  => 'required|string',
        'city'  => 'required|string',
        'address'  => 'required|string',
        'image'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);
 $donation = DB::table('managers')->where('id', $id)->first();

    if (!$donation) {
        return redirect()->back()->with('error', 'Management record not found.');
    }

    $image_name = $donation->image; // Keep existing image by default

    if ($request->hasFile('image')) {
        // Delete old image if it exists
        if (!empty($donation->image) && Storage::exists('public/uploads/' . $donation->image)) {
            Storage::delete('public/uploads/' . $donation->image);
        }

        $image = $request->file('image');
        $image_name = time() . '_manager_image.' . $image->getClientOriginalExtension();
        $image->storeAs('uploads', $image_name, 'public');
    }



    DB::table('managers')->where('id',$id)->update([
    'name'     => $validate['name'],
    'password' => Hash::make($validate['password']),
    'phone'    => $validate['phone'],
    'email'    => $validate['email'],
    'gender'    => $validate['gender'],
    'dob'    => $validate['dob'],
    'pincode'=> $validate['state'],
    'state'=> $validate['pincode'],
    'city'=> $validate['city'],
    'address'  => $validate['address'],
    'image'    => $image_name
    
    
]);
    return redirect()->back()->with('success', 'Management Created successfully');
}























public function donerDetails(Request $request,$id){

    $doner=DB::table('donation')->where('id',$id)->first();
    return view('admin.doner-details', compact('doner'));

}

public function editDoner(Request $request,$id){

      $doner=DB::table('donation')->where('id',$id)->first();
        return view('admin.edit-doner', compact('doner'));
}

public function deleteUser($id){

    DB::table('customers')->where('id',$id)->delete();

    return response()->json(['success'=> 'Customer Deleted Successfully']);

}


public function deleteActivity($id)
{
    // Step 1: Fetch the activity record
    $activity = DB::table('activity')->where('id', $id)->first();

    if ($activity) {
        // Step 2: Delete the image file if it exists
        if (!empty($activity->image) && Storage::disk('public')->exists('uploads/' . $activity->image)) {
            Storage::disk('public')->delete('uploads/' . $activity->image);
        }

        // Step 3: Delete the database record
        DB::table('activity')->where('id', $id)->delete();

        return response()->json(['success' => 'Activity and image deleted successfully.']);
    }

    return response()->json(['error' => 'Activity not found.'], 404);
}



public function deleteDoner($id)
{
    // Step 1: Fetch the donor record
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



public function deleteManegement($id)
{
    // Step 1: Fetch the record
    $management = DB::table('management')->where('id', $id)->first();

    if ($management) {
        // Step 2: Delete the image if it exists
        if (!empty($management->image) && Storage::disk('public')->exists('uploads/' . $management->image)) {
            Storage::disk('public')->delete('uploads/' . $management->image);
        }

        // Step 3: Delete the database record
        DB::table('management')->where('id', $id)->delete();

        return response()->json(['success' => 'Management and image deleted successfully.']);
    }

    return response()->json(['error' => 'Management record not found.'], 404);
}



public function deleteManagers($id)
{
    // Step 1: Get the manager record
    $manager = DB::table('managers')->where('id', $id)->first();

    if ($manager) {
        // Step 2: Delete the image if it exists
        if (!empty($manager->image) && Storage::disk('public')->exists('uploads/' . $manager->image)) {
            Storage::disk('public')->delete('uploads/' . $manager->image);
        }

        // Step 3: Delete the manager record
        DB::table('managers')->where('id', $id)->delete();

        return response()->json(['success' => 'Manager and image deleted successfully.']);
    }

    return response()->json(['error' => 'Manager not found.'], 404);
}



public function deleteUpcomingEvent($id)
{
    // Step 1: Get the event record
    $event = DB::table('upcoming_event')->where('id', $id)->first();

    if ($event) {
        // Step 2: Check and delete the image file
        if (!empty($event->image) && Storage::disk('public')->exists('uploads/' . $event->image)) {
            Storage::disk('public')->delete('uploads/' . $event->image);
        }

        // Step 3: Delete the event record from the database
        DB::table('upcoming_event')->where('id', $id)->delete();

        return response()->json(['success' => 'Event and image deleted successfully.']);
    }

    return response()->json(['error' => 'Event not found.'], 404);
}



public function deleteTestimonials($id)
{
    // Step 1: Fetch the record from DB
    $testimonial = DB::table('testimonials')->where('id', $id)->first();

    if ($testimonial) {
        // Step 2: Delete the image from storage if it exists
        if (!empty($testimonial->image) && Storage::disk('public')->exists('uploads/' . $testimonial->image)) {
            Storage::disk('public')->delete('uploads/' . $testimonial->image);
        }

        // Step 3: Delete the testimonial from DB
        DB::table('testimonials')->where('id', $id)->delete();

        return response()->json(['success' => 'Testimonial and image deleted successfully.']);
    }

    return response()->json(['error' => 'Testimonial not found.'], 404);
}

}
