<!DOCTYPE html>
<html>
<head>
    <title>Borrowed Books</title>
</head>
<body>
    <h1>Borrowed Books</h1>
    <table>
        <thead>
            <tr>
                <th>Borrower</th>
                <th>Book</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrowedBooks as $borrowedBook)
                <tr>
                    <td>{{ $borrowedBook->borrower->name }}</td>
                    <td>{{ $borrowedBook->book->title }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Borrow a Book</h2>
    <form action="{{ route('borrowed_books.store') }}" method="post">
        @csrf
        <label for="borrower_id">Borrower:</label>
        <select name="borrower_id" required>
            @foreach(App\Models\Borrower::all() as $borrower)
                <option value="{{ $borrower->id }}">{{ $borrower->name }}</option>
            @endforeach
        </select>

        <label for="book_id">Book:</label>
        <select name="book_id" required>
            @foreach(App\Models\Book::all() as $book)
                <option value="{{ $book->id }}">{{ $book->title }}</option>
            @endforeach
        </select>

        <button type="submit">Borrow Book</button>
    </form>
</body>
</html>
