<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrower;
use App\Models\BorrowedBook;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $borrowers = Borrower::all(); // Get all borrowers for the homepage
        return view('home', ['books' => $books, 'borrowers' => $borrowers]);
    }

    public function assign(Request $request)
    {
        // Validate the request
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'borrower_id' => 'required|exists:borrowers,id',
        ]);

        // Assign the book to the borrower
        BorrowedBook::create([
            'book_id' => $request->book_id,
            'borrower_id' => $request->borrower_id,
            'borrowed_at' => now(),
        ]);

        return redirect()->route('home')->with('success', 'Book assigned successfully.');
    }

    public function removeAssignment($id)
    {
        // Remove the assignment
        BorrowedBook::find($id)->delete();
        return redirect()->route('home')->with('success', 'Assignment removed successfully.');
    }
}
