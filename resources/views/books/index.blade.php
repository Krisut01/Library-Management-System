<!DOCTYPE html>
<html>
<head>
    <title>Books</title>
</head>
<body>
    <h1>Books</h1>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Add a New Book</h2>
    <form action="{{ route('books.store') }}" method="post">
        @csrf
        <input type="text" name="title" placeholder="Title" required>
        <input type="text" name="author" placeholder="Author" required>
        <input type="number" name="published_year" placeholder="Published Year" required>
        <input type="text" name="isbn" placeholder="ISBN" required>
        <button type="submit">Add Book</button>
    </form>
</body>
</html>
