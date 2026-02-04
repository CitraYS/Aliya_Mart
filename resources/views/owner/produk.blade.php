<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aliya Mart & Ponsel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            color: #333;
        }

        .hero {
            background: linear-gradient(rgba(158, 158, 158, 0.45), rgba(16, 21, 64, 0.7)), url('https://i.postimg.cc/Rhj5fHfw/IMG-20250628-205604.jpg?auto=format&fit=crop&w=1600&q=80');
            background-size: cover;
            background-position: center;
            height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }

        /* FITUR SCROLL: Perhatikan bagian ini */
        .table-container-scroll {
            max-height: 500px;
            /* Tabel akan scroll setelah tinggi melewati 400px */
            overflow-y: auto;
            border: 1px solid #dee2e6;
            position: relative;
        }

        /* STICKY HEADER: Agar judul tabel tidak ikut tergulung */
        .table-container-scroll thead th {
            position: sticky;
            top: 0;
            z-index: 10;
            background-color: #212529 !important;
            /* Warna hitam tabel dark */
            color: white;
        }

        #reader {
            background-color: black;
        }

        /* Garis bantu di tengah area scan */
        #reader__scan_region {
            border: 2px solid #32C03C !important;
        }

        /* Menyembunyikan tombol bawaan library yang mengganggu */
        #reader button {
            display: none;
        }

        footer {
            background: #111827;
            color: white;
            padding: 40px 0;
        }
    </style>
</head>

