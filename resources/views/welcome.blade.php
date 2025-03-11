<!DOCTYPE html>
<html>
<head>
    <title>Alquran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        .btn-container {
            width: 300px;
            margin: 1rem auto;
            display: block;
        }
        .a-button {
            display: block;
            width: 100%;
            padding: 2rem 0;
            text-align: center;
            color: white;
            text-decoration: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }
        .btn-primary {
            width: 100%;
            display: block;
            position: relative;
            overflow: hidden;
            border: none;
            background-color: #007bff;
            color: white;
            padding: 1.5rem 3rem;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2rem; 
        }
    
        .btn-primary::before {
            content: '';
            position: absolute;
            top: var(--mouse-y, -10%);
            left: var(--mouse-x, -10%);
            transform: translate(-50%, -50%);
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transition: width 0.3s ease, height 0.3s ease;
        }
    
        .btn-primary:hover::before {
            width: 300px;
            height: 300px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-5">Selamat Datang di APK Baca Quran</h1>
        <div class="btn-container">
            <a href="{{ route('surat.index') }}" class="a-button">
                <button class="btn btn-primary">Alquran</button>
            </a>
        </div>
        <div class="btn-container">
            <a href="{{ route('hadist.index') }}" class="a-button">
                <button class="btn btn-primary">Hadist</button>
            </a>
        </div>
        <div class="btn-container">
            <a href="{{ route('doa.index') }}" class="a-button">
                <button class="btn btn-primary">Doa Harian</button>
            </a>
        </div>
        <footer>
            <h4 class="text-center">Created by: &copy;AlfianNF</h4>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        const buttons = document.querySelectorAll('.btn-primary');

        buttons.forEach(button => {
            button.addEventListener('mousemove', (e) => {
                const rect = button.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;

                button.style.setProperty('--mouse-x', `${x}px`);
                button.style.setProperty('--mouse-y', `${y}px`);
            });

            button.addEventListener('mouseleave', () => {
                button.style.removeProperty('--mouse-x');
                button.style.removeProperty('--mouse-y');
            });

        });
    </script>
</body>
</html>