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
    /* Smooth fade for hero images */
    .hero-slide {
      /* transition: opacity 1.5s ease-in-out; */
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
    'px-3 py-1 text-[10px] md:text-xs font-semibold tracking-wide ' +
    'bg-brand-gold text-black rounded-full shadow-md shadow-brand-gold/40 ' +
    'border border-brand-gold backdrop-blur-sm';

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