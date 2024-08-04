<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 20px;
        }
        .header {
            margin-bottom: 20px;
        }
        table {
            margin-bottom: 20px;
        }
        table th, table td {
            text-align: center;
        }
        .btn {
            margin-top: 10px;
        }
        .alert {
            margin-top: 20px;
        }
        .btn-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 class="text-center">Library Management System</h1>
            <div class="btn-group d-flex justify-content-center mb-4">
                <!-- Button to view borrowers -->
                <a href="{{ route('borrowers.index') }}" class="btn btn-info">View Borrowers</a>
                <!-- Button to log out -->
                <form action="{{ route('logout') }}" method="post" class="ml-2">
                    @csrf
                    <button type="submit" class="btn btn-secondary">Logout</button>
                </form>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Available Books Section -->
        <div class="card">
            <div class="card-header">
                <h2>Available Books</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Assign</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $book)
                            <tr>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>
                                    <form action="{{ route('books.assign') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                                        <div class="form-group">
                                            <select name="borrower_id" class="form-control" required>
                                                <option value="">Select Borrower</option>
                                                @foreach($borrowers as $borrower)
                                                    <option value="{{ $borrower->id }}">{{ $borrower->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Assign Book</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Current Assignments Section -->
        <div class="card">
            <div class="card-header">
                <h2>Current Assignments</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Book Title</th>
                            <th>Borrower Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $book)
                            @foreach($book->borrowers as $assignment)
                                <tr>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $assignment->borrower->name }}</td>
                                    <td>
                                        <form action="{{ route('books.removeAssignment', $assignment->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Remove Assignment</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
