<!DOCTYPE html>
<html>
<head>
    <title>Semua hadist - {{ $perawiTerpilih['name'] }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 50px;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .list-unstyled li {
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 5px;
            background: linear-gradient(135deg, #eef2f3, #d9e4ea);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .list-unstyled li:hover {
            transform: scale(1.02);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        .list-unstyled li strong {
            color: #0d6efd;
        }
        .text-end {
            font-size: 1.5rem;
            line-height: 2;
            color: #333;
        }
        .text-start {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #555;
        }
        .pagination {
            justify-content: center;
            margin-top: 20px;
        }
        .pagination .page-link {
            border-radius: 5px;
            margin: 0 5px;
        }
        .pagination .active .page-link {
            background-color: #0d6efd;
            border-color: #0d6efd;
            color: white;
        }
        .btn-primary {
            display: block;
            width: 250px;
            margin: 30px auto;
            padding: 12px;
            font-size: 1.2rem;
            text-align: center;
            background-color: #0d6efd;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #084298;
            transform: scale(1.05);
        }
        .btn-primary a {
            text-decoration: none;
            color: white;
            display: block;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center pt-3">Semua Hadist Imam {{ $perawiTerpilih['name'] }}</h1>
        <ul class="list-unstyled">
            @foreach ($paginator as $hadis)
                <li>
                    <p><strong>Hadis Nomor {{ $hadis['number'] }}</strong></p>
                    <h4 class="text-end px-5">{{ $hadis['arab'] }}</h4>
                    <p class="text-start px-5">{{ $hadis['id'] }}</p>
                </li>
            @endforeach
        </ul>
        {{ $paginator->links() }}
        <br>
        <button class="btn btn-primary">
            <a href="{{ route('hadist.index') }}">Kembali ke Daftar Perawi</a>
        </button>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</body>
</html>
