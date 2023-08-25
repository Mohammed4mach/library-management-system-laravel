<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\Author;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::get();

        return view('admin.books', ['books' => $books]);
    }

    /**
     * Display a listing of the resource for user.
     */
    public function userIndex()
    {
        Book::get();
        return view("");
    }

    /**
     * Display a listing of the books belongs to a category
     *
     * @param string $category The category of the books
     */
    public function getOfCategory(string $category) //category_id passe for condition
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::get();

        return view('admin.forms.book.create', [ 'authors' => $authors ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        Book::create([
            'title' => $request->title,
            'describtion' => $request->describtion,
            'author_id' => $request->author_id,
        ]);

        return redirect(route('books.index'))->with('message', 'Book Added');
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
        $data = Book::where('id', $id)->first();
        return view("");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBookRequest $request, string $id)
    {
        $author_id = Author::where('name',$request->author_name)->first();
        Book::where('id', $id)->update([
            'title' => $request->title,
            'describtion' => $request->describtion,
            'author_id' => $author_id['id'],
        ]);
        return redirect("")->with('message',"Book Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Book::where('id', $id)->delete();
        return redirect("")->with('message',"Book Deleted");
    }
}
