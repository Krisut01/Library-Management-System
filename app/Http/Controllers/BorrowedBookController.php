<?php

namespace App\Http\Controllers;

use App\Models\BorrowedBook;
use Illuminate\Http\Request;

class BorrowedBookController extends Controller
{
    public function index()
    {
        $borrowedBooks = BorrowedBook::with(['borrower', 'book'])->get();
        return response()->json($borrowedBooks);
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'borrower_id' => 'required|exists:borrowers,id',
            'book_id' => 'required|exists:books,id',
            'borrowed_at' => 'required|date',
            'returned_at' => 'nullable|date'
        ]);

        // Create a new borrowed book record
        $borrowedBook = BorrowedBook::create($request->all());
        return response()->json($borrowedBook, 201);
    }
}
