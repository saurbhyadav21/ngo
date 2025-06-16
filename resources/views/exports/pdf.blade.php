<!DOCTYPE html>
<html>
<head>
    <title>PDF Export</title>
</head>
<body>
    <h1>Exported PDF Data</h1>

    @foreach ($data as $row)
        <p>Name: {{ $row['name'] }}</p>
        <p>Email: {{ $row['email'] }}</p>
        <hr>
    @endforeach

</body>
</html>