<body>
    <div style="position:fixed;right:30px;bottom:50px;z-index:999;">
        <a href="https://wa.me/message/LJM7CFHYRVYFK1" target="_blank" >
            <button style="background:#32C03C;color:white;border:none;height:40px;border-radius:5px;padding:0 15px;">
                <img src="https://i.postimg.cc/Gh1h62q5/whatsapp.png" style="width: 15px"> Whatsapp Kami
            </button>
        </a>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Aliya Mart dan Ponsel</a>
            <div class="ms-auto">
                <ul class="navbar-nav flex-row">
                    <li class="nav-item px-3"><a href="{{ url('/') }}" class="nav-link">Homepage</a></li>
                    <li class="nav-item px-3"><a href="{{ route('owner.logout') }}" class="nav-link text-danger">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!--- notifikasi produk -->
    <div class="container mt-3">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal!</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>
    <header class="hero">
        <div class="container">
            <h1 class="display-3 fw-bold mb-3">Selamat Datang Selamat Berbelanja</h1>
            <button type="button" class="btn btn-light btn-lg px-5 rounded-0" data-bs-toggle="modal" data-bs-target="#scanProduk">SCAN / TAMBAH BARCODE</button>
        </div>
    </header>

    <section id="products" class="container py-5">
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card shadow-sm border-0 bg-primary text-white">
                    <div class="card-body">
                        <h6 class="text-uppercase small">Total Jenis Produk</h6>
                        <h2 class="fw-bold mb-0">{{ $products->count() }} Item</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-0 bg-dark text-white">
                    <div class="card-body">
                        <h6 class="text-uppercase small">Total Modal Stok</h6>
                        <h2 class="fw-bold mb-0">Rp {{ number_format($total_modal, 0, ',', '.') }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-0 bg-success text-white">
                    <div class="card-body">
                        <h6 class="text-uppercase small">Potensi Omzet (Harga Jual)</h6>
                        <h2 class="fw-bold mb-0">Rp {{ number_format($total_jual, 0, ',', '.') }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Daftar Stok Produk</h2>
            <div class="search-box w-50 mx-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Cari nama produk atau barcode...">
            </div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
                + Tambah Produk
            </button>
        </div>

        <div class="table-container-scroll">
            <table class="table table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga Jual</th>
                        <th>Harga Modal</th>
                        <th>Stok</th>
                        <th>Barcode</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->nama_produk }}</td>
                        <td>Rp {{ number_format($p->harga_produk, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($p->harga_modal, 0, ',', '.') }}</td>
                        <td>{{ $p->stok_produk }}</td>
                        <td><span class="badge bg-secondary">{{ $p->barcode }}</span></td>
                        <td>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-warning btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalEdit"
                                    data-id="{{ $p->id }}"
                                    data-nama="{{ $p->nama_produk }}"
                                    data-harga="{{ $p->harga_produk }}"
                                    data-modal="{{ $p->harga_modal }}"
                                    data-stok="{{ $p->stok_produk }}"
                                    data-barcode="{{ $p->barcode }}">
                                    Edit
                                </button>

                                <form action="{{ route('produk.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data produk.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Produk Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('produk.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control" required>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label>Harga Jual</label>
                                <input type="number" name="harga_produk" class="form-control" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label>Harga Modal</label>
                                <input type="number" name="harga_modal" class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Stok</label>
                            <input type="number" name="stok_produk" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Barcode</label>
                            <input type="text" name="barcode" id="barcode_tambah" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Simpan Produk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="formEdit" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Nama Produk</label>
                            <input type="text" name="nama_produk" id="edit_nama" class="form-control" required>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label>Harga Jual</label>
                                <input type="number" name="harga_produk" id="edit_harga" class="form-control" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label>Harga Modal</label>
                                <input type="number" name="harga_modal" id="edit_modal" class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Stok</label>
                            <input type="number" name="stok_produk" id="edit_stok" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Barcode</label>
                            <input type="text" name="barcode" id="edit_barcode" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="scanProduk" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Scan Barcode Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="reader" style="width: 100%; border-radius: 10px; overflow: hidden;"></div>

                    <form action="{{ route('produk.scan') }}" method="POST" class="mt-3">
                        @csrf
                        <div class="mb-3">
                            <label>Hasil Scan Barcode</label>
                            <input type="text" name="barcode" id="barcode_input" class="form-control" placeholder="Arahkan kamera ke barcode..." required>
                        </div>
                        <div class="modal-footer px-0 pb-0">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Cari Produk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container text-center">
            <h5 class="fw-bold">Aliya Mart dan Ponsel</h5>
            <p class="small opacity-50">&copy; {{ date('Y') }} .<a href="https://www.instagram.com/citrayunela/" target="_blank" class="text-white mx-2 text-decoration-none">Citra Yunela Sari .</a>All rights reserved </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/html5-qrcode"></script>
    <script>
        // Fitur Search
        document.getElementById('searchInput').addEventListener('keyup', function() {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll('tbody tr');
            rows.forEach(row => {
                let nama = row.cells[1].textContent.toLowerCase();
                let barcode = row.cells[5].textContent.toLowerCase();
                row.style.display = (nama.includes(filter) || barcode.includes(filter)) ? "" : "none";
            });
        });
    </script>

    <script>
        let html5QrCode;

        // Fungsi saat scan berhasil
        function onScanSuccess(decodedText, decodedResult) {
            // Isi input barcode dengan hasil scan
            document.getElementById('barcode_input').value = decodedText;

            // Mainkan suara beep (opsional)
            alert("Barcode terdeteksi: " + decodedText);

            // Hentikan kamera setelah berhasil
            stopScanner();
        }

        function stopScanner() {
            if (html5QrCode) {
                html5QrCode.stop().then(() => {
                    console.log("Scanner stopped.");
                }).catch((err) => {
                    console.warn("Failed to stop scanner: ", err);
                });
            }
        }

        // Jalankan kamera saat modal dibuka
        const scanModal = document.getElementById('scanProduk');
        scanModal.addEventListener('shown.bs.modal', function() {
            html5QrCode = new Html5Qrcode("reader");
            const config = {
                fps: 20, // Meningkatkan frame per second agar lebih responsif
                qrbox: {
                    width: 300,
                    height: 150
                }, // Area scan lebih lebar untuk barcode memanjang
                aspectRatio: 1.0
            };

            // Tambahkan pengatur jenis barcode yang didukung
            const formatsToSupport = [
                Html5QrcodeSupportedFormats.EAN_13,
                //Html5QrcodeSupportedFormats.EAN_8,
                //Html5QrcodeSupportedFormats.CODE_128,
                //Html5QrcodeSupportedFormats.UPC_A,
                //Html5QrcodeSupportedFormats.UPC_E,
            ];

            html5QrCode.start({
                    facingMode: "environment"
                }, {
                    fps: 20,
                    qrbox: {
                        width: 300,
                        height: 150
                    },
                    formatsToSupport: formatsToSupport // Memaksa scanner mengenali barcode barang
                },
                function onScanSuccess(decodedText, decodedResult) {
                    let filter = decodedText.toLowerCase();
                    let rows = document.querySelectorAll('tbody tr');
                    let found = false;

                    // 1. Cek apakah barcode ada di tabel
                    rows.forEach(row => {
                        let barcodeCell = row.cells[5].textContent.toLowerCase();
                        if (barcodeCell.includes(filter)) {
                            found = true;
                        }
                    });

                    // 2. Tutup modal scan terlebih dahulu
                    var scanModalEl = document.getElementById('scanProduk');
                    var scanModal = bootstrap.Modal.getInstance(scanModalEl);
                    scanModal.hide();

                    if (found) {
                        // JIKA KETEMU: Jalankan filter search dan scroll
                        let searchInput = document.getElementById('searchInput');
                        searchInput.value = decodedText;
                        searchInput.dispatchEvent(new Event('keyup'));

                        document.getElementById('products').scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    } else {
                        // JIKA TIDAK KETEMU: Buka Modal Tambah & Isi Barcode Otomatis
                        setTimeout(() => {
                            // Isi input barcode di form tambah (Pastikan input di modal tambah punya id="barcode_tambah")
                            document.getElementById('barcode_tambah').value = decodedText;

                            // Tampilkan modal tambah
                            var modalTambah = new bootstrap.Modal(document.getElementById('modalTambah'));
                            modalTambah.show();

                            alert("Produk tidak ditemukan! Silakan tambah produk baru.");
                        }, 500); // Beri jeda 0.5 detik agar transisi modal halus
                    }
                }
            );
        });

        // Matikan kamera saat modal ditutup agar baterai tidak boros
        scanModal.addEventListener('hidden.bs.modal', function() {
            stopScanner();
        });
    </script>
    <script>
        const modalEdit = document.getElementById('modalEdit');
        modalEdit.addEventListener('show.bs.modal', function(event) {
            // Tombol yang memicu modal
            const button = event.relatedTarget;

            // Ambil data dari atribut data-*
            const id = button.getAttribute('data-id');
            const nama = button.getAttribute('data-nama');
            const harga = button.getAttribute('data-harga');
            const modal = button.getAttribute('data-modal');
            const stok = button.getAttribute('data-stok');
            const barcode = button.getAttribute('data-barcode');

            // Isi input di dalam modal
            document.getElementById('edit_nama').value = nama;
            document.getElementById('edit_harga').value = harga;
            document.getElementById('edit_modal').value = modal;
            document.getElementById('edit_stok').value = stok;
            document.getElementById('edit_barcode').value = barcode;

            // Atur action form agar mengarah ke route update yang benar
            document.getElementById('formEdit').action = '/owner/update/' + id;
        });
    </script>
</body>

</html>