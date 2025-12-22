<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Satya Architects | Professional Architectural Consultancy')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap"
        rel="stylesheet">

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
        /* Timeline range base track */
        .timeline-range {
            -webkit-appearance: none;
            appearance: none;
            width: 100%;
            height: 4px;
            border-radius: 9999px;
            background: linear-gradient(to right, rgba(148, 163, 184, 0.5), rgba(15, 23, 42, 0.9));
            outline: none;
        }

        /* WebKit (Chrome, Edge, Safari) thumb */
        .timeline-range::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            border-radius: 9999px;
            background: #d4af37;
            /* your brand gold hex here if different */
            border: 2px solid #020617;
            /* near-slate-950 */
            box-shadow: 0 0 0 4px rgba(212, 175, 55, 0.25);
            cursor: pointer;
        }

        /* Firefox thumb */
        .timeline-range::-moz-range-thumb {
            width: 20px;
            height: 20px;
            border-radius: 9999px;
            background: #d4af37;
            border: 2px solid #020617;
            box-shadow: 0 0 0 4px rgba(212, 175, 55, 0.25);
            cursor: pointer;
        }

        /* Firefox track */
        .timeline-range::-moz-range-track {
            height: 4px;
            border-radius: 9999px;
            background: linear-gradient(to right, rgba(148, 163, 184, 0.5), rgba(15, 23, 42, 0.9));
        }

        /* Focus style */
        .timeline-range:focus-visible {
            outline: none;
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.5);
        }

        /* Smooth fade for hero images */
        /* Base hero slide (you may already have something similar) */
        .hero-slide {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;

            opacity: 0;
            transition: opacity 700ms ease-out;

            /* Start slightly zoomed in */
            transform: scale(1.08);
        }

        /* Active slide: fade in + zoom out */
        .hero-slide.active {
            opacity: 1;
            animation: heroZoomOut 8s ease-out forwards;
        }

        /* Keyframes for zoom-out effect */
        @keyframes heroZoomOut {
            from {
                transform: scale(1.12);
            }

            to {
                transform: scale(1);
            }
        }
    </style>
    {{-- keep this so pages can still push extra CSS --}}
    @stack('styles')
    <style>
        /* 1. Register the local font */
        @font-face {
            font-family: 'MarcellusSC';
            src: url('{{ asset(' font/marcellus-regular.ttf') }}') format('truetype');
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }

        /* 2. Utility class for all headers that should use Marcellus */
        .font-marcellus {
            font-family: 'MarcellusSC';
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        @font-face {
            font-family: 'PublicoText';
            src: url('{{ asset(' font/publico-text-web-regular.ttf') }}') format('truetype');
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }

        .font-publico {
            font-family: 'PublicoText';
        }

        @font-face {
            font-family: 'Railway';
            src: url('{{ asset(' font/railway.ttf') }}') format('truetype');
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }

        .font-railway {
            font-family: 'Railway';
        }
    </style>
    <style>
        .hero-tagline {
            text-shadow:
                0 0 8px rgba(0, 0, 0, 0.9),
                0 0 16px rgba(0, 0, 0, 0.8),
                0 0 28px rgba(0, 0, 0, 0.7);
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
    // --- Hero Image Slideshow Logic with heading + sliders ---
    const slides = document.querySelectorAll('.hero-slide');
    const heroHeading = document.getElementById('hero-heading');
    const heroTagsContainer = document.getElementById('hero-tags');
    const progressBars = document.querySelectorAll('.hero-progress-inner');
    const progressTracks = document.querySelectorAll('.hero-progress-track');

    // Data for each slide: project name + tags
    const slideMeta = [
        {
            project: 'FORTEASIA INDUSTRIAL TOWNSHIP, ROHTAK',
            tags: ['Urban Design', 'Industrial', 'Residential']
        },
        {
            project: 'SWARN JYOTI, GURGAON',
            tags: ['Housing']
        },
        {
            project: 'SAGA CASTLE, BHIWADI',
            tags: ['Commercial']
        },
        {
            project: 'EXPERIENTIAL SCHOOL, GURGAON',
            tags: ['Education']
        },
        {
            project: 'FOOD PARK, MEGHALAYA',
            tags: ['Masterplanning', 'Industry']
        },
        {
            project: 'SHUBHANGAN, PANIPAT',
            tags: ['Masterplanning', 'Residential', 'Commercial']
        },
        {
            project: 'DWARKADISH',
            tags: ['Commercial']
        }
    ];

    let currentSlide = 0;
    const slideInterval = 6000; // ms per slide
    let slideTimer = null;

    function updateHeroMeta(index) {
        const meta = slideMeta[index];
        if (!meta) return;

        // Project name heading
        if (heroHeading) {
            heroHeading.textContent = meta.project;
        }

        // Tags above heading
        if (heroTagsContainer) {
            heroTagsContainer.innerHTML = '';
            meta.tags.forEach(tag => {
                const span = document.createElement('span');
                span.className =
    'px-3 font-century py-1 text-[10px] md:text-xs tracking-wide ' +
    'bg-black/50 text-white rounded-full';

                span.textContent = tag;
                heroTagsContainer.appendChild(span);
            });
        }
    }

    function resetProgressBars(targetIndex) {
        if (!progressBars.length) return;

        progressBars.forEach((bar, index) => {
            bar.style.transition = 'none';

            if (index < targetIndex) {
                bar.style.width = '100%'; // completed slides
            } else if (index > targetIndex) {
                bar.style.width = '0%';   // future slides
            } else {
                bar.style.width = '0%';   // current slide starts from 0
            }

            // Force reflow so transition can be applied cleanly
            void bar.offsetWidth;
        });

        const currentBar = progressBars[targetIndex];
        if (currentBar) {
            currentBar.style.transition = `width ${slideInterval}ms linear`;
            currentBar.style.width = '100%';
        }
    }

    function goToSlide(index) {
        if (!slides.length) return;
        if (index < 0 || index >= slides.length) return;

        currentSlide = index;

        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === index);
        });

        updateHeroMeta(index);
        resetProgressBars(index);
    }

    function startTimer() {
        if (slideTimer) {
            clearInterval(slideTimer);
        }
        slideTimer = setInterval(() => {
            const nextIndex = (currentSlide + 1) % slides.length;
            goToSlide(nextIndex);
        }, slideInterval);
    }

    if (slides.length > 0) {
        // Init first slide and timer
        goToSlide(0);
        startTimer();
    }

    // Make progress bars clickable (use track, not inner bar)
    if (progressTracks.length > 0) {
        progressTracks.forEach((track, index) => {
            track.style.cursor = 'pointer';
            track.addEventListener('click', () => {
                goToSlide(index);
                startTimer(); // restart timer from this slide
            });
        });
    }

    // --- Navbar scroll behaviour ---
    const navbar = document.getElementById('navbar');
    const homeHero = document.getElementById('home-hero');

    function setHomeNavbar() {
        navbar.classList.add('bg-transparent', 'text-white');
        navbar.classList.remove('bg-white', 'text-slate-900', 'shadow-md');
    }

    function setSolidNavbar() {
        navbar.classList.remove('bg-transparent', 'text-white', 'py-4');
        navbar.classList.add('bg-white', 'text-slate-900', 'shadow-md', 'py-2');
    }

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

    // Explore button smooth scroll (if still present)
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