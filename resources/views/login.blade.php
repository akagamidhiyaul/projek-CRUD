<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Barcelona Theme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #004aad, #f4c430, #c41230);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            background-size: cover;
            background-attachment: fixed;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .btn-barcelona {
            background-color: #c41230;
            color: #fff;
        }
        .btn-barcelona:hover {
            background-color: #004aad;
            color: #fff;
        }
        .form-control:focus {
            border-color: #f4c430;
            box-shadow: 0 0 5px rgba(244, 196, 48, 0.8);
        }
        .barcelona-title {
            font-weight: 700;
            color: #004aad;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-5">
                <div class="text-center mb-4">
                    <h2 class="barcelona-title">Visca Barca</h2>
                </div>
                <form action="{{ route('login.auth') }}" method="POST">
                    @csrf
                    @if (Session::get('failed'))
                        <div class="alert alert-danger">{{Session::get('failed')}}</div>
                    @endif
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email Anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password Anda" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-barcelona btn-lg">Login</button>
                    </div>
                </form>
                {{-- <div class="text-center mt-3">
                    <p>Belum punya akun? <a href="{{ route('register') }}" class="text-danger">Daftar Sekarang</a></p>
                </div> --}}
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
