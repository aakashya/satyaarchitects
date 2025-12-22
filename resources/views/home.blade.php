@extends('layouts.app')

@section('title', 'Satya Architects | Professional Architectural Consultancy')
@push('styles')
{{-- Google Fonts for Raleway --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;600;700&display=swap" rel="stylesheet">

<style>
  .font-raleway {
    font-family: 'Raleway', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
  }

  .font-century {
    font-family: 'Century Gothic', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
  }
</style>
@endpush
@section('content')
<!-- 1. HOME PAGE -->
<section id="home">
  <!-- Hero Section with Slideshow -->
  <div id="home-hero" class="relative h-screen w-full overflow-hidden flex items-center justify-center">
    {{-- <div class="absolute inset-0 bg-black/10 z-20"></div> --}}
    <!-- 🔹 TOP gradient just behind the header -->
    <div class="absolute inset-x-0 top-0 h-24 md:h-32
     bg-gradient-to-b from-black/60 via-black/20 to-transparent
     z-10 pointer-events-none">
    </div>


    <!-- Images from /public/images/hero/01–07 -->
    <img src="{{ asset('images/hero/n/01.jpg') }}" class="hero-slide active" alt="FORTEASIA INDUSTRIAL TOWNSHIP, ROHTAK">
    <img src="{{ asset('images/hero/n/02.jpg') }}" class="hero-slide" alt="SWARN JYOTI , GURGAON">
    <img src="{{ asset('images/hero/n/03.jpg') }}" class="hero-slide" alt="SAGA CASTLE, BHIWADI">
    <img src="{{ asset('images/hero/n/04.jpg') }}" class="hero-slide" alt="EXPERIENTIAL SCHOOL, GURGAON">
    <img src="{{ asset('images/hero/n/05.jpg') }}" class="hero-slide" alt="FOOD PARK, MEGHALAYA">
    <img src="{{ asset('images/hero/n/06.jpg') }}" class="hero-slide" alt="SHUBHANGAN, PANIPAT">
    <img src="{{ asset('images/hero/n/07.jpg') }}" class="hero-slide" alt="DWARKADISH">

    {{-- Center Tagline --}}
    <div class="absolute inset-0 flex items-center justify-center z-20 pointer-events-none">
      <p class="hero-tagline text-[10px] sm:text-xs md:text-sm lg:text-xl
            text-black font-publico text-center px-6">
        Architecture with Purpose, Designing India’s Future, One Space at a Time
      </p>
    </div>

    <!-- Bottom-left content: tags, heading, sliders -->
    <div class="absolute bottom-10 left-6 md:bottom-16 md:left-16 z-20 w-[340px] sm:w-[420px] md:w-[720px]">
      <!-- Key tags (chips) -->
      <div id="hero-tags" class="flex flex-wrap gap-2 mb-3">
        <span class="px-3 py-1 text-[10px] md:text-xs  font-semibold tracking-wide
                 bg-grey text-black rounded-full shadow-md shadow-brand-gold/40
                 border border-brand-gold backdrop-blur-sm">
          Industrial
        </span>
        <span class="px-3 py-1 text-[10px] md:text-xs font-semibold tracking-wide
                 bg-grey text-black rounded-full shadow-md shadow-brand-gold/40
                 border border-brand-gold backdrop-blur-sm">
          Residential
        </span>
      </div>

      <!-- Project name for current slide (single line) -->
      <h2 id="hero-heading" class="text-lg sm:text-xl md:text-2xl font-marcellus font-semibold text-white mb-5 drop-shadow
                 leading-tight whitespace-nowrap overflow-hidden text-ellipsis">
        FORTEASIA INDUSTRIAL TOWNSHIP, ROHTAK
      </h2>

      <!-- Sliders / Progress bars -->
      <div class="w-[260px] sm:w-[420px] md:w-[860px]">
        <div class="flex gap-3 w-full">
          <div class="h-1 flex-1 bg-white/20 rounded-full overflow-hidden hero-progress-track">
            <div class="hero-progress-inner h-full bg-white" data-index="0" style="width: 0;"></div>
          </div>
          <div class="h-1 flex-1 bg-white/20 rounded-full overflow-hidden hero-progress-track">
            <div class="hero-progress-inner h-full bg-white" data-index="1" style="width: 0;"></div>
          </div>
          <div class="h-1 flex-1 bg-white/20 rounded-full overflow-hidden hero-progress-track">
            <div class="hero-progress-inner h-full bg-white" data-index="2" style="width: 0;"></div>
          </div>
          <div class="h-1 flex-1 bg-white/20 rounded-full overflow-hidden hero-progress-track">
            <div class="hero-progress-inner h-full bg-white" data-index="3" style="width: 0;"></div>
          </div>
          <div class="h-1 flex-1 bg-white/20 rounded-full overflow-hidden hero-progress-track">
            <div class="hero-progress-inner h-full bg-white" data-index="4" style="width: 0;"></div>
          </div>
          <div class="h-1 flex-1 bg-white/20 rounded-full overflow-hidden hero-progress-track">
            <div class="hero-progress-inner h-full bg-white" data-index="5" style="width: 0;"></div>
          </div>
          <div class="h-1 flex-1 bg-white/20 rounded-full overflow-hidden hero-progress-track">
            <div class="hero-progress-inner h-full bg-white" data-index="6" style="width: 0;"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Scroll Indicator (center bottom) -->
    <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 z-20 animate-bounce text-white">
      <i class="fas fa-chevron-down text-2xl"></i>
    </div>
  </div>

  {{-- WHO WE ARE / WHAT WE DO --}}
  <section class="bg-white text-black py-20">
    <div class="container mx-auto px-6">
      <div class="grid lg:grid-cols-2 gap-12 items-center">

        {{-- LEFT: TEXT --}}
        <div class="space-y-10 max-w-2xl">
          {{-- WHO WE ARE --}}
          <div class="space-y-4">
            <h2 class="text-4xl md:text-5xl font-semibold tracking-tight text-slate-900 font-raleway">
              WHO WE ARE
            </h2>
            <p class="text-base md:text-lg leading-relaxed text-slate-700 font-century">
              Established in 2010, Satya Architects is a Gurugram-based design studio crafting
              refined Architectural and Interior Experiences. We blend creativity, precision,
              and innovation to create spaces that feel timeless, purposeful, and deeply human.
            </p>
          </div>

          {{-- Divider --}}
          <div class="h-px w-16 bg-slate-200"></div>

          {{-- WHAT WE DO --}}
          <div class="space-y-3">
            <h3 class="text-2xl md:text-5xl font-semibold text-slate-900 font-raleway">
              WHAT WE DO
            </h3>
            <p class="text-base md:text-lg leading-relaxed text-slate-700 font-century">
              We offer integrated services in Architecture, Interiors, Urban Planning,
              Landscape Design, and Project Management—delivering seamless, end-to-end
              solutions across Residential, Commercial, Industrial, Institutional,
              and Hospitality sectors.
            </p>
          </div>
        </div>

        {{-- RIGHT: IMAGE --}}
        <div class="flex justify-center lg:justify-end">
          <div class="w-full max-w-sm md:max-w-md rounded-2xl overflow-hidden shadow-lg bg-slate-50">
            <img src="{{ asset('images/pngegg.png') }}" alt="Satya Architects Studio" class="w-full h-full object-cover">
          </div>
        </div>

      </div>
    </div>
  </section>



  <!-- Timeline Slider -->
  <section class="bg-white text-black py-14">
    <div class="container mx-auto px-6">
      <div class="flex flex-col gap-6">
        {{-- Heading --}}
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4">
          <div>
            <h2 class="text-sm md:text-base uppercase tracking-[0.35em] text-brand-gold mb-2">
              Selected Work
            </h2>
            <p class="text-2xl md:text-3xl font-serif font-semibold">
              A timeline of key projects
            </p>
          </div>
          <p class="text-xs md:text-sm text-slate-400 max-w-md">
            Slide to explore a cross-section of industrial, residential and institutional work developed over the years.
          </p>
        </div>

        {{-- Timeline Track --}}
        <div class="relative">
          <div id="timeline-track" class="flex gap-6 overflow-hidden pb-4">
            {{-- Card 1 --}}
            <div class="relative min-w-[230px] sm:min-w-[260px] lg:min-w-[400px]">
              <div class="group relative overflow-hidden rounded-xl">
                <img src="{{ asset('images/slider/dhoot.jpeg') }}" alt="Industrial Campus – Gurgaon"
                  class="w-full h-72 sm:h-80 lg:h-[220px] object-cover group-hover:scale-[1.03] transition duration-500" />

                {{-- Hover dialog --}}
                <div class="pointer-events-none absolute left-1/2 -translate-x-1/2 -top-3 -translate-y-full
                            opacity-0 group-hover:opacity-100 group-hover:-translate-y-[115%]
                            transition duration-300 ease-out z-30">
                  <div class="bg-white text-slate-900 text-xs sm:text-sm rounded-xl shadow-2xl shadow-black/40
                              border border-brand-gold/70 px-4 py-3 min-w-[220px]">
                    <div class="text-[10px] uppercase tracking-[0.22em] text-slate-500 mb-1">
                      2014 · Gurgaon, Haryana
                    </div>
                    <div class="font-semibold whitespace-nowrap overflow-hidden text-ellipsis mb-1">
                      Industrial Campus – Gurgaon
                    </div>
                    <div class="text-[11px] text-slate-600">
                      Industrial · Masterplanning
                    </div>
                  </div>
                </div>
              </div>
            </div>

            {{-- Card 2 --}}
            <div class="relative min-w-[230px] sm:min-w-[260px] lg:min-w-[400px]">
              <div class="group relative overflow-hidden rounded-xl">
                <img src="{{ asset('images/slider/forteasia.png') }}" alt="Riverfront Residences – Panipat"
                  class="w-full h-72 sm:h-80 lg:h-[220px] object-cover group-hover:scale-[1.03] transition duration-500" />

                <div class="pointer-events-none absolute left-1/2 -translate-x-1/2 -top-3 -translate-y-full
                            opacity-0 group-hover:opacity-100 group-hover:-translate-y-[115%]
                            transition duration-300 ease-out z-30">
                  <div class="bg-white text-slate-900 text-xs sm:text-sm rounded-xl shadow-2xl shadow-black/40
                              border border-brand-gold/70 px-4 py-3 min-w-[220px]">
                    <div class="text-[10px] uppercase tracking-[0.22em] text-slate-500 mb-1">
                      2016 · Panipat, Haryana
                    </div>
                    <div class="font-semibold whitespace-nowrap overflow-hidden text-ellipsis mb-1">
                      Riverfront Residences – Panipat
                    </div>
                    <div class="text-[11px] text-slate-600">
                      Residential · Group Housing
                    </div>
                  </div>
                </div>
              </div>
            </div>

            {{-- Card 3 --}}
            <div class="relative min-w-[230px] sm:min-w-[260px] lg:min-w-[400px]">
              <div class="group relative overflow-hidden rounded-xl ">
                <img src="{{ asset('images/slider/hub.png') }}" alt="Urban Commercial Plaza – Bhiwadi"
                  class="w-full h-72 sm:h-80 lg:h-[220px] object-cover group-hover:scale-[1.03] transition duration-500" />

                <div class="pointer-events-none absolute left-1/2 -translate-x-1/2 -top-3 -translate-y-full
                            opacity-0 group-hover:opacity-100 group-hover:-translate-y-[115%]
                            transition duration-300 ease-out z-30">
                  <div class="bg-white text-slate-900 text-xs sm:text-sm rounded-xl shadow-2xl shadow-black/40
                              border border-brand-gold/70 px-4 py-3 min-w-[220px]">
                    <div class="text-[10px] uppercase tracking-[0.22em] text-slate-500 mb-1">
                      2018 · Bhiwadi, Rajasthan
                    </div>
                    <div class="font-semibold whitespace-nowrap overflow-hidden text-ellipsis mb-1">
                      Urban Commercial Plaza – Bhiwadi
                    </div>
                    <div class="text-[11px] text-slate-600">
                      Retail · Commercial
                    </div>
                  </div>
                </div>
              </div>
            </div>

            {{-- Card 4 --}}
            <div class="relative min-w-[230px] sm:min-w-[260px] lg:min-w-[400px]">
              <div class="group relative overflow-hidden rounded-xl ">
                <img src="{{ asset('images/slider/sports.png') }}" alt="Experiential Learning Campus – Gurgaon"
                  class="w-full h-72 sm:h-80 lg:h-[220px] object-cover group-hover:scale-[1.03] transition duration-500" />

                <div class="pointer-events-none absolute left-1/2 -translate-x-1/2 -top-3 -translate-y-full
                            opacity-0 group-hover:opacity-100 group-hover:-translate-y-[115%]
                            transition duration-300 ease-out z-30">
                  <div class="bg-white text-slate-900 text-xs sm:text-sm rounded-xl shadow-2xl shadow-black/40
                              border border-brand-gold/70 px-4 py-3 min-w-[220px]">
                    <div class="text-[10px] uppercase tracking-[0.22em] text-slate-500 mb-1">
                      2020 · Gurgaon, Haryana
                    </div>
                    <div class="font-semibold whitespace-nowrap overflow-hidden text-ellipsis mb-1">
                      Experiential Learning Campus – Gurgaon
                    </div>
                    <div class="text-[11px] text-slate-600">
                      Institutional · Education
                    </div>
                  </div>
                </div>
              </div>
            </div>

            {{-- Card 5 --}}
            <div class="relative min-w-[230px] sm:min-w-[260px] lg:min-w-[400px]">
              <div class="group relative overflow-hidden rounded-xl ">
                <img src="{{ asset('images/slider/workkplace.png') }}" alt="Logistics & Warehousing Park – NCR"
                  class="w-full h-72 sm:h-80 lg:h-[220px] object-cover group-hover:scale-[1.03] transition duration-500" />

                <div class="pointer-events-none absolute left-1/2 -translate-x-1/2 -top-3 -translate-y-full
                            opacity-0 group-hover:opacity-100 group-hover:-translate-y-[115%]
                            transition duration-300 ease-out z-30">
                  <div class="bg-white text-slate-900 text-xs sm:text-sm rounded-xl shadow-2xl shadow-black/40
                              border border-brand-gold/70 px-4 py-3 min-w-[220px]">
                    <div class="text-[10px] uppercase tracking-[0.22em] text-slate-500 mb-1">
                      2022 · NCR Region, India
                    </div>
                    <div class="font-semibold whitespace-nowrap overflow-hidden text-ellipsis mb-1">
                      Logistics &amp; Warehousing Park – NCR
                    </div>
                    <div class="text-[11px] text-slate-600">
                      Industrial · Warehousing
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

        {{-- Range Slider --}}
        <div class="mt-2">
          <input id="timeline-range" type="range" min="0" max="100" value="0" step="1" class="w-full timeline-range">
        </div>
      </div>
    </div>
  </section>

  {{-- ===========================
  OUR APPROACH (after slider)
  ============================ --}}
  <section class="bg-white text-slate-900 py-16 border-t border-slate-100">
    <div class="container mx-auto px-6">
      <div class="max-w-3xl">
        <h3 class="text-xs md:text-sm uppercase tracking-[0.35em] text-slate-500 mb-3" style="font-family: 'Raleway', sans-serif;">
          Our Approach
        </h3>
        <p class="text-base md:text-lg leading-relaxed text-slate-700" style="font-family: 'Century Gothic', sans-serif;">
          Every project begins with an idea and evolves through collaboration. We focus on clarity, functionality, and
          elegance, supported by advanced technology and meticulous attention to detail. The result: design that
          elevates everyday living and stands the test of time.
        </p>
      </div>
    </div>
  </section>

  <!-- Project Statistics -->
  <div id="stats-section" class="relative py-24 bg-slate-900 text-white overflow-hidden">
    <div class="pointer-events-none absolute inset-0">
      <div class="absolute -top-24 -left-24 w-72 h-72 rounded-full bg-brand-gold/10 blur-3xl"></div>
      <div class="absolute bottom-0 right-0 w-80 h-80 rounded-full bg-cyan-500/10 blur-3xl"></div>
    </div>

    <div class="container mx-auto px-6 relative">
      <div class="text-center mb-14">
        <h2 class="text-sm md:text-base uppercase tracking-[0.35em] text-brand-gold mb-3">
          Project Snapshot
        </h2>
        <p class="text-3xl md:text-4xl font-serif font-bold">
          Over <span class="text-brand-gold">90+</span> spaces designed with purpose
        </p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        {{-- Group Housing --}}
        <div
          class="group relative bg-white/5 border border-white/10 rounded-2xl p-6 backdrop-blur hover:bg-white/10 hover:-translate-y-1 hover:shadow-2xl hover:shadow-brand-gold/20 transition duration-300">
          <div class="flex items-center justify-between mb-4">
            <span class="text-xs uppercase tracking-[0.2em] text-slate-300">Completed</span>
            <span class="inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.25em] text-brand-gold">
              <i class="fas fa-building text-sm"></i> Group Housing
            </span>
          </div>
          <div class="text-5xl font-bold mb-1">20</div>
          <p class="text-xs text-slate-300 uppercase tracking-[0.25em]">Projects</p>
        </div>

        {{-- Residential --}}
        <div
          class="group relative bg-white/5 border border-white/10 rounded-2xl p-6 backdrop-blur hover:bg-white/10 hover:-translate-y-1 hover:shadow-2xl hover:shadow-brand-gold/20 transition duration-300">
          <div class="flex items-center justify-between mb-4">
            <span class="text-xs uppercase tracking-[0.2em] text-slate-300">Spaces</span>
            <span class="inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.25em] text-brand-gold">
              <i class="fas fa-home text-sm"></i> Residential
            </span>
          </div>
          <div class="text-5xl font-bold mb-1">12</div>
          <p class="text-xs text-slate-300 uppercase tracking-[0.25em]">Projects</p>
        </div>

        {{-- Commercial --}}
        <div
          class="group relative bg-white/5 border border-white/10 rounded-2xl p-6 backdrop-blur hover:bg-white/10 hover:-translate-y-1 hover:shadow-2xl hover:shadow-brand-gold/20 transition duration-300">
          <div class="flex items-center justify-between mb-4">
            <span class="text-xs uppercase tracking-[0.2em] text-slate-300">Retail & Offices</span>
            <span class="inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.25em] text-brand-gold">
              <i class="fas fa-store text-sm"></i> Commercial
            </span>
          </div>
          <div class="text-5xl font-bold mb-1">10</div>
          <p class="text-xs text-slate-300 uppercase tracking-[0.25em]">Projects</p>
        </div>

        {{-- Institutional --}}
        <div
          class="group relative bg-white/5 border border-white/10 rounded-2xl p-6 backdrop-blur hover:bg-white/10 hover:-translate-y-1 hover:shadow-2xl hover:shadow-brand-gold/20 transition duration-300">
          <div class="flex items-center justify-between mb-4">
            <span class="text-xs uppercase tracking-[0.2em] text-slate-300">Education & Public</span>
            <span class="inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.25em] text-brand-gold">
              <i class="fas fa-university text-sm"></i> Institutional
            </span>
          </div>
          <div class="text-5xl font-bold mb-1">15</div>
          <p class="text-xs text-slate-300 uppercase tracking-[0.25em]">Projects</p>
        </div>

        {{-- Hotel --}}
        <div
          class="group relative bg-white/5 border border-white/10 rounded-2xl p-6 backdrop-blur hover:bg-white/10 hover:-translate-y-1 hover:shadow-2xl hover:shadow-brand-gold/20 transition duration-300">
          <div class="flex items-center justify-between mb-4">
            <span class="text-xs uppercase tracking-[0.2em] text-slate-300">Hospitality</span>
            <span class="inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.25em] text-brand-gold">
              <i class="fas fa-hotel text-sm"></i> Hotel
            </span>
          </div>
          <div class="text-5xl font-bold mb-1">7</div>
          <p class="text-xs text-slate-300 uppercase tracking-[0.25em]">Projects</p>
        </div>

        {{-- Office --}}
        <div
          class="group relative bg-white/5 border border-white/10 rounded-2xl p-6 backdrop-blur hover:bg-white/10 hover:-translate-y-1 hover:shadow-2xl hover:shadow-brand-gold/20 transition duration-300">
          <div class="flex items-center justify-between mb-4">
            <span class="text-xs uppercase tracking-[0.2em] text-slate-300">Workspaces</span>
            <span class="inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.25em] text-brand-gold">
              <i class="fas fa-laptop text-sm"></i> Office
            </span>
          </div>
          <div class="text-5xl font-bold mb-1">6</div>
          <p class="text-xs text-slate-300 uppercase tracking-[0.25em]">Projects</p>
        </div>

        {{-- Warehouse --}}
        <div
          class="group relative bg-white/5 border border-white/10 rounded-2xl p-6 backdrop-blur hover:bg-white/10 hover:-translate-y-1 hover:shadow-2xl hover:shadow-brand-gold/20 transition duration-300">
          <div class="flex items-center justify-between mb-4">
            <span class="text-xs uppercase tracking-[0.2em] text-slate-300">Storage & Logistics</span>
            <span class="inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.25em] text-brand-gold">
              <i class="fas fa-warehouse text-sm"></i> Warehouse
            </span>
          </div>
          <div class="text-5xl font-bold mb-1">9</div>
          <p class="text-xs text-slate-300 uppercase tracking-[0.25em]">Projects</p>
        </div>

        {{-- Industries --}}
        <div
          class="group relative bg-white/5 border border-white/10 rounded-2xl p-6 backdrop-blur hover:bg-white/10 hover:-translate-y-1 hover:shadow-2xl hover:shadow-brand-gold/20 transition duration-300">
          <div class="flex items-center justify-between mb-4">
            <span class="text-xs uppercase tracking-[0.2em] text-slate-300">Industrial & Plants</span>
            <span class="inline-flex items-center gap-2 text-[11px] uppercase tracking-[0.25em] text-brand-gold">
              <i class="fas fa-industry text-sm"></i> Industries
            </span>
          </div>
          <div class="text-5xl font-bold mb-1">12</div>
          <p class="text-xs text-slate-300 uppercase tracking-[0.25em]">Projects</p>
        </div>
      </div>
    </div>
  </div>

  <!-- About Us Summary -->
  <div class="bg-slate-50 py-20">
    <div class="container mx-auto px-6">
      <div class="flex flex-col md:flex-row gap-12 items-start">
        <!-- Who Are We -->
        <div class="md:w-1/2">
          <h4 class="text-brand-gold font-bold uppercase tracking-widest text-sm mb-2">About Us</h4>
          <h2 class="text-3xl font-serif font-bold text-slate-900 mb-6">Who are we?</h2>
          <p class="text-gray-600 leading-relaxed mb-6">
            M/s Satya Architects constitute a group of keen and energetic Architects and Interior Designers. The firm has acquired experience and
            expertise to cater the requirements of varied building projects.
          </p>
          <p class="text-gray-600 leading-relaxed">
            Our organization has always tried to establish ties with friends and associates, who share our approach to professionalism and quality
            service. With this belief, we are pleased to introduce ourselves as a professional ARCHITECTURAL CONSULTANCY firm based in, Gurgaon.
          </p>
        </div>

        <!-- Why Us -->
        <div class="md:w-1/2 bg-white p-8 shadow-lg border-l-4 border-brand-gold">
          <h2 class="text-2xl font-serif font-bold text-slate-900 mb-6">Why Us?</h2>
          <ul class="space-y-6">
            <li class="flex items-start">
              <i class="fas fa-check-circle text-brand-gold mt-1 mr-4"></i>
              <div>
                <h5 class="font-bold text-slate-900">We have highly professional team</h5>
                <p class="text-gray-500 text-sm mt-1">Best location in Gurgaon, The in-house capabilities are spread over a carefully deployed
                  spectrum of professional services.</p>
              </div>
            </li>
            <li class="flex items-start">
              <i class="fas fa-check-circle text-brand-gold mt-1 mr-4"></i>
              <div>
                <h5 class="font-bold text-slate-900">We are committed</h5>
                <p class="text-gray-500 text-sm mt-1">The bio-data of key personnel and consolidated list of assignments carried out is enclosed
                  herewith for your kind consideration.</p>
              </div>
            </li>
            <li class="flex items-start">
              <i class="fas fa-check-circle text-brand-gold mt-1 mr-4"></i>
              <div>
                <h5 class="font-bold text-slate-900">We deliver best results</h5>
                <p class="text-gray-500 text-sm mt-1">The firm is making extensive use of computers in designing and detailing its projects, keeping
                  abreast with latest technological advancements.</p>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- Core Services Preview -->
  <div class="py-20 bg-slate-900 text-white">
    <div class="container mx-auto px-6">
      <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-serif font-bold mb-4">We offer wide range of designs & Services</h2>
        <p class="text-gray-400 max-w-2xl mx-auto">Our organization has always tried to establish ties with friends and associates, who share our
          approach to professionalism.</p>
      </div>

      <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Service 1 -->
        <div class="bg-slate-800 p-8 hover:bg-slate-700 transition duration-300">
          <i class="fas fa-drafting-compass text-4xl text-brand-gold mb-6"></i>
          <h3 class="text-xl font-bold mb-4">Architecture</h3>
          <p class="text-gray-400 text-sm leading-relaxed">We believe that architecture is the means through which various discrete elements of a
            constructed space is fused.</p>
        </div>
        <!-- Service 2 -->
        <div class="bg-slate-800 p-8 hover:bg-slate-700 transition duration-300">
          <i class="fas fa-tree text-4xl text-brand-gold mb-6"></i>
          <h3 class="text-xl font-bold mb-4">Landscape</h3>
          <p class="text-gray-400 text-sm leading-relaxed">A touch of nature is essential to lift the spirits. Our well-renowned landscape architects
            have mastered the art of creating.</p>
        </div>
        <!-- Service 3 -->
        <div class="bg-slate-800 p-8 hover:bg-slate-700 transition duration-300">
          <i class="fas fa-couch text-4xl text-brand-gold mb-6"></i>
          <h3 class="text-xl font-bold mb-4">Interior Design</h3>
          <p class="text-gray-400 text-sm leading-relaxed">A building is never complete without a tailor fit interior designs. Interior designs
            complement the exterior designs.</p>
        </div>
        <!-- Service 4 -->
        <div class="bg-slate-800 p-8 hover:bg-slate-700 transition duration-300">
          <i class="fas fa-tasks text-4xl text-brand-gold mb-6"></i>
          <h3 class="text-xl font-bold mb-4">Project Mgmt</h3>
          <p class="text-gray-400 text-sm leading-relaxed">Our experienced and professionally sound team undertake a planned series of activities and
            design them keeping in mind.</p>
        </div>
      </div>

      <div class="text-center mt-12">
        <a href="{{ route('services') }}"
          class="inline-block border border-brand-gold text-brand-gold px-8 py-3 uppercase tracking-widest text-sm hover:bg-brand-gold hover:text-black transition">
          View All Services
        </a>
      </div>
    </div>
  </div>
</section>

<script>
  // --- Timeline slider (range <-> horizontal scroll) ---
  const timelineTrack = document.getElementById('timeline-track');
  const timelineRange = document.getElementById('timeline-range');

  if (timelineTrack && timelineRange) {
      let maxScroll = 0;

      const recalcMaxScroll = () => {
          maxScroll = timelineTrack.scrollWidth - timelineTrack.clientWidth;
          if (maxScroll < 0) maxScroll = 0;
      };

      recalcMaxScroll();
      window.addEventListener('resize', recalcMaxScroll);

      const syncRangeToScroll = () => {
          if (maxScroll <= 0) {
              timelineRange.value = 0;
              return;
          }
          const ratio = timelineTrack.scrollLeft / maxScroll;
          timelineRange.value = Math.round(ratio * 100);
      };

      const syncScrollToRange = () => {
          const ratio = timelineRange.value / 100;
          timelineTrack.scrollLeft = maxScroll * ratio;
      };

      timelineRange.addEventListener('input', syncScrollToRange);

      // Scroll horizontally with mouse wheel when cursor is over the timeline
      timelineTrack.addEventListener(
          'wheel',
          (e) => {
              e.preventDefault(); // stop the page from scrolling vertically
              const scrollAmount = e.deltaY || e.deltaX;
              timelineTrack.scrollLeft += scrollAmount;
              syncRangeToScroll(); // keep the range slider in sync
          },
          { passive: false } // needed so preventDefault() works
      );

      syncRangeToScroll();
  }
</script>
@endsection