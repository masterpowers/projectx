<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    /**
     * Display all Users
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index')->with(compact('users'));
    }

    /**
     * Show the form for creating a new User
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created User in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'username' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6|confirmed',
        ]);
        $user = User::create($request->all());
        // $user->profile()->create($request->all());
        return redirect()->route('admin::user@show',['id' => $user->id]);
    }

    /**
     * Display the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.show')->with(compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit')->with(compact('user'));
    }

    /**
     * Update the specified user in database.
     *
     * @param  \Illuminate\Http\Request  $request Patch
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('admin::user@show');
    }

    /**
     * Remove the specified user from database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(!\Bouncer::is($user)->an('admin')){
        $user->delete();
        return redirect()->route('admin::user@index');
        }
        dd('Fool!... You Cannot Delete an Administrator!...');
        
    }
}
