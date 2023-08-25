<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();

        return view('admin.users', ["users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
        ]);
        return redirect("")->with('message',"User Added");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Display the user profile.
     */
    public function getProfile()
    {
        $id          = auth()->id();
        $user        = User::find($id);
        $user->title = $user->role()->get()->first()?->title;

        return view('user.profile', $user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::where('id', $id)->first();
        return view("", ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUserRequest $request, string $id)
    {
        User::where('id', $id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'role_id' => $request->role_id,

        ]);
        return redirect("")->with('message',"User Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();
        return redirect("")->with('message',"User Deleted");
    }
}
