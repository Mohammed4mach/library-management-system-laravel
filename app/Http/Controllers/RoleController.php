<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Role::get();
        return view("",["data"->$data]);
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
    public function store(StoreRoleRequest $request)
    {
        Role::create([
        'title' => $request->title,
        ]);
        return redirect("")->with('message',"Role Added");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Role::where('id', $id)->first();
        return view("",['data'=>$data]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRoleRequest $request, string $id)
    {
        Role::where('id', $id)->update([
        'title' => $request->name,
        ]);
        return redirect("")->with('message',"Role Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Role::where('id', $id)->delete();
        return redirect("")->with('message',"Role Deleted");
    }
}
