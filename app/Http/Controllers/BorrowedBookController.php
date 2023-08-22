<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBorrowedBookRequest;

class BorrowedBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the books borrowed by a user
     *
     * @param string $user User id
     */
    public function getOfCategory(string $user)
    {
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBorrowedBookRequest $request)
    {
        //
    }

    /**
     * Store a book in the borrowed list
     *
     * @param string $book Book id
     */
    public function userStore(string $book)
    {

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBorrowedBookRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
