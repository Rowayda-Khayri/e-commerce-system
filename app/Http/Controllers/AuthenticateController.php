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

       
   
   
}
