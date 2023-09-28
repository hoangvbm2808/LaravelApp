<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Spatie\FlareClient\View;

use function Laravel\Prompts\error;

class UserManagementController extends Controller
{

    public function get_users() {
        $users = User::all();
        return response()->json($users);
    }
    //
    public function show()
    {
        $users = DB::select("SELECT * FROM users");
        $u = User::all();
        
        return view("pages.user-management")->with(['users' => $users]);
    }

    public function show_add() {
        return view("pages.add-user");
    }

    public function add() {
        $attributes = request()->validate([
            'username' => 'required|max:255|min:2',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255',
            'firstname' => ['max:100'],
            'lastname' => ['max:100'],
            'address' => ['max:100'],
            'city' => ['max:100'],
            'country' => ['max:100'],
            'postal' => ['max:100'],
            'about' => ['max:255']
        ]);
        $user = User::create($attributes);
        return back()->with('succes', 'User succesfully added');
    }

    public function show_update() {
        
        return view('pages.update-user');
    }

    public function update_user(Request $request) {
        $attributes = request()->validate([
            'username' => 'required|max:255|min:2',
            'email' => 'required|email|max:255',
            'password' => 'required|min:5|max:255',
            'firstname' => ['max:100'],
            'lastname' => ['max:100'],
            'address' => ['max:100'],
            'city' => ['max:100'],
            'country' => ['max:100'],
            'postal' => ['max:100'],
            'about' => ['max:255']
        ]);

        $id = $request->input('id');
        $boolean = "";

        $user = User::where('id', '=', $id)->first();

        if ($user->password == $request->input('password')) {
            $user->update([
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'firstname' => $request->input('firstname'),
                'lastname' => $request->input('lastname'),
                'address' => $request->input('address'),
                'city' => $request->input('city'),
                'country' => $request->input('country'),
                'postal' => $request->input('postal'),
                'about' => $request->input('about'),
            ]);
        } else {
            $user->update([
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                // 'password' => bcrypt($request->input('password')),
                'firstname' => $request->input('firstname'),
                'lastname' => $request->input('lastname'),
                'address' => $request->input('address'),
                'city' => $request->input('city'),
                'country' => $request->input('country'),
                'postal' => $request->input('postal'),
                'about' => $request->input('about'),
            ]); 
            if (Hash::check($request->input('password'), bcrypt($request->input('password')))) {
                $boolean = "true";
            } else {
                $boolean = "false";
            }
            
        }
        

        

        if ($user != null) {
            return back()->with('succes', $boolean); 
        } else {
            return back()->with('error', 'User update fail'); 
        }
        
    }


    public function delete_user($id) {
        $user = User::find($id);
        $user->delete();
        return redirect("/user-management");
    }
}
