<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function adminLogin(Request $request)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        // Check the credentials (name and password)
        if ($request->name == 'Mohamed' && $request->password == 'mohamed12') {
            // Redirect to the admin page
            return redirect()->route('admin.page');
        } else {
            // If the credentials are wrong, redirect back with an error
            return back()->withErrors(['message' => 'YOUR USERNAME OR YOUR PASSWORD IS INCORRECT.']);
        } 
    } 
    public function userLogin(Request $request)
{   
    // Validate user login
    $request->validate([
        'name' => 'required',
        'password' => 'required',
        'team' => 'required',
    ]);

    // Define valid users
    $validUsers = [
        ['name' => 'ibtisam', 'password' => 'ibtisam12', 'team' => 'Prode', 'route' => 'ibtisam.page'],
        ['name' => 'ilyas', 'password' => 'ilyas12', 'team' => 'Prode', 'route' => 'ilyas.page'],
        ['name' => 'Ayoub', 'password' => 'ayoub12', 'team' => 'Artistique', 'route' => 'ayoub.page'],
        ['name' => 'Zakaria', 'password' => 'zakaria12', 'team' => 'Captation', 'route' => 'zakaria.page'],
    ];

    
    // Check if user credentials match
    foreach ($validUsers as $user) {
        if ($request->name === $user['name'] && $request->password === $user['password'] && $request->team === $user['team']) {
            return redirect()->route($user['route']);
        }
    }

    // If no match, return with error
    return back()->withErrors(['message' => 'YOUR USERNAME OR YOUR PASSWORD IS INCORRECT']);
}

    
}
 