<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBorrowedBookRequest;
use App\Models\Book;
use App\Models\BorrowedBook;
use App\Models\User;

class BorrowedBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        BorrowedBook::get();
        return view("");
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
        return view("");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBorrowedBookRequest $request)
    {
        $user_id = User::where('name',$request->user_name)->first();
        $book_id = Book::where('name',$request->book_name)->first();
        BorrowedBook::create([
        'user_id' => $user_id,
        'book_id' => $book_id,
        'returned' => $request->returned,
        'return_date' => $request->return_date,
        ]);
        return redirect("")->with('message',"Book Borrowed");
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
        $data = BorrowedBook::where('id', $id)->first();
        return view("",["data"=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBorrowedBookRequest $request, string $id)
    {
        $user_id = User::where('name',$request->user_name)->first();
        $book_id = Book::where('name',$request->book_name)->first();
        BorrowedBook::where('id', $id)->update([
        'user_id' => $user_id['id'],
        'book_id' => $book_id['id'],
        'returned' => $request->returned,
        'return_date' => $request->return_date,
        ]);
        return redirect("")->with('message',"Borrow Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        BorrowedBook::where('id', $id)->delete();
        return redirect("")->with('message' , "Borrow Deleted");
    }
}
