<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        collect($books)->each(function ($book) {
            $this->addAuthor($book);
        });
        return $books;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author_id' => 'required',
            'price' => 'required',
            'rating' => 'required'
        ]);

        $id = 1;
        $book = Book::find(DB::table('books')->max('id'));
        if ($book != null) {
            $id = $book->id + 1;
        }
        $newBook = Book::create($request->all() + ['id' => $id]);
        $newBook->id = $id;
        return $newBook;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        if ($book == null) {
            return response(['error' => true, 'error-msg' => 'Book not found'], 404);
        }

        $this->addAuthor($book);
        return $book;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        if ($book == null) {
            return response(['error' => true, 'error-msg' => 'Book not found'], 404);
        }

        $book->update($request->all());
        return $book;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Book::find($id) == null) {
            return response(['error' => true, 'error-msg' => 'Book not found'], 404);
        }

        return Book::destroy($id);
    }

    /**
     * Search for a book with the given title.
     *
     * @param  str  $title
     * @return \Illuminate\Http\Response
     */
    public function search($title)
    {
        $books = Book::where('title', 'like', '%' . $title . '%')->get();
        collect($books)->each(function ($book) {
            $this->addAuthor($book);
        });
        return $books;
    }

    private function addAuthor($book)
    {
        $author = Author::find($book->author_id);
        $this->addAddress($author);
        unset($book['author_id']);
        $book->author = $author;
    }

    private function addAddress($author)
    {
        $address = Address::find($author->address_id);
        unset($author['address_id']);
        $author->address = $address;
    }
}
