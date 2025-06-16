<!DOCTYPE html>
<html>
<head>
    <title>Multi Login System</title>
</head>
<body>

    <h2>Select Login Type</h2>

    <a href="{{ url('/login?type=admin') }}">
        <button>Admin</button>
    </a>

    <a href="{{ url('/login?type=manager') }}">
        <button>Manager</button>
    </a>

    <a href="{{ url('/login?type=coordinator') }}">
        <button>Coordinator</button>
    </a>

</body>
</html>
