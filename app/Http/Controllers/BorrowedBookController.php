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
        $books = BorrowedBook::orderBy('created_at', 'DESC')->get();
        $books = $books->sortBy('returned');

        return view('admin.borrowed-books', [ 'books' => $books ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::get();
        $books = Book::get();

        return view('admin.forms.borrowed-book.create', [
            'users' => $users,
            'books' => $books,
        ]);
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
        $now    = new \DateTime();
        $userId = auth()->id();

        $returnDate = $now->modify('+14 days')->format('Y-m-d');

        BorrowedBook::create([
            'user_id'     => $userId,
            'book_id'     => $book,
            'return_date' => $returnDate,
        ]);

        Book::where('id', $book)->update([
            'available' => false
        ]);

        return redirect()->back()->with('message', "Book Borrowed");
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
     * Mark a borrowed book as returned
     *
     * @param string $id Borrowal id
     */
    public function return(string $id)
    {
        $borrowed = BorrowedBook::findOrFail($id);
        $book     = $borrowed->book();

        $borrowed->update([
            'returned' => true
        ]);

        $book->update([
            'available' => true
        ]);

        return redirect()->back()->with('message', 'Borrowed book returned');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $borrowed = BorrowedBook::findOrFail($id);
        $book     = $borrowed->book();

        $book->update([
            'available' => true
        ]);

        $borrowed->delete();

        return redirect()->back()->with('message' , 'Borrow Deleted');
    }
}
