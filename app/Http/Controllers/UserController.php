<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailUserStuffJob;
use App\Mail\sendMailUserStuff;
use App\Models\book;
use App\Models\CopyBook;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    //  public function books(User $user)
    // {
    //    // $results = DB::select('select book_id from copy_books where user_id = :id', ['id' => 1]);
    //        $results=CopyBook::where('user_id',$user->id)->get();
    //        $n[0]=0;$counter=0;
    //     foreach ($results as  $result) {
    //         $n[$counter]=$result->book_id;
    //         $counter++;
    //     }
    //      $books=book::whereIn('id',$n)->get();
    //     return view('users.showbooks',[
    //         'books'=>$books,
    //         'name'=>$user->name
    //     ]);

    // }


    public function index()
    {
               if(!Auth::guard('admin')->check()){
        return redirect()->route('admin.login');
     }
     $orderDesc=false;
     if($orderDesc){
        return view('users.index', [
            'users' => User::all()->sortBy('borrowing_times')
        ]);
    }
    else return view('users.index', [
        'users' => User::all()->sortByDesc('borrowing_times')
    ]);

    }

    public function show(User $user)
    {
        if(!Auth::guard('admin')->check()){
            return redirect()->route('admin.login');
         }

        return view('users.show', [
            'listing' => $user
        ]);
    }
    public function edit(User $user)
    {

        if(!Auth::guard('admin')->check()){
            return redirect()->route('admin.login');
         }
        return view('users.edit', [
            "user" => $user
        ]);
    }

    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:8'
        ]);

// Hash Password
$formFields['password'] = bcrypt($formFields['password']);

// Create User
$user = User::create($formFields);
        // Login
        auth()->login($user);

        return redirect('/books')->with('message', 'User created and logged in');
    }
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');

    }
    public function update(Request $request, User $user)
    {

        $formFields = $request->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'email' => ['required', 'email',],
            'phone' => 'min:10',
        ]);

        $user->update($request->all());
        return  redirect('users')->with('message', 'customer updated successfully');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('users')->with('message', 'customer deleted successfully');
    }

     // Show Login Form
     public function login() {
        return view('users.login');
    }
    // public function authenticate(Request $request) {
    //     $formFields = $request->validate([
    //         'email' => ['required', 'email'],
    //         'password' => 'required'
    //     ]);

    //     if(auth()->attempt($formFields)) {
    //         $request->session()->regenerate();

    //         return redirect('/books')->with('message', 'You are now logged in!');
    //     }

    //     return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    // }
}
