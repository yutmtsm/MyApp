<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Money;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
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

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
            'gender' => ['required'],
            'age' => ['required'],
            'address' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * 
     * @return \App\User
     */
    
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        
        event(new Registered($user = $this->create($request)));
        
        $this->guard()->login($user);
        
        return $this->registered($request, $user)
                    ?: redirect($this->redirectPath());
    }
    
    protected function create(Request $request)
    {
        $data = $request->all();
        
        // dd($money);
        if(isset($data['image'])){
            $path = $request->file('image')->store('public/image');
            //dd($path);
            //$data->image = basename($path);
        } else {
            $path = "noimage.png";
        }
        //dd($data);
        unset($data['_token']);
       //dd($data);
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'age' => $data['age'],
            'address' => $data['address'],
            'image_path' => $data['image'] = basename($path),
        ]);
        
        $today = date('y/m');
        $money = new Money;
        $money->date_number = $today;
        $money->user_id = $user->id;
        $money->save();
        
        return $user;
        
    }
    
}
