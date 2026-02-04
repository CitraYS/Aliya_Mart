<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login Owner - Aliya Mart</title>
</head>

<body class="bg-light d-flex align-items-center" style="height: 100vh;">
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-11 col-md-6 col-lg-4">
            <div class="card shadow border-0 p-4">
                <div class="card-body">
                    <h3 class="text-center mb-4 fw-bold">Login Owner</h3>
                    @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                    <form action="{{ route('owner.login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">ID Owner</label>
                            <input type="text" name="id_owner" class="form-control" placeholder="Masukkan ID">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password_owner" class="form-control" placeholder="Masukkan Password">
                        </div>

                        <button type="submit" class="btn btn-dark w-100 py-2">Masuk ke Dashboard</button>
                    </form>

                    <div class="text-center mt-3">
                        <a href="{{ url('/') }}" class="text-decoration-none text-muted small">Kembali ke Beranda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>