<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login Owner - Aliya Mart</title>
</head>
<body class="bg-light d-flex align-items-center" style="height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow border-0">
                    <div class="card-body p-4">
                        <h4 class="text-center fw-bold mb-4">Login Owner</h4>
                        
                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <form action="{{ route('owner.auth') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label>ID Owner</label>
                                <input type="text" name="id_owner" class="form-control" placeholder="Masukkan ID" required>
                            </div>
                            <div class="mb-4">
                                <label>Password</label>
                                <input type="password" name="password_owner" class="form-control" placeholder="Masukkan Password" required>
                            </div>
                            <button type="submit" class="btn btn-dark w-100">Masuk ke Dashboard</button>
                        </form>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <a href="{{ url('/') }}" class="text-muted text-decoration-none small"> Kembali ke Beranda</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>