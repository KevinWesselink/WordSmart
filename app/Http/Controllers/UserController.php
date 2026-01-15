<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/')->with('success', 'Je bent succesvol ingelogd.');
        }

        return back()->withErrors([
            'email' => 'De opgegeven inloggegevens zijn ongeldig.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Je bent succesvol uitgelogd.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function showProfile()
    {
        $user = auth()->user();
        return view('user.profile', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editProfile()
    {
        $user = auth()->user();
        return view('user.edit-profile', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateProfile(Request $request)
    {
        $formFields = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'infix' => ['nullable', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore(auth()->id())],
            'date_of_birth' => ['required', 'date', 'after_or_equal:1900-01-01', 'before_or_equal:today'], // Before or equal doesn't work yet
            'country' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'max:10'],
            'city' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:20'], 
        ]);
        
        $user = auth()->user();
        $user->fill($formFields);

        if (! $user->isDirty()) {
            return back()->with('error', 'Je hebt geen wijzigingen aangebracht aan je profiel.');
        }

        $user->save();

        return redirect()->route('profile.show')->with('success', 'Je profiel is succesvol bijgewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyProfile(Request $request)
    {
        $user = auth()->user();
        auth()->logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Je account is succesvol verwijderd.');
    }
}
