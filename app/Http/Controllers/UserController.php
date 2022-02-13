<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\documents;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;



use Illuminate\Support\Arr;

class UserController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImportExport()
    {
       return view('file-import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request) 
    {
        Excel::import(new UsersImport, $request->file('file')->store('temp'));
        return back();
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport() 
    {
        return Excel::download(new UsersExport, 'users-collection.xlsx');
    }


    public function index(Request $request)

    {

        $data = User::orderBy('id','DESC')->get();

        return view('users.index',compact('data'))->with('i', ($request->input('page', 1) - 1) * 15);

    }




    public function Upload_CV(Request $request)

    {
        // dd($request->all());


        try
        {

        $validatedData = $request->validate([
       'file' => 'required|mimes:pdf|max:2048',
       ]);
    
   
       $name = $request->file('file')->getClientOriginalName();
       $time=time();
       $path = public_path('Storage/UploadCv/');
       
       // <--- folder to store the pdf documents into the server;
       $fileName =  $name."-".$time.'.pdf' ; // <--giving the random filename,
       $filePath = $request->file('file')->storeAs('UploadCv/', $fileName, 'public');
       $generated_pdf_link = Storage::url('public/UploadCv/'.$fileName);
       
       //$generated_pdf_link = Storage::url($path.$fileName);
      //Uses to insert data in to the Document Selections
   
   $documents = new documents;
   $documents->name =  $fileName;
   $documents->path =  $generated_pdf_link;
   $documents->document_type = '15';
   $documents->ref_num =  $fileName;
   $documents->description = 'Upload Curriclum Vitae';
   $documents->save();


   $update_user_upload_cv = DB::table('users')
   ->where('id', Auth::user()->id)
   ->update(['upload_cv_id' => $documents->id]);


  



   $user_upload_cv= User::join('documents','documents.id','users.upload_cv_id')
   ->select('documents.*','users.*','documents.name as dname','documents.created_at as uploaded_Date','documents.id as did')
   ->where('users.id','=',Auth::user()->id)
   ->where('documents.document_type','=',15)
   ->get();

   //dd( $issue_queries);

   
   $i=1;   $return_data='';
   foreach($user_upload_cv as $user_upload)
          
   {
   $return_data .= "<tr><td>".$i++."</td>";
   $return_data .= "<td id='seqence_number_$user_upload->id' >".$user_upload->dname."</td>";
   $return_data .= "<td>".$user_upload->uploaded_Date."</td>";

   $return_data .= "<td> <a href='javascript:void(0)' data-toggle='tooltip' id='query'
   data-id='$user_upload->did' 
    data-original-title='Edit'  class='edit btn btn-danger btn-sm deletequery'> <i class='fas fa-trash'></i> Remove </a></td>";    
   }


   
return response()->json(['Message'=>true,'Download_Link'=>$documents->path,'Data_returned'=>$return_data ]);



        }
   
        catch(Exception $e)
        {
   
           return response()->json(['Message'=>false,'item'=>'error'.$e]);
   
        }
   

    }





    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        $roles = Role::pluck('name','name')->all();

        return view('users.create',compact('roles'));

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        $this->validate($request, [

            'name' => 'required',

            'email' => 'required|email|unique:users,email',

            'password' => 'required|same:confirm-password',

            'roles' => 'required'

        ]);



        $input = $request->all();

        $input['password'] = Hash::make($input['password']);



        $user = User::create($input);

        $user->assignRole($request->input('roles'));



        return redirect()->route('users.index')

            ->with('success','User created successfully');

    }



    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        $user = User::find($id);

        return view('users.show',compact('user'));

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $user = User::find($id);
        $countries = User::find($id);

        $roles = Role::pluck('name','name')->all();

        $userRole = $user->roles->pluck('name','name')->all();



        return view('users.edit',compact('user','roles','userRole'));

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, $id)

    {

        $this->validate($request, [

            'first_name' => 'required',

            'email' => 'required|email|unique:users,email,'.$id,

            'password' => 'same:confirm-password',

            'roles' => 'required'

        ]);



        $input = $request->all();

        if(!empty($input['password'])){

            $input['password'] = Hash::make($input['password']);

        }else{

            $input = Arr::except($input,array('password'));

        }



        $user = User::find($id);

        $user->update($input);

        DB::table('model_has_roles')->where('model_id',$id)->delete();



        $user->assignRole($request->input('roles'));



        return redirect()->route('users.index')

            ->with('success','User updated successfully');

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        User::find($id)->delete();

        return redirect()->route('users.index')

            ->with('success','User deleted successfully');

    }





    public function upload_file_CV_screen(Request $request)

    {
        //dd(Auth::user()->id);
     try
        {


    $upload_id = User::where('id', '=', Auth::user()->id);

  
 $user_upload_cv= User::join('documents','documents.id','users.upload_cv_id')
   ->select('documents.*','users.*','documents.name as dname','documents.created_at as uploaded_Date','documents.id as did')
   ->where('users.id','=',Auth::user()->id)
   ->where('documents.document_type','=',15)
//    ->where('documents.id','=',$upload_id->upload_cv_id)
   ->get();


 $i=1;   $return_data='';
   foreach($user_upload_cv as $user_upload)
          
   {
   $return_data .= "<tr><td>".$i++."</td>";
   $return_data .= "<td>".$user_upload->dname."</td>";
   $return_data .= "<td>".$user_upload->uploaded_Date."</td>";

   $return_data .= "<td> <a href='javascript:void(0)' data-toggle='tooltip' id='query'
    data-id='$user_upload->did' 
    data-original-title='Edit'  class='edit btn btn-danger btn-sm deletequery'> <i class='fas fa-trash'></i> Remove </a></td>";    
   }


   
return response()->json(['Message'=>true,'Data_returned'=>$return_data ]);



        }
   
        catch(Exception $e)
        {
   
           return response()->json(['Message'=>false,'item'=>'error'.$e]);
   
        }
   

    }











    public function delete_file_data_uploaded_cv(Request $request)
    {
             //dd($request->all());


         $documents = new documents;
         $documents= documents::find($request->document_id);
         $documents->delete();

         
         $update_user = DB::table('users')
         ->where('users.id', Auth::user()->id)
         ->update(['users.upload_cv_id' => 0]);




     $return_data='';


$user_upload_cv= User::join('documents','documents.id','users.upload_cv_id')
     ->select('documents.*','users.*','documents.name as dname','documents.created_at as uploaded_Date')
     ->where('users.id','=',Auth::user()->id)
     ->where('documents.document_type','=',15)
     ->get();
  
  
   $i=1;   $return_data='';
     foreach($user_upload_cv as $user_upload)
            
     {
     $return_data .= "<tr><td>".$i++."</td>";
     $return_data .= "<td>".$user_upload->dname."</td>";
     $return_data .= "<td>".$user_upload->uploaded_Date."</td>";
  
     $return_data .= "<td> <a href='javascript:void(0)' data-toggle='tooltip' id='query'
      data-id='$user_upload->id' 
      data-original-title='Edit'  class='edit btn btn-danger btn-sm deletequery'> <i class='fas fa-trash'></i> Remove </a></td>";    
     }
  
     
     
     
     return response()->json(['Data_returned'=>$return_data ]);

    }










}