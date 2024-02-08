<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\HasMany;



class BookController extends Controller
{

    public function ShowAddBooks()
    {
        return view('addbook');
    }


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
        $books = Book::where('status', 0)->get();
        return view('home', compact('books'));
    }

    public function ShowBookslist()
    {
        $books = Book::all();
        return view('bookslist', compact('books'));
    }

    public function showDetails($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return redirect()->route('show')->with('error', 'Book not found.');
        }

        return view('details', compact('book'));
    }


    public function delete($id)
    {
        Book::find($id)->delete();
        return redirect()->route('bookslist');
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

        return redirect()->route('bookslist');
    }


    // public function reserveBook($bookId)
    // {
    //     $userId = 1;

    //     $user = User::find($userId);

    //     if (!$user->reservations()->where('id_book', $bookId)->exists()) {

    //         $reservation = new Reservation(['id_user' => $user->id]);
    //         Book::find($bookId)->reservations()->save($reservation);
    //     }

    //     return redirect()->route('show')->with('success', 'Book reserved successfully.');
    // }

    public function reserveBook($bookId, Request $request)
    {
        $request->validate([
            'end_date' => 'required|date',
        ]);

        $startDate = now();
        $endDate = $request->input('end_date');

        if ($endDate < $startDate) {
            return redirect()->route('show')->with('error', 'Invalid end date.');
        }

        $book = new Reservation();

        $book->id_book = $bookId;
        $book->id_user = 1;
        $book->end_date = $endDate;

        $book->save();

        Book::where('id', $bookId)->update(['status' => 1]);
        

        return redirect()->route('reservations')->with('success', 'Book reserved successfully.');
    }


    // public function unreserve($id)
    // {
    //     Reservation::find($id)->delete();
    //     return redirect()->route('show');
    // }

    public function reservedBooks()
    {
        $userId = 1;

        $user = User::find($userId);

        $reservedBooks = $user->reservations()->with('book')->get()->pluck('book');

        return view('reservations', compact('reservedBooks'));
    }

    public function details($id)
    {
        $book = Book::find($id);
        return view('details', compact('book'));
    }

    public function unreserveBook($bookId)
    {
        $userId = 1;

        $user = User::find($userId);

        $reservation = $user->reservations()->where('id_book', $bookId)->first();


        if ($reservation) {

            $reservation->delete();

            Book::where('id', $bookId)->update(['status' => 0]);

            return redirect()->route('reservations');
        } else {
            return redirect()->route('reservations');
        }
    }
}
