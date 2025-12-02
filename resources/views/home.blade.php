@extends('layouts.app')

@section('title', 'Satya Architects | Professional Architectural Consultancy')

@section('content')
<!-- 1. HOME PAGE -->
<section id="home">
  <!-- Hero Section with Slideshow -->
  <div id="home-hero" class="relative h-screen w-full overflow-hidden flex items-center justify-center">
    <!-- Overlay dark gradient at bottom for readability -->
    {{-- <div class="absolute inset-0 bg-black/10 z-20"></div> --}}
    <div class="absolute inset-x-0 bottom-0 h-48 bg-gradient-to-t from-black/80 via-black/40 to-transparent z-10"></div>

    <!-- Images from /public/images/hero/01–07 -->
    <img src="{{ asset('images/hero/01.png') }}" class="hero-slide active" alt="FORTEASIA INDUSTRIAL TOWNSHIP, ROHTAK">
    <img src="{{ asset('images/hero/02.png') }}" class="hero-slide" alt="SWARN JYOTI , GURGAON">
    <img src="{{ asset('images/hero/03.png') }}" class="hero-slide" alt="SAGA CASTLE, BHIWADI">
    <img src="{{ asset('images/hero/04.png') }}" class="hero-slide" alt="EXPERIENTIAL SCHOOL, GURGAON">
    <img src="{{ asset('images/hero/05.png') }}" class="hero-slide" alt="FOOD PARK, MEGHALAYA">
    <img src="{{ asset('images/hero/06.jpg') }}" class="hero-slide" alt="SHUBHANGAN, PANIPAT">
    <img src="{{ asset('images/hero/07.jpg') }}" class="hero-slide" alt="DWARKADISH">

    <!-- Bottom-left content: tags, heading, sliders -->
    <div class="absolute bottom-10 left-6 md:bottom-16 md:left-16 z-20 w-[340px] sm:w-[420px] md:w-[720px]">
      <!-- Key tags (chips) -->
      <div id="hero-tags" class="flex flex-wrap gap-2 mb-3">
        <!-- Fallback tags, JS will override -->
        <span class="px-3 py-1 text-[10px] md:text-xs font-semibold tracking-wide
                 bg-brand-gold text-black rounded-full shadow-md shadow-brand-gold/40
                 border border-brand-gold backdrop-blur-sm">
          Industrial
        </span>
        <span class="px-3 py-1 text-[10px] md:text-xs font-semibold tracking-wide
                 bg-brand-gold text-black rounded-full shadow-md shadow-brand-gold/40
                 border border-brand-gold backdrop-blur-sm">
          Residential
        </span>
      </div>

      <!-- Project name for current slide (bigger font, single line, wider area) -->
      <h2 id="hero-heading" class="text-lg sm:text-xl md:text-2xl font-serif font-semibold text-white mb-5 drop-shadow
               leading-tight whitespace-nowrap overflow-hidden text-ellipsis">
        FORTEASIA INDUSTRIAL TOWNSHIP, ROHTAK
      </h2>

      <!-- Sliders / Progress bars: narrower than heading -->
      <div class="w-[260px] sm:w-[320px] md:w-[360px]">
        <div class="flex gap-3 w-full">
          <div class="h-1.5 flex-1 bg-white/20 rounded-full overflow-hidden hero-progress-track">
            <div class="hero-progress-inner h-full bg-brand-gold" data-index="0" style="width: 0;"></div>
          </div>
          <div class="h-1.5 flex-1 bg-white/20 rounded-full overflow-hidden hero-progress-track">
            <div class="hero-progress-inner h-full bg-brand-gold" data-index="1" style="width: 0;"></div>
          </div>
          <div class="h-1.5 flex-1 bg-white/20 rounded-full overflow-hidden hero-progress-track">
            <div class="hero-progress-inner h-full bg-brand-gold" data-index="2" style="width: 0;"></div>
          </div>
          <div class="h-1.5 flex-1 bg-white/20 rounded-full overflow-hidden hero-progress-track">
            <div class="hero-progress-inner h-full bg-brand-gold" data-index="3" style="width: 0;"></div>
          </div>
          <div class="h-1.5 flex-1 bg-white/20 rounded-full overflow-hidden hero-progress-track">
            <div class="hero-progress-inner h-full bg-brand-gold" data-index="4" style="width: 0;"></div>
          </div>
          <div class="h-1.5 flex-1 bg-white/20 rounded-full overflow-hidden hero-progress-track">
            <div class="hero-progress-inner h-full bg-brand-gold" data-index="5" style="width: 0;"></div>
          </div>
          <div class="h-1.5 flex-1 bg-white/20 rounded-full overflow-hidden hero-progress-track">
            <div class="hero-progress-inner h-full bg-brand-gold" data-index="6" style="width: 0;"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Scroll Indicator (center bottom) -->
    <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 z-20 animate-bounce text-white">
      <i class="fas fa-chevron-down text-2xl"></i>
    </div>
  </div>


  <!-- Project Statistics -->
  <div id="stats-section" class="relative py-24 bg-slate-900 text-white overflow-hidden">
    {{-- subtle glow background --}}
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
          class="inline-block border border-brand-gold text-brand-gold px-8 py-3 uppercase tracking-widest text-sm hover:bg-brand-gold hover:text-black transition">View
          All Services</a>
      </div>
    </div>
  </div>
</section>
@endsection