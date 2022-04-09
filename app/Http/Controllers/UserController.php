<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $users = User::all();
        return view('auth.index', ['users'=>$users]);
    }

    public function login()
    {
        $users = User::all();
        return view('auth.login', ['users'=>$users]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('auth.registration');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                ->withSuccess('You have Successfully logged in.');
        }

        return redirect("login")
            ->withSuccess('Oops! You have entered invalid credentials.');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {
        $request->validate([
            'user_id' => 0,
            'role' => "user",
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'address' => 'required',
            'province' => 'required',
            'postal_code' => 'required',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")
            ->route('login')
            ->withSuccess('Great! You have successfully logged in.');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }

        return redirect("login")
            ->withSuccess('Oops! You do not have access.');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
        return User::create([
            'user_id' => $data['user_id'],
            'role' => $data['role'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'province' => $data['province'],
            'postal_code' => $data['postal_code'],
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
   
    public function logout() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
      */
    

    public function display(Request $request)
    {
        ##$data = User::all();
        $data = 'Hello';
        ##return view('buyer', ['loggedInUser' => $loggedInUser] );
        return view('buyer', compact('data') );
    }

    public function editUser(Request $request)
    {
        $user = User::where('user_id', Auth::user()->user_id)->first();

        if ($request->email) {
            $user->email = $request->email;
        }

        if ($request->address) {
            $user->address = $request->address;
        }

        if ($request->province) {
            $user->province = $request->province;
        }

        if ($request->postal_code) {
            $user->postal_code = $request->postal_code;
        }

        if ($request->new_password) {
                $user->password = Hash::make($request->new_password);
        }

        if ($request->description) {
            $description = $request->description;
    }

        $user->save();

        if (Auth::user()->role == 'buyer') {
            return view('/buyer');
        } else if (Auth::user()->role == 'seller')  {
                return view('/seller');
            }
        else {
                return view('/admin');
            }
            
        
    }

    public function showOrders()
    {
      $ordersData = DB::table('users')->join('orders', 'users.user_id', '=', 'orders.customer_id')
      ->select('orders.*')
      ->get();
      Log::info($ordersData);
      //return $ordersData;
      return view('/orders',['data' => $ordersData]  );
    }
}

