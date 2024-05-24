<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profil;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginpost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ],
        [
            'email.required' => 'Email Harus Diisi',
            'email.email' => 'Email sudah ada',
            'password.required' => 'Password Harus Diisi',
        ]);

        if ($validator->fails()) {
            return redirect()->route('login')
                ->withErrors($validator)
                ->withInput();
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')
                ->with('error', 'Login failed email or password is incorrect');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'anda berhasil logout');
    }

    public function register()
    {
        return view('auth.registrasi');
    }

    public function regiteruser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'gender' => 'required|in:male,female',
            'age' => 'required|integer|min:1',
            'birth' => 'required|date',
            'address' => 'required',
            'role' => 'required|in:admin,user,super_admin',
        ]);

        if ($validator->fails()) {
            return redirect()->route('registrasi')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'age' => $request->age,
            'birth' => $request->birth,
            'address' => $request->address,
            // 'role' => $request->role,
        ]);

        DB::table('profil')->insert([
            'user_id' => $user->id,
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'address' => $request->address,
            'role' => $request->role,
        ]);

        // Assign role
        $user->assignRole($request->role);

        if ($user) {
            return redirect()->route('login')
                ->with('success', 'User created successfully');
        } else {
            return redirect()->route('registrasi')
                ->with('error', 'Failed to create user');
        }
    }

    public function dashboard()
    {
        $user = Auth::user();
        $list = Profil::where('user_id', $user->id)->get();

        if (!$user) {
            return redirect()->route('login');
        }
        if ($user->hasRole('admin')) {
            return view('admin.profil', compact('user' , 'list'));
        }else{
            return view('user.profil', compact('user' , 'list'));
        }


    }
}
