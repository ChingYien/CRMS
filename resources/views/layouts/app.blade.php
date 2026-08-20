<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'CRMS' }}</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f6fa;
            color: #222;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 240px;
            height: 100vh;
            background: #1f2937;
            color: white;
            padding: 20px;
        }

        .sidebar h2 {
            margin-top: 0;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 10px;
            margin-bottom: 5px;
            border-radius: 5px;
        }

        .sidebar a:hover {
            background: #374151;
        }

        .content {
            margin-left: 240px;
            padding: 30px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .button {
            display: inline-block;
            padding: 9px 15px;
            border: none;
            border-radius: 5px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }

        .button-danger {
            background: #dc2626;
        }

        .button-secondary {
            background: #6b7280;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #e5e7eb;
            text-align: left;
        }

        th {
            background: #f9fafb;
        }

        .badge {
            display: inline-block;
            padding: 4px 9px;
            border-radius: 20px;
            font-size: 12px;
        }

        .badge-active {
            background: #dcfce7;
            color: #166534;
        }

        .badge-inactive {
            background: #fee2e2;
            color: #991b1b;
        }

        .alert {
            padding: 12px 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            background: #dcfce7;
            color: #166534;
        }

        .error {
            color: #dc2626;
            margin-bottom: 15px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 5px;
        }

        textarea.form-control {
            min-height: 100px;
            resize: vertical;
        }
    </style>
</head>

<body>

    <aside class="sidebar">
        <h2>CRMS</h2>

        <a href="{{ url('/') }}">Dashboard</a>

        <a href="{{ route('record-categories.index') }}">
            Record Categories
        </a>

        <a href="#">
            Records
        </a>

        <a href="#">
            People
        </a>

        <a href="#">
            Places
        </a>

        <a href="#">
            Documents
        </a>

        <a href="#">
            Settings
        </a>
    </aside>

    <main class="content">

        @if (session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')

    </main>

</body>
</html>