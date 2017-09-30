<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

use Illuminate\Support\MessageBag;

use DateTime;
use App\Http\Controllers\Controller;

use Tymon\JWTAuth\Exceptions\JWTException;

use App\User;
use App\UserType;
use App\UsersUserType;
use App\AngelsPatient;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use Carbon\Carbon;

class AuthenticateController extends Controller
{
    
    
    private $user;
    private $jwtauth;
    
    public function __construct(User $user, JWTAuth $jwtauth)
   {
       // Apply the jwt.auth middleware to all methods in this controller
       // except for the login method. We don't want to prevent
       // the user from retrieving their token if they don't already have it
       $this->middleware('jwt.auth', ['except' => [
           'adminLogin',
           'showAdminLoginForm',
           'showCustomerLoginForm',
           'customerLogin',
           'showCustomerRegistrationForm',
           'customerRegistration',
          
           ]]);
       
       $this->user = $user;
       $this->jwtauth = $jwtauth;
   }
    
   public function showAdminLoginForm()
    {
//       return view('category.add');
         return view('auth.adminLogin');
         return view('auth.adminLogin');
    }
   
   public function adminLogin(Request $request){
       
         $credentials = $request->only('email', 'password');

        try {
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // if no errors are encountered we can return a JWT

        return view('welcome', compact('token'));
        }

       public function showCustomerLoginForm()
    {

            return json_encode("show customer login form ");
           
    }
   
     public function customerLogin(Request $request){
         
           $credentials = $request->only('email', 'password');

            try {
                // verify the credentials and create a token for the user
                if (! $token = JWTAuth::attempt($credentials)) {
                    return response()->json(['error' => 'invalid_credentials'], 401);
                }
            } catch (JWTException $e) {
                // something went wrong
                return response()->json(['error' => 'could_not_create_token'], 500);
            }

            // if no errors are encountered we can return a JWT
            return response()->json(["token" =>$token]);
    }

     public function showCustomerRegistrationForm()
    {
        
        return json_encode("show customer registration form ");
    }
   
    public function customerRegistration(Request $request)
            
    {

        // create the validation rules ------------------------
        $rules = array(                    
            'email'            => 'required|email|unique:users',     
            'password'         => 'required|min:6',
            'password_confirmation' => 'required|same:password',
            
        );

        // do the validation ----------------------------------
        // validate against the inputs from our form
        $validator = Validator::make(Input::all(), $rules);


        // check if the validator failed -----------------------
        if ($validator->fails()) {

            // get the error messages from the validator

            $errors = $validator->errors();

            $errorsJSON =$errors->toJson();

            return $errorsJSON;

        } else {
            // validation successful ---------------------------

            //save to db
            $password=Hash::make($request->input('password'));

            $newuser['password'] = $password;
            $newuser['username'] = $request->username;
            $newuser['email'] = $request->email;
            $newuser['phone'] = $request->phone;
            $newuser['status'] = 0;
            $newuser['user_type_id'] = 2;

    //        dd($newuser);
            User::create($newuser);

            // automatic login after registration
            return $this->customerLogin($request);

        }

    }
}
