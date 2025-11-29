<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Satya Architects | Professional Architectural Consultancy')</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    },
                    colors: {
                        brand: {
                            dark: '#0f172a',
                            gold: '#cca43b',
                            gray: '#334155'
                        }
                    }
                }
            }
        }
    </script>
    
    <style>
        /* Smooth fade for hero images */
        .hero-slide {
            transition: opacity 1.5s ease-in-out;
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }
        .hero-slide.active {
            opacity: 1;
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1; 
        }
        ::-webkit-scrollbar-thumb {
            background: #888; 
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #555; 
        }

        .fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased overflow-x-hidden">

    @include('partials.header')

    @yield('content')

    @include('partials.footer')

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Hero Image Slideshow Logic (only on home page)
            const slides = document.querySelectorAll('.hero-slide');
            if (slides.length > 0) {
                let currentSlide = 0;
                const slideInterval = 5000; // 5 seconds per image

                slides[0].classList.add('active');

                function nextSlide() {
                    slides[currentSlide].classList.remove('active');
                    currentSlide = (currentSlide + 1) % slides.length;
                    slides[currentSlide].classList.add('active');
                }

                setInterval(nextSlide, slideInterval);
            }

            const navbar = document.getElementById('navbar');
            const homeHero = document.getElementById('home-hero');

            function setHomeNavbar() {
                navbar.classList.add('bg-transparent', 'text-white', 'py-4');
                navbar.classList.remove('bg-white', 'text-slate-900', 'shadow-md', 'py-2');
            }

            function setSolidNavbar() {
                navbar.classList.remove('bg-transparent', 'text-white', 'py-4');
                navbar.classList.add('bg-white', 'text-slate-900', 'shadow-md', 'py-2');
            }

            // Navbar scroll effect only on home page
            if (homeHero) {
                setHomeNavbar();

                window.addEventListener('scroll', () => {
                    if (window.scrollY > 50) {
                        setSolidNavbar();
                    } else {
                        setHomeNavbar();
                    }
                });
            } else {
                setSolidNavbar();
            }

            // Explore button smooth scroll (home page)
            const exploreBtn = document.getElementById('explore-btn');
            const statsSection = document.getElementById('stats-section');
            if (exploreBtn && statsSection) {
                exploreBtn.addEventListener('click', function () {
                    statsSection.scrollIntoView({ behavior: 'smooth' });
                });
            }

            // Mobile menu toggle
            const mobileMenuBtn = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', function () {
                    mobileMenu.classList.toggle('hidden');
                });
            }
        });
    </script>
</body>
</html>
