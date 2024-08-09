<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use AuthenticatesUsers;

class UserController extends Controller
{
    // Show register/create form
    public function create()
    {
        return view('users.register');
    }
    
    // Create new user
    public function store(Request $request)
    {
        // Validate form fields
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);
    
        // Hash password
        $formFields['password'] = Hash::make($formFields['password']);
    
        // Create user
        $user = User::create($formFields);
    
        // Login the user
        auth()->login($user);
    
        // Redirect to home page with success message
        return redirect('/')->with('message', 'Welcome new user!');
    }
        //logout user
        public function logout(Request $request)
        {
            auth()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/login')->with('message', 'You have been logged out');
        }

        //show login form
        public function login()
        {
            return view('users.login');
        }

        

        //authenticate user
        public function authenticate(Request $request)
        {
            $formFields = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (auth()->attempt($formFields))
            {
                $request->session()->regenerate();
                return redirect('/')->with('message', 'You are now logged in!');
            }
            return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
        }

        public function showListings(User $user)
        {
            $listings = $user->listings()->latest()->paginate(10); 
    
            return view('users.listings', [
                'user' => $user,
                'listings' => $listings,
            ]);
        }
}
