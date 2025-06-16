<!DOCTYPE html>
<html>
<head>
    <title>Doner Details</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px 12px; border: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Doner Details</h2>
    <table>
        <tr><th>ID</th><td>{{ $doner->id }}</td></tr>
        <tr><th>Name</th><td>{{ $doner->name }}</td></tr>
        <tr><th>Amount</th><td>{{ $doner->amount }}</td></tr>
        <tr><th>Phone</th><td>{{ $doner->phone }}</td></tr>
        <tr><th>Status</th><td>{{ $doner->status }}</td></tr>
        <!-- aur bhi fields jo dikhani ho -->
    </table>
</body>
</html>
