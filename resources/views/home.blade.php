@extends('layouts.app')

@section('title', 'Satya Architects | Professional Architectural Consultancy')

@section('content')
<!-- 1. HOME PAGE -->
<section id="home">
  <!-- Hero Section with Slideshow -->
  <div id="home-hero" class="relative h-screen w-full overflow-hidden flex items-center justify-center">
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/40 z-10"></div>

    <!-- Images -->
    <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=2070&auto=format&fit=crop" class="hero-slide" alt="Architecture 1">
    <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=2053&auto=format&fit=crop" class="hero-slide" alt="Architecture 2">
    <img src="https://images.unsplash.com/photo-1545558014-8692077e9b5c?q=80&w=2070&auto=format&fit=crop" class="hero-slide" alt="Architecture 3">
    <img src="https://images.unsplash.com/photo-1600210492493-0946911123ea?q=80&w=1974&auto=format&fit=crop" class="hero-slide" alt="Architecture 4">
    <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=2070&auto=format&fit=crop" class="hero-slide" alt="Architecture 5">
    <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=2069&auto=format&fit=crop" class="hero-slide" alt="Architecture 6">

    <!-- Hero Text -->
    <div class="relative z-20 text-center text-white px-4 max-w-4xl">
      <h2 class="text-sm md:text-lg uppercase tracking-[0.3em] mb-4 text-brand-gold">Est. Gurgaon</h2>
      <h1 class="text-5xl md:text-7xl font-serif font-bold mb-6 leading-tight">Designing The Future</h1>
      <p class="text-lg md:text-xl font-light text-gray-200 mb-8 max-w-2xl mx-auto">Creating sustainable and innovative spaces that inspire.</p>
      <button id="explore-btn"
        class="border border-white hover:bg-white hover:text-black transition px-8 py-3 uppercase tracking-widest text-sm">Explore</button>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 z-20 animate-bounce text-white">
      <i class="fas fa-chevron-down text-2xl"></i>
    </div>
  </div>

  <!-- Project Statistics -->
  <div id="stats-section" class="py-20 bg-white">
    <div class="container mx-auto px-6">
      <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
        <div class="p-6 border border-gray-100 hover:shadow-xl transition duration-300 group">
          <i class="fas fa-building text-3xl text-brand-gold mb-4 group-hover:scale-110 transition"></i>
          <h3 class="text-4xl font-bold text-slate-900 mb-2">20</h3>
          <p class="text-sm uppercase tracking-wider text-gray-500">Group Housing</p>
        </div>
        <div class="p-6 border border-gray-100 hover:shadow-xl transition duration-300 group">
          <i class="fas fa-home text-3xl text-brand-gold mb-4 group-hover:scale-110 transition"></i>
          <h3 class="text-4xl font-bold text-slate-900 mb-2">12</h3>
          <p class="text-sm uppercase tracking-wider text-gray-500">Residential</p>
        </div>
        <div class="p-6 border border-gray-100 hover:shadow-xl transition duration-300 group">
          <i class="fas fa-store text-3xl text-brand-gold mb-4 group-hover:scale-110 transition"></i>
          <h3 class="text-4xl font-bold text-slate-900 mb-2">10</h3>
          <p class="text-sm uppercase tracking-wider text-gray-500">Commercial</p>
        </div>
        <div class="p-6 border border-gray-100 hover:shadow-xl transition duration-300 group">
          <i class="fas fa-university text-3xl text-brand-gold mb-4 group-hover:scale-110 transition"></i>
          <h3 class="text-4xl font-bold text-slate-900 mb-2">15</h3>
          <p class="text-sm uppercase tracking-wider text-gray-500">Institutional</p>
        </div>
        <div class="p-6 border border-gray-100 hover:shadow-xl transition duration-300 group">
          <i class="fas fa-hotel text-3xl text-brand-gold mb-4 group-hover:scale-110 transition"></i>
          <h3 class="text-4xl font-bold text-slate-900 mb-2">7</h3>
          <p class="text-sm uppercase tracking-wider text-gray-500">Hotel</p>
        </div>
        <div class="p-6 border border-gray-100 hover:shadow-xl transition duration-300 group">
          <i class="fas fa-laptop text-3xl text-brand-gold mb-4 group-hover:scale-110 transition"></i>
          <h3 class="text-4xl font-bold text-slate-900 mb-2">6</h3>
          <p class="text-sm uppercase tracking-wider text-gray-500">Office</p>
        </div>
        <div class="p-6 border border-gray-100 hover:shadow-xl transition duration-300 group">
          <i class="fas fa-warehouse text-3xl text-brand-gold mb-4 group-hover:scale-110 transition"></i>
          <h3 class="text-4xl font-bold text-slate-900 mb-2">9</h3>
          <p class="text-sm uppercase tracking-wider text-gray-500">Warehouse</p>
        </div>
        <div class="p-6 border border-gray-100 hover:shadow-xl transition duration-300 group">
          <i class="fas fa-industry text-3xl text-brand-gold mb-4 group-hover:scale-110 transition"></i>
          <h3 class="text-4xl font-bold text-slate-900 mb-2">12</h3>
          <p class="text-sm uppercase tracking-wider text-gray-500">Industries</p>
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