<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Hotel Go - Premium Hotel Booking</title>
    <style>
        :root {
            --primary-color: #8a63ff;
            --secondary-color: #5e35b1;
            --dark-bg: #121212;
            --darker-bg: #0a0a0a;
            --card-bg: #1e1e1e;
            --text-color: #e0e0e0;
            --light-text: #f5f5f5;
            --medium-gray: #9e9e9e;
            --dark-gray: #424242;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background: var(--dark-bg);
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        header {
            background: rgba(30, 30, 30, 0.95);
            backdrop-filter: blur(10px);
            padding: 1rem 0;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.3);
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid var(--dark-gray);
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            height: 50px;
            /* Adjust height as needed */
        }

        .logo img {
            height: 70px;
            width: 70px;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--light-text);
            font-weight: 500;
            transition: var(--transition);
        }

        .nav-links a:hover {
            color: var(--primary-color);
        }

        .btn {
            padding: 0.5rem 1rem;
            border-radius: 25px;
            transition: var(--transition);
            text-decoration: none;
            display: inline-block;
            text-align: center;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            color: var(--light-text);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(138, 99, 255, 0.6);
        }

        .btn-secondary {
            background: linear-gradient(45deg, var(--secondary-color), var(--primary-color));
            color: var(--light-text);
        }

        .btn-danger {
            background: #d32f2f;
            color: var(--light-text);
        }

        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            gap: 3px;
        }

        .hamburger span {
            width: 25px;
            height: 3px;
            background: var(--light-text);
            transition: var(--transition);
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                url('/images/hero.JPG');
            background-size: cover;
            background-position: center;
            height: 70vh;
            display: flex;
            align-items: center;
            text-align: center;
            color: var(--light-text);
        }

        .hero-content h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.8);
        }

        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.8);
        }

        /* Search Form */
        .search-form {
            background: rgba(30, 30, 30, 0.95);
            backdrop-filter: blur(10px);
            padding: 2rem;
            border-radius: 20px;
            margin: -3rem auto 4rem;
            max-width: 800px;
            box-shadow: var(--shadow);
            position: relative;
            z-index: 100;
            border: 1px solid var(--dark-gray);
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            color: var(--medium-gray);
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        .form-control {
            padding: 0.75rem;
            border: 2px solid var(--dark-gray);
            border-radius: 10px;
            font-size: 1rem;
            transition: var(--transition);
            background-color: var(--darker-bg);
            color: var(--light-text);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(138, 99, 255, 0.2);
        }

        /* Cards */
        .card {
            background: var(--card-bg);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            border: 1px solid var(--dark-gray);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        }

        .card-img {
            height: 200px;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .card-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(30, 30, 30, 0.9);
            padding: 0.5rem;
            border-radius: 10px;
            font-weight: bold;
            color: var(--primary-color);
            border: 1px solid var(--dark-gray);
        }

        .card-body {
            padding: 1.5rem;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: var(--light-text);
        }

        .card-text {
            color: var(--medium-gray);
            margin-bottom: 1rem;
        }

        .amenity {
            background: rgba(138, 99, 255, 0.1);
            color: var(--primary-color);
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            display: inline-block;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
            border: 1px solid rgba(138, 99, 255, 0.3);
        }

        .price {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary-color);
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            z-index: 2000;
            padding: 2rem;
            overflow-y: auto;
        }

        .modal-content {
            background: var(--card-bg);
            max-width: 1000px;
            margin: 2rem auto;
            border-radius: 20px;
            position: relative;
            max-height: 90vh;
            overflow-y: auto;
            border: 1px solid var(--dark-gray);
        }

        .modal-header {
            padding: 2rem;
            border-bottom: 1px solid var(--dark-gray);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-title {
            font-size: 2rem;
            font-weight: bold;
            color: var(--light-text);
        }

        .close-btn {
            background: none;
            border: none;
            font-size: 2rem;
            cursor: pointer;
            color: var(--medium-gray);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .close-btn:hover {
            background: var(--dark-gray);
            color: var(--light-text);
        }

        .grid {
            display: grid;
            gap: 2rem;
        }

        .hotels-grid {
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        }

        .rooms-grid {
            padding: 2rem;
        }

        .room-card {
            grid-template-columns: 300px 1fr;
            padding: 1.5rem;
            border: 2px solid var(--dark-gray);
            border-radius: 15px;
            transition: var(--transition);
            background: var(--card-bg);
        }

        .room-card:hover {
            border-color: var(--primary-color);
        }

        h2.text-center {
            color: var(--light-text);
        }

        .about-section {
            padding: 5rem 0;
            background: var(--darker-bg);
            border-top: 1px solid var(--dark-gray);
            border-bottom: 1px solid var(--dark-gray);
            text-align: center;
        }

        .about-content-centered {
            max-width: 800px;
            margin: 0 auto;
        }

        .about-text-centered h2 {
            font-size: 2.5rem;
            margin-bottom: 2rem;
            color: var(--light-text);
            position: relative;
            display: inline-block;
        }

        .about-text-centered h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--primary-color);
        }

        .about-text-centered p {
            margin-bottom: 1.5rem;
            color: var(--medium-gray);
            font-size: 1.1rem;
            line-height: 1.8;
            text-align: left;
        }

        @media (max-width: 768px) {
            .about-text-centered {
                padding: 0 20px;
            }

            .about-text-centered h2 {
                font-size: 2rem;
            }

            .about-text-centered p {
                font-size: 1rem;
            }
        }

        /* Footer */
        footer {
            background: var(--darker-bg);
            padding: 3rem 0 1.5rem;
            border-top: 1px solid var(--dark-gray);
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-column h3 {
            color: var(--light-text);
            margin-bottom: 1.5rem;
            font-size: 1.2rem;
        }

        .footer-column ul {
            list-style: none;
        }

        .footer-column ul li {
            margin-bottom: 0.8rem;
        }

        .footer-column ul li a {
            color: var(--medium-gray);
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-column ul li a:hover {
            color: var(--primary-color);
        }

        .copyright {
            text-align: center;
            padding-top: 1.5rem;
            border-top: 1px solid var(--dark-gray);
            color: var(--medium-gray);
            font-size: 0.9rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background: var(--card-bg);
                flex-direction: column;
                padding: 1rem;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
                border: 1px solid var(--dark-gray);
            }

            .nav-links.active {
                display: flex;
            }

            .hamburger {
                display: flex;
            }

            .hero-content h1 {
                font-size: 2.5rem;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .hotels-grid {
                grid-template-columns: 1fr;
            }

            .room-card {
                grid-template-columns: 1fr;
            }

            .modal {
                padding: 1rem;
            }

            .modal-content {
                margin: 1rem auto;
            }

            .logo {
                height: 40px;
                /* Smaller logo on mobile */
            }

            .about-content {
                grid-template-columns: 1fr;
            }

            .about-image {
                order: -1;
            }
        }

        @media (max-width: 480px) {
            .hero-content h1 {
                font-size: 2rem;
            }

            .search-form {
                margin: -2rem 20px 2rem;
                padding: 1.5rem;
            }

            .logo {
                height: 35px;
                /* Even smaller logo on very small screens */
            }
        }

        /* Gallery Styles */
        .gallery-grid {
            margin-top: 4rem;
        }

        .gallery-title {
            text-align: center;
            margin-bottom: 2rem;
            color: var(--light-text);
            font-size: 1.8rem;
        }

        .gallery-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .gallery-item {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            height: 180px;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
        }

        .gallery-item:hover img {
            transform: scale(1.05);
        }

        /* Responsive Gallery */
        @media (max-width: 992px) {
            .gallery-row {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .gallery-row {
                grid-template-columns: 1fr;
            }

            .gallery-item {
                height: 250px;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <nav class="container">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Hotel Go Logo">
            </div>
            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#hotels">Hotels</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                @guest
                    <li><a href="{{ route('login') }}" class="btn btn-primary">Login</a></li>
                    <li><a href="{{ route('register') }}" class="btn btn-secondary">Register</a></li>
                @else
                    <li>
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </li>
                @endguest
            </ul>
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <div class="hero-content">
                <h1>Temukan Hotel Impian Anda</h1>
                <p>Nikmati pengalaman menginap yang tak terlupakan dengan pelayanan premium</p>
            </div>
        </div>
    </section>

    <main class="main-content">
        <div class="container">
            <div id="hotelsSection">
                <h2 class="text-center" style="margin-bottom: 2rem; font-size: 2.5rem;">Hotel Terpopuler</h2>
                <div class="grid hotels-grid" id="hotelsGrid">
                    @foreach ($hotels as $hotel)
                        @php
                            $defaultSvg =
                                'data:image/svg+xml,' .
                                urlencode(
                                    '
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 200">
                                    <rect fill="#1e1e1e" width="400" height="200"/>
                                    <rect fill="#2d2d2d" x="50" y="50" width="300" height="100"/>
                                    <text x="200" y="105" text-anchor="middle" font-family="Arial" font-size="16" fill="#8a63ff">
                                        ' .
                                        htmlspecialchars($hotel->nama_hotel) .
                                        '
                                    </text>
                                </svg>',
                                );
                            $imageUrl = $hotel->gambar ? asset('storage/' . $hotel->gambar) : $defaultSvg;
                        @endphp

                        <div class="card">
                            <a href="{{ route('hotel.rooms', $hotel->id) }}"
                                style="text-decoration: none; color: inherit;">
                                <div class="card-img" style="background-image: url('{{ $imageUrl }}')">
                                    <div class="card-badge">⭐ 4.5</div>
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title">{{ $hotel->nama_hotel }}</h3>
                                    <div class="card-text">📍 {{ $hotel->kota }}</div>
                                    <div>
                                        @foreach (explode(',', $hotel->fitur_hotel) as $fitur)
                                            <span class="amenity">{{ ucwords(trim($fitur)) }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- About Section -->
        <section class="about-section" id="about">
            <div class="container">
                <div class="about-content-centered">
                    <div class="about-text-centered">
                        <h2>Tentang Hotel Go</h2>
                        <p>Hotel Go adalah platform pemesanan hotel premium yang menghadirkan pengalaman menginap tak
                            terlupakan. Kami bekerja sama dengan hotel-hotel terbaik di seluruh Indonesia untuk
                            memberikan pelayanan terbaik kepada pelanggan kami.</p>
                        <p>Dengan lebih dari 10 tahun pengalaman dalam industri perhotelan, tim kami berkomitmen untuk
                            menyediakan akomodasi berkualitas tinggi dengan harga yang kompetitif. Setiap properti yang
                            bekerja sama dengan kami telah melalui proses seleksi ketat untuk memastikan standar
                            kenyamanan dan pelayanan terbaik.</p>
                        <p>Kami percaya bahwa setiap perjalanan seharusnya menjadi pengalaman istimewa, dan itulah yang
                            kami tawarkan melalui Hotel Go - pengalaman menginap yang mewah, nyaman, dan tak
                            terlupakan.</p>
                    </div>
                </div>

                <!-- Gallery Grid -->
                <div class="gallery-grid">
                    <div class="gallery-row">
                        <div class="gallery-item">
                            <img src="https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                                alt="Hotel 1">
                        </div>
                        <div class="gallery-item">
                            <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                                alt="Hotel 2">
                        </div>
                        <div class="gallery-item">
                            <img src="https://images.unsplash.com/photo-1564501049412-61c2a3083791?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                                alt="Hotel 3">
                        </div>
                        <div class="gallery-item">
                            <img src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                                alt="Hotel 4">
                        </div>
                    </div>
                    <div class="gallery-row">
                        <div class="gallery-item">
                            <img src="https://images.unsplash.com/photo-1535827841776-24afc1e255ac?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                                alt="Hotel 5">
                        </div>
                        <div class="gallery-item">
                            <img src="https://images.unsplash.com/photo-1578683010236-d716f9a3f461?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                                alt="Hotel 6">
                        </div>
                        <div class="gallery-item">
                            <img src="https://images.unsplash.com/photo-1568084680786-a84f91d1153c?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                                alt="Hotel 7">
                        </div>
                        <div class="gallery-item">
                            <img src="https://images.unsplash.com/photo-1522798514-97ceb8c4f1c8?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
                                alt="Hotel 8">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Section -->

    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>Hotel Go</h3>
                    <p style="color: var(--medium-gray);">Platform pemesanan hotel premium untuk pengalaman menginap
                        yang tak terlupakan.</p>
                </div>
                <div class="footer-column">
                    <h3>Navigasi</h3>
                    <ul>
                        <li><a href="#home">Beranda</a></li>
                        <li><a href="#hotels">Hotel</a></li>
                        <li><a href="#about">Tentang Kami</a></li>
                        <li><a href="#contact">Kontak</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Layanan</h3>
                    <ul>
                        <li><a href="#">Pemesanan Hotel</a></li>
                        <li><a href="#">Paket Wisata</a></li>
                        <li><a href="#">Transportasi</a></li>
                        <li><a href="#">Layanan Kamar</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Kontak</h3>
                    <ul>
                        <li>Jl. DI Panjaitan No.128, Jawa Tengah</li>
                        <li>info@hotelgo.com</li>
                        <li>+628122819998</li>
                        <li>Buka 24/7</li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                &copy; 2025 Hotel Go. All rights reserved.
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Hamburger menu toggle
            const hamburger = document.querySelector('.hamburger');
            const navLinks = document.querySelector('.nav-links');

            if (hamburger && navLinks) {
                hamburger.addEventListener('click', function() {
                    navLinks.classList.toggle('active');
                    hamburger.classList.toggle('active');
                });
            }

            // Add animation to cards
            const cards = document.querySelectorAll('.card');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, {
                threshold: 0.1
            });

            cards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(card);
            });
        });

        function bookRoom(roomId) {
            alert(`Kamar berhasil dipesan! ID Kamar: ${roomId}\n\nTerima kasih telah memilih LuxuryStay.`);
        }
    </script>
</body>

</html>
