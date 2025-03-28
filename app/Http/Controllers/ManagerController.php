<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    public function dashboard(){
        return view('manager.dashboard');
    }

    // list of teammates 
    public function listTeammates(){
        $teammates = User::where('role', '2')->paginate(10);
        return view('manager.teammate.list-teammates', compact('teammates'));
    }

    // create temmate page 
    public function createTeammate(){
        return view('manager.teammate.create-teammate');
    }

    // store teammate page
    public function storeTeammate(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 2,
        ]);

        return redirect()->route('manager.list-teammates')->with('success', 'Teammate created successfully.');
    }
}
