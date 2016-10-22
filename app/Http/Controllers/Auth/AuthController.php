<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;


//use Illuminate\Http\Request;
//
//use App\Http\Requests;
//
//use App\Item;
//use App\Category;
//use App\Subcategory;
//
//use App\Order;
//use App\Order_item;
//
//use DB;
//use DateTime;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/item';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
//    
//    
////    public function login()
////    {
////        
////        
//////        return "hi login";
////    }
////    
//    
//    
////    public function Register(Request $request)
////    {
//////        $user = new User;
//////        $user->username = $request->name;
//////        $user->email = $request->email;
//////        $user->password = $request->password;
//////        $user->user_type_id =2 ;
//////        $user->status = 0;
//////        
//////
//////        $user->save();
//////        
//////        
//////        
//////        $items = Item::query()
//////        ->leftjoin('subcategories as s','s.id', '=', 'items.subcategory_id')
//////        ->leftjoin('categories as c','c.id', '=', 's.category_id')
//////        ->get([
//////            'items.*', 
//////            's.name as subcategory_name',
//////            'c.name as category_name'            
//////        ])->sortByDesc("created_at");
//////       
//////        return view('item.show',  compact('items'));
////    }
////    
//    
    
}
