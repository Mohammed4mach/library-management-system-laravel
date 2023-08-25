<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::get();
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
    public function store(StoreCategoryRequest $request)
    {
        Category::create([
        'name' => $request->name,
        ]);
        return redirect("")->with('message',"Category Added");
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
        $data = Category::where('id', $id)->first();
        return view("",['data'=>$data]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCategoryRequest $request, string $id)
    {
        Category::where('id', $id)->update([
        'name' => $request->name,
        ]);
        return redirect("")->with('message',"Category Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::where('id', $id)->delete();
        return redirect("")->with('message',"Category Deleted");
    }
}
