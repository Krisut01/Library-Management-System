<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrowers Management</title>
    <!-- Linking Bootstrap CSS for styling -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
            font-family: Arial, sans-serif; /* Font for better readability */
        }
        .container {
            margin-top: 20px; /* Space above the container */
        }
        .card {
            margin-bottom: 20px; /* Space below cards */
        }
        .btn {
            margin-top: 10px; /* Space above buttons */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header mb-4">
            <h1 class="text-center">Borrowers Management</h1>
        </div>

        <!-- Success message display -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Button to view available books -->
        <div class="mb-4 text-center">
            <a href="{{ route('books.index') }}" class="btn btn-info">View Available Books</a>
        </div>

        <!-- Add New Borrower Form -->
        <div class="card">
            <div class="card-header">
                <h2>Add New Borrower</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('borrowers.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter borrower's name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Borrower</button>
                </form>
            </div>
        </div>

        <!-- List of Borrowers -->
        <div class="card">
            <div class="card-header">
                <h2>Current Borrowers</h2>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach($borrowers as $borrower)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $borrower->name }}
                            <!-- Delete Borrower Form -->
                            <form action="{{ route('borrowers.destroy', $borrower->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!-- Bootstrap and jQuery JavaScript libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
