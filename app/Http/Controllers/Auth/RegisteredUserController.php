<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        // return 1;
        return view('auth.register',compact('users'));
    }

    // public function create()
    // {
    //     return view('auth.register');
    // }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('admin.adduser.register')->with('admin_success','User created successfully.');

        // event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
    }

    public function edit(User $user)
    {   
        return response()->json($user);
    }

    public function update(Request $request, User $user){

        $input = $request->all();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'image' => ['image','mimes:jpeg,png,jpg'],
            
        ]);
        
        if($request->password !=''){
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
            $pass = $request->password;
            $input['password'] = Hash::make($pass);
        }else{
            unset($input['password']);
        }

        // if ($request->hasFile('image')) {
            
        //     if (!empty($user['photo'])) {
        //         $imagePath = 'storage/'.$user['photo'];
                
        //         if(file_exists($imagePath)) {
        //             unlink($imagePath); //delete from storage
        //         }
        //     }
             
        //     $request_file = $request->file('image');
        //     $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
        //     $path         = $request_file->storeAs('user', $filename, 'public');
        //     $input['photo'] = "$path";
        // }else{
        //     unset($input['photo']);
        // }

        $user->update($input);
        return redirect()->route('admin.adduser.register')->with('admin_success','User updated successfully.');
    }

    public function destroy(User $user)
    {
        if (!empty($user['photo'])) {

            // $imagePath = 'storage/'.$user['photo'];
            // if(file_exists($imagePath)) {
            //     unlink($imagePath); //delete from storage
            // }
        }
        $user->delete();
        return redirect()->route('admin.adduser.register')->with('admin_success','User deleted successfully');
    }
}
