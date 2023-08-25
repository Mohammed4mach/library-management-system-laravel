<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Author::get();
        return view("",["data"->$data]);
    }

    /**
     * Display a listing of the resource for user.
     */
    public function userIndex()
    {
        $data = Author::get();
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
    public function store(StoreAuthorRequest $request)
    {
        Author::create([
            'name' => $request->name,
        ]);
        return redirect("")->with('message',"Author Added");
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
        $data = Author::where('id', $id)->first();
        return view("",['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreAuthorRequest $request, string $id)
    {
        Author::where('id', $id)->update([
            'name' => $request->name,
        ]);
        return redirect("")->with('message',"Author Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Author::where('id', $id)->delete();
        return redirect("")->with('message',"Author Deleted");
    }
}
