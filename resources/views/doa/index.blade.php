<!DOCTYPE html>
<html>
<head>
    <title>Daftar Doa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: 'Arial', sans-serif;
            color: #333;
        }
        .container {
            margin-top: 50px;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #0d6efd;
            font-weight: bold;
        }
        .list-unstyled li {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            background-color: #f9f9f9;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .list-unstyled li:hover {
            transform: scale(1.02);
            box-shadow: 0 5px 15px rgba(0, 0, 255, 0.2);
        }
        h4.judul {
            color: #0d6efd;
            font-size: 1.3rem;
        }
        p {
            font-size: 1rem;
            line-height: 1.6;
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
            background-color: #007bff;
            border-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Doa</h1>
        <ul class="list-unstyled">
            @foreach ($paginator as $index => $doa)
                <li>
                    <h4 class="judul" class="text-start px-5">{{ $startIteration + $index }}. {{ $doa['judul'] }}</h4>
                    <h4 class="text-end px-5">{{ $doa['arab'] }}</h4>
                    <p class="text-start px-5"><strong>Artinya: </strong>{{ $doa['indo'] }}</p>
                    <p class="text-start px-5"><strong>Sumber: </strong>{{ $doa['source'] }}</p>
                </li>
            @endforeach
        </ul>
        <div>
            {{ $paginator->links() }}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
