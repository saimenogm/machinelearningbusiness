<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\StoreRegisterRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



use Illuminate\Support\Arr;



class RegisterController extends Controller
{

    public $decrypted,$Email,$UserName='';



    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

   //use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */ 
    protected function create(array $data)
    {
        /*return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);*/

      //  return view('shamot.indexx');
    }

    protected function user_profile(array $data)
    {
        /*return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);*/


        
        return view('userprofile.profile');
    }


    
    public function store(User $user,Request $request )
    {    

      //dd($request->all());
      $request['password'] = Hash::make($request['password']);
       User::create($request->all());
       $user_email_id =  DB::select('select * from  users  where email = ?', [$request->email]);
       $user = User::find($user_email_id[0]->id);
       $user->assignRole('Applicant');


     return redirect(route('login'))-> with('message',$request->first_name.', ThankYou For Registering to NMFA');


        //dd(auth()->id());  //Todo::create($request->all()) ;
       // dd($request->ip());  //return redirect()->route('tasks.index')  //dd($request->hasFile('image') );
        
       /*
       if ($request->hasFile('profile_photo_path'))
        {
            //$user_id= auth()->id();
            $filename = $request->profile_photo_path->getClientOriginalName();
            //$request['user_id']= $user_id;
            $request['profile_photo_path'] =  $filename;
            $request['username'] = $request['name'];
            $request['password'] = Hash::make($request['password']);
            //dd($request['password']);
          try {
                $this->decrypted = Crypt::decryptString($request['password']);
                dd($this->decrypted);
              } 
              
              
              catch (DecryptException $e) 
              
              {
               
                //
            }
//dd( User::create($request->all()));
*/

            //auth()->user()->task()->create($request->all());
           
           // User::uploadAvatar($request->profile_photo_path);
            //session()->put('message','File and Data Uploaded Successfully');
            //$request->image->storeAs('images',$filename,'public');
            //return redirect()->back()->with('message','Image Uploaded.');

        
      // return redirect(route('tasks.index'))-> with('message','Task Created Successfully'.$request->description);
    }

    
    public function validate_Register(User $user,Request $request  )
    {
        $this->Email="";
        $user = new User();
        //dd( $request['Email']);
       $Check_Email = DB::select('select * from users where email = ?', [$request['Email']]);
       foreach ($Check_Email as $email) 
       {
         $this->Email= $email->email;
       }


 if( $this->Email == $request['Email'] )
 {
 return response()->json(['error'=>"<span class='alert alert-danger'><i class='fa fa-exclamation-triangle'> Error Email Already Registered</span>"]);
 //echo $Result = ($ResidentID=='Error')?"<span class='alert alert-danger'><i class='fa fa-exclamation-triangle'> </span>":"<span class='alert alert-success'><i class='fa fa-check'></span>";
 }
 else
 {
     return response()->json(['success'=>'Good To go']);
 
 }

 

      //  return view('user.index', ['users' => $users]);
    }



    public function validate_User(User $user,Request $request)
    {

        $this->UserName="";
        $user = new User();
      
        /// echo $request['email']);
       $Check_Username = DB::select('select * from users where user_name = ?', [$request['name']]);
       foreach ($Check_Username as $user) 
       {
         $this->UserName = $user->user_name;
       }

       


       if( $this->UserName == $request['name'] )
      {
      return response()->json(['error'=>"<u style='color:yellow'>".$this->UserName ."</u>&nbsp;Error Username already registered try with  Other options"]);
      //echo $Result = ($ResidentID=='Error')?"<span class='alert alert-danger'><i class='fa fa-exclamation-triangle'> </span>":"<span class='alert alert-success'><i class='fa fa-check'></span>";
      }
      else
      {
     return response()->json(['success'=>'Good To go']);
      }
      }


    public function show(Request $request)
    {
        //
        $token = csrf_token();
        $user = new User();
        dd( $request['Email']);
      // return view('shamot.index',compact('user'));

    }

}
