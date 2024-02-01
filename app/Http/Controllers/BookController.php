<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    public function addBook(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $book = new Book();
        $book->setBookContent($request->input('content'));
        $book->setBookTitle($request->input('title'));
        $book->save();

        return redirect()->route('show');
    }

    public function ShowBooks()
    {
        $books = Book::all();
        return view('home', compact('books'));
    }

    public function ShowBookslist()
    {
        $books = Book::all();
        return view('bookslist', compact('books'));
    }

    public function delete($id)
    {
        Book::find($id)->delete();
        return redirect()->route('show');
    }

    public function edit($id)
    {
        $book = Book::find($id);
        return view('editbook', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $book = Book::find($id);
        $book->setBookContent($request->input('content'));
        $book->setBookTitle($request->input('title'));
        $book->save();

        return redirect()->route('show');
    }
}
