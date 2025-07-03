<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Local Events Hub') - Huddersfield Community</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.5;
            color: #333;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        /* Header */
        header {
            background: #2c3e50;
            color: white;
            padding: 15px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
            color: white;
        }

        .logo:hover {
            color: #3498db;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 3px;
            transition: background-color 0.2s;
        }

        nav a:hover {
            background-color: #34495e;
        }

        /* Main Content */
        main {
            min-height: calc(100vh - 120px);
            padding: 30px 0;
        }

        /* Cards */
        .card {
            background: white;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
        }

        .card-header {
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
            margin-bottom: 15px;
        }

        .card-title {
            font-size: 20px;
            color: #2c3e50;
            margin-bottom: 8px;
        }

        /* Buttons */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.2s;
            margin-right: 5px;
        }

        .btn-primary {
            background-color: #3498db;
            color: white;
        }

        .btn-primary:hover {
            background-color: #2980b9;
        }

        .btn-success {
            background-color: #27ae60;
            color: white;
        }

        .btn-success:hover {
            background-color: #229954;
        }

        .btn-warning {
            background-color: #f39c12;
            color: white;
        }

        .btn-warning:hover {
            background-color: #e67e22;
        }

        .btn-danger {
            background-color: #e74c3c;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }

        .btn-secondary {
            background-color: #95a5a6;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #7f8c8d;
        }

        /* Forms */
        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #2c3e50;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #bdc3c7;
            border-radius: 4px;
            font-size: 14px;
        }

        .form-control:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
        }

        .form-textarea {
            min-height: 100px;
            resize: vertical;
        }

        /* Alerts */
        .alert {
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: #d5f4e6;
            color: #27ae60;
            border: 1px solid #a9dfbf;
        }

        .alert-danger {
            background-color: #fadbd8;
            color: #e74c3c;
            border: 1px solid #f1948a;
        }

        /* Grid */
        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }

        .col {
            flex: 1;
            padding: 0 10px;
        }

        .col-md-6 {
            flex: 0 0 50%;
            max-width: 50%;
        }

        /* Search and Filter */
        .search-filter {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            border: 1px solid #ddd;
        }

        .search-filter form {
            display: flex;
            gap: 15px;
            align-items: end;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            list-style: none;
            gap: 5px;
            margin-top: 30px;
        }

        .pagination a,
        .pagination span {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 3px;
            text-decoration: none;
            color: #3498db;
        }

        .pagination .active {
            background-color: #3498db;
            color: white;
            border-color: #3498db;
        }

        /* Footer */
        footer {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 30px;
        }

        /* Event status badges */
        .status-badge {
            padding: 4px 8px;
            border-radius: 3px;
            font-size: 12px;
            font-weight: bold;
        }

        .status-upcoming {
            background-color: #d5f4e6;
            color: #27ae60;
        }

        .status-ongoing {
            background-color: #fef9e7;
            color: #f39c12;
        }

        .status-completed {
            background-color: #ebf3fd;
            color: #3498db;
        }

        .status-cancelled {
            background-color: #fadbd8;
            color: #e74c3c;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 15px;
            }

            nav ul {
                flex-direction: column;
                gap: 5px;
            }

            .search-filter form {
                flex-direction: column;
            }

            .col-md-6 {
                flex: 0 0 100%;
                max-width: 100%;
            }

            .container {
                padding: 0 10px;
            }
        }

        /* Some human-like imperfections */
        h1 {
            color: #2c3e50;
            margin-bottom: 10px;
            font-size: 28px;
        }

        h2 {
            color: #34495e;
            margin-bottom: 15px;
            font-size: 22px;
        }

        h3 {
            color: #2c3e50;
            margin-bottom: 10px;
            font-size: 18px;
        }

        p {
            margin-bottom: 10px;
        }

        /* Event card specific styling */
        .event-card {
            border-left: 4px solid #3498db;
        }

        .event-card .card-title {
            color: #2c3e50;
            font-size: 18px;
        }

        .event-info {
            margin: 8px 0;
            font-size: 14px;
        }

        .event-info strong {
            color: #2c3e50;
        }

        .event-description {
            color: #555;
            line-height: 1.4;
            margin: 15px 0;
        }

        .event-actions {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <a href="{{ route('events.index') }}" class="logo">Local Events Hub</a>
                <nav>
                    <ul>
                        <li><a href="{{ route('events.index') }}">All Events</a></li>
                        <li><a href="{{ route('events.create') }}">Add Event</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; {{ date('Y') }} Local Events Hub - Huddersfield Community</p>
        </div>
    </footer>
</body>
</html> 