@extends('layouts.admin-layout')

@section('title', 'Home - Admin Dashboard')

@section('content')

    

<div class="container mt-4">
    <h3 class="mb-4">Backup Panel</h3>

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Total Entry</th>
                <th>Download Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach($backups as $index => $backup)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $backup['name'] }}</td>
                <td>{{ $backup['total'] }}</td>
                <td>
                    <a href="{{ route('backup.download', ['type' => $backup['name'], 'format' => 'word']) }}" class="btn btn-sm btn-primary">Word</a>
                    <a href="{{ route('backup.download', ['type' => $backup['name'], 'format' => 'excel']) }}" class="btn btn-sm btn-success">Excel</a>
                    <a href="{{ route('backup.download', ['type' => $backup['name'], 'format' => 'pdf']) }}" class="btn btn-sm btn-danger">PDF</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

