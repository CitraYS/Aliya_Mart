<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aliya Mart & Ponsel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; color: #333; }
        h1, h2, h3 { font-family: 'Playfair Display', serif; }
        
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

        .card-product { border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: transform 0.3s; }
        .card-product:hover { transform: translateY(-5px); }
        .product-img { height: 200px; object-fit: cover; }
        .story-section { padding: 80px 0; background-color: #fff; }
        .story-img { border-radius: 15px; width: 100%; height: auto; }
        .info-box { padding: 30px; border-radius: 10px; background: #fdfdfd; border: 1px solid #eee; text-align: center; height: 100%; }
        footer { background: #111827; color: white; padding: 40px 0; }
    </style>
</head>
<body>
    <div style="position:fixed;right:30px;bottom:50px;">
        <a href="https://wa.me/message/LJM7CFHYRVYFK1">
        <button style="background:#32C03C;vertical-align:center;height:36px;border-radius:5px">
        <img src="https://i.postimg.cc/Gh1h62q5/whatsapp.png" style= "width: 15px"> Whatsapp Kami</button></a>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Aliya Mart dan Ponsel</a>
            <div class="ms-auto">
                <ul class="navbar-nav flex-row">
                    <li class="nav-item px-3"><a href="#products" class="nav-link">Produk</a></li>
                    <li class="nav-item px-3"><a href="#about" class="nav-link">Tentang Kami</a></li>
                    <li class="nav-item px-3"><a href="#galeri" class="nav-link">Galeri</a></li>
                    <li class="nav-item px-3"><a href="#contact" class="nav-link">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero">
        <div class="container">
            <h1 class="display-3 fw-bold mb-3">Selamat Datang Selamat Berbelanja</h1>
            <p class="lead mb-4"><b>Kami jual berbagai macam keperluan harian anda.</p>
            <a href="#products" class="btn btn-light btn-lg px-5 rounded-0">Belanja Sekarang</a>
        </div>
    </header>

    <section id="products" class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Produk Kami</h2>
        </div>
        <div class="row g-4">
            @php
            $products = [
                ['name' => 'Sembako', 'ket' => 'Handcrafted Ceramics', 'price' => '$45', 'img' => 'https://i.postimg.cc/DwB15djp/ef74d2014c25f33a0ef1382642807ee7.png/?w=400&q=80'],
                ['name' => 'Makanan', 'ket' => 'Handcrafted Ceramics', 'price' => '$28', 'img' => 'https://i.postimg.cc/G20tj4CB/Sd9ea6b010e084151bdc4dbb7d8d204f0n.jpg/?w=400&q=80'],
                ['name' => 'Minuman', 'ket' => 'Handcrafted Ceramics', 'price' => '$62', 'img' => 'https://i.postimg.cc/mr1ND1jr/5e16417793100fa174976c04553c9697.jpg?w=400&q=80'],
                ['name' => 'Pulsa & Token PLN', 'ket' => 'Handcrafted Ceramics', 'price' => '$38', 'img' => 'https://i.postimg.cc/XJVJPTrV/Usaha-Pulsa-Token-Berbau-Riba.jpg?w=400&q=80']
            ];
            @endphp

            @foreach ($products as $p)
                <div class="col-md-3">
                    <div class="card card-product h-100">
                        <img src="{{ $p['img'] }}" class="card-img-top product-img" alt="{{ $p['name'] }}">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $p['name'] }}</h5>
                           <!-- <p class="text-muted small">{{ $p['ket'] }}</p> -->
                            <div class="d-flex justify-content-between align-items-center">
                               <!-- <span class="fw-bold">{{ $p['price'] }}</span>-->
                               <!-- <button class="btn btn-outline-dark btn-sm rounded-0">Selengkapnya</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section id="about" class="story-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8 mb-md-0">
                    <h2 class="fw-bold mb-4">Tentang Kami</h2>
                    <p>Sudah belasan tahun sejak kami pertama kali menyusun barang dagangan di rak sederhana ini. Dari sembako hingga jajanan kecil, kami hadir untuk memastikan kebutuhan harian keluarga Anda terpenuhi dengan mudah.</p>
                    <p>Warung ini adalah bukti bahwa ketulusan dalam melayani bisa membuat kami bertahan sejak 2008 hingga hari ini. Terima kasih telah menjadi pelanggan setia dan bagian dari perjalanan panjang kami.</p>
                </div>
                <div class="col-md-4">
                    <img src="https://i.postimg.cc/B6vWDWSz/IMG-20250525-123622.jpg?w=400&q=80" class="story-img shadow-lg" alt="Artisan">
                </div>
            </div>
        </div>
    </section>

    <section id="galeri" class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Galeri Kami</h2>
        </div>
        <!-- baris 1 -->
        <div class="row g-4">
            <!-- kolom 1 -->
            <div class="col-md-3">
                <div class="card card-product h-100">
                    <img src="" class="card-img-top product-img" alt="">
                </div>
                <div class="d-flex justify-content-between align-items-center"></div>
            </div>
            <!-- kolom 2 -->
            <div class="col-md-3">
                <div class="card card-product h-100">
                    <img src="" class="card-img-top product-img" alt="">
                    <div class="d-flex justify-content-between align-items-center"></div>
                </div>
            </div>
            <!-- kolom 3 -->
            <div class="col-md-3">
                <div class="card card-product h-100">
                    <img src="" class="card-img-top product-img" alt="">
                    <div class="d-flex justify-content-between align-items-center"></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-product h-100">
                    <img src="" class="card-img-top product-img" alt="">
                    <div class="d-flex justify-content-between align-items-center"></div>
                </div>
            </div>
        </div> 
    </section>

    <section id="contact" class="container py-5 text-center">
        <h2 class="fw-bold mb-5">Kunjungi Kami</h2>
        <div class="row g-4">
            <div class="col-md-4 col-sm-6">
                <div class="info-box">
                    <h6 class="fw-bold">Lokasi</h6>
                    <p class="small text-muted mb-0">JL. Bandeng 1 No. 307<br>Rumbai Pesisir, Pekanbaru, Riau</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="info-box">
                    <h6 class="fw-bold">Jam Buka</h6>
                    <p class="small text-muted mb-0">Minggu - Senin : 07.00-23.00 wib</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="info-box">
                    <h6 class="fw-bold">Whatsapp</h6>
                    <p class="small text-muted mb-0">
                    <img src="https://i.postimg.cc/Gh1h62q5/whatsapp.png" style= "width: 20px">    
                    <a href="https://wa.me/message/LJM7CFHYRVYFK1" target="_blank" class="text-decoration-none">+62 851 6576 8187</a></p>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container text-center">
            <h5 class="fw-bold">Aliya Mart dan Ponsel</h5>
            <p class="small text-secondary mb-4">Kami jual berbagai macam keperluan harian anda</p>
            <div class="mb-4">
                <a href="https://www.facebook.com/aliyamartponsel/" target="_blank" class="text-white mx-2 text-decoration-none">Facebook</a>
                <a href="#" class="text-white mx-2 text-decoration-none">Instagram</a>
                <!-- <a href="https://wa.me/message/LJM7CFHYRVYFK1" target="_blank" class="text-white mx-2 text-decoration-none">Whatsapp</a> -->
            </div>
            <p class="small opacity-50">&copy; {{ date('Y') }} <a href="#"> citra yunela sari</a>. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>