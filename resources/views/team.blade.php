@extends('layouts.app')

@section('title', 'Our Team | Satya Architects')

@section('content')
@php
  $leaders = [
    [
      'name' => 'Aarav Mehta',
      'role' => 'Founder & Principal Architect',
      'bio' => 'Leads strategy and design direction across urban, commercial, and experiential projects with a focus on resilient, context-aware architecture.',
      'image' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=800&auto=format&fit=crop',
    ],
    [
      'name' => 'Diya Kapoor',
      'role' => 'Design Director',
      'bio' => 'Drives concept development and interior narratives, aligning materiality, lighting, and user journeys for hospitality and workplace programs.',
      'image' => 'https://images.unsplash.com/photo-1544723795-3fb6469f5b39?w=800&auto=format&fit=crop',
    ],
    [
      'name' => 'Karan Sethi',
      'role' => 'Head of Urban Planning',
      'bio' => 'Oversees large-scale masterplans, integrating mobility, landscape, and sustainability frameworks across multi-phased developments.',
      'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=800&auto=format&fit=crop',
    ],
    [
      'name' => 'Meera Balasubramaniam',
      'role' => 'Projects & Delivery Lead',
      'bio' => 'Champions execution excellence, coordinating consultants, budgets, and build sequencing to uphold design intent on every site.',
      'image' => 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?w=800&auto=format&fit=crop',
    ],
  ];

  $teamGallery = [
    'https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?w=1200&auto=format&fit=crop',
    'https://images.unsplash.com/photo-1529333166433-0410f2b3c2ce?w=1200&auto=format&fit=crop',
    'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=1200&auto=format&fit=crop',
    'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=1200&auto=format&fit=crop',
    'https://images.unsplash.com/photo-1497366754035-f200968a6e72?w=1200&auto=format&fit=crop',
  ];
@endphp

<section class="pt-32 pb-24 bg-slate-50 text-slate-900">
  <div class="container mx-auto px-6">
    <div class="text-center">
      <h1 class="text-center font-semibold tracking-[0.18em] uppercase text-3xl md:text-3xl font-railway text-slate-900 mb-12 border-b-2 border-brand-gold inline-block pb-2">
        Our Team
      </h1>
      <p class="max-w-3xl mx-auto text-sm md:text-base text-slate-600">
        A multidisciplinary leadership group steering architecture, interiors, masterplanning, and delivery with a studio-first mindset.
      </p>
    </div>

    {{-- Leadership Headshots --}}
    <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8">
      @foreach ($leaders as $leader)
        <button type="button"
          class="group relative w-full overflow-hidden rounded-2xl shadow-md hover:shadow-xl transition"
          data-leader
          data-index="{{ $loop->index }}"
          data-name="{{ $leader['name'] }}"
          data-role="{{ $leader['role'] }}"
          data-bio="{{ $leader['bio'] }}"
          data-image="{{ $leader['image'] }}">
          <img src="{{ $leader['image'] }}" alt="{{ $leader['name'] }}"
            class="h-64 w-full object-cover transition duration-500 group-hover:scale-105">
          <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
          <div class="absolute bottom-0 inset-x-0 p-4 text-left">
            {{-- <p class="text-xs uppercase tracking-[0.2em] text-white/80">Leadership</p> --}}
            <p class="text-lg font-semibold text-white leading-tight">{{ $leader['name'] }}</p>
            <p class="text-sm text-white/80">{{ $leader['role'] }}</p>
          </div>
        </button>
      @endforeach
    </div>

    {{-- Meet the Team Carousel --}}
    <div class="mt-16 md:mt-20">
      <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
        <div>
          <h2 class="text-xl md:text-2xl font-semibold text-slate-900">Meet the Team</h2>
          <p class="text-sm text-slate-600 max-w-2xl">Snapshots from our studio floor, site visits, and collaboration sessions that power our work.</p>
        </div>
        <div class="flex items-center gap-3">
          <button type="button" id="carousel-prev"
            class="h-10 w-10 rounded-full border border-slate-300 bg-white text-slate-700 hover:bg-slate-100 transition flex items-center justify-center">
            <i class="fas fa-chevron-left"></i>
          </button>
          <button type="button" id="carousel-next"
            class="h-10 w-10 rounded-full border border-slate-300 bg-white text-slate-700 hover:bg-slate-100 transition flex items-center justify-center">
            <i class="fas fa-chevron-right"></i>
          </button>
        </div>
      </div>

      <div class="relative overflow-hidden rounded-2xl shadow-lg bg-white">
        <div id="team-carousel-track" class="flex transition-transform duration-500 ease-out">
          @foreach ($teamGallery as $image)
            <div class="min-w-full">
              <img src="{{ $image }}" alt="Team and office"
                class="w-full h-[320px] md:h-[420px] object-cover" loading="lazy">
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

{{-- Leadership Modal --}}
<div id="leader-modal" class="fixed inset-0 bg-black/70 hidden items-center justify-center z-50 px-4">
  <div class="relative bg-white rounded-2xl shadow-2xl overflow-visible max-w-5xl w-full grid md:grid-cols-2">
    <button type="button" id="modal-close"
      class="absolute top-3 right-3 h-9 w-9 rounded-full bg-black/5 text-slate-700 hover:bg-black/10 transition flex items-center justify-center">
      <i class="fas fa-times"></i>
    </button>
    <button type="button" id="modal-prev"
      class="hidden md:flex absolute left-0 -translate-x-1/2 top-1/2 -translate-y-1/2 h-10 w-10 rounded-full bg-white/90 text-slate-700 hover:bg-white transition items-center justify-center shadow-lg">
      <i class="fas fa-chevron-left"></i>
    </button>
    <button type="button" id="modal-next"
      class="hidden md:flex absolute right-0 translate-x-1/2 top-1/2 -translate-y-1/2 h-10 w-10 rounded-full bg-white/90 text-slate-700 hover:bg-white transition items-center justify-center shadow-lg">
      <i class="fas fa-chevron-right"></i>
    </button>
    <div class="h-64 md:h-full bg-slate-100">
      <img id="modal-image" src="" alt="Leader photo" class="h-full w-full object-cover">
    </div>
    <div class="p-6 md:p-8 flex flex-col gap-4">
      <div>
        <p class="text-xs uppercase tracking-[0.25em] text-slate-500 mb-1">Senior Leadership</p>
        <h3 id="modal-name" class="text-2xl font-semibold text-slate-900"></h3>
        <p id="modal-role" class="text-sm text-brand-gold font-semibold"></p>
      </div>
      <p id="modal-bio" class="text-sm md:text-base text-slate-700 leading-relaxed"></p>
      <div class="mt-auto pt-4 flex items-center gap-3 text-xs uppercase tracking-[0.2em] text-slate-500">
        <span class="h-px w-10 bg-slate-200"></span>
        <span>Architecture</span>
        <span>Interiors</span>
        <span>Masterplanning</span>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    // Leadership modal logic
    const modal = document.getElementById('leader-modal');
    const modalImage = document.getElementById('modal-image');
    const modalName = document.getElementById('modal-name');
    const modalRole = document.getElementById('modal-role');
    const modalBio = document.getElementById('modal-bio');
    const modalClose = document.getElementById('modal-close');
    const modalPrev = document.getElementById('modal-prev');
    const modalNext = document.getElementById('modal-next');
    const triggers = document.querySelectorAll('[data-leader]');
    const leadersData = Array.from(triggers).map(t => ({
      name: t.dataset.name,
      role: t.dataset.role,
      bio: t.dataset.bio,
      image: t.dataset.image
    }));
    let modalIndex = 0;

    const openModal = (index) => {
      modalIndex = index;
      const data = leadersData[modalIndex];
      if (!data) return;
      modalImage.src = data.image;
      modalName.textContent = data.name;
      modalRole.textContent = data.role;
      modalBio.textContent = data.bio;
      modal.classList.remove('hidden');
      modal.classList.add('flex');
      document.body.classList.add('overflow-hidden');
    };

    const closeModal = () => {
      modal.classList.add('hidden');
      modal.classList.remove('flex');
      document.body.classList.remove('overflow-hidden');
    };

    triggers.forEach(trigger => {
      trigger.addEventListener('click', () => {
        const idx = parseInt(trigger.dataset.index, 10) || 0;
        openModal(idx);
      });
    });

    modalClose.addEventListener('click', closeModal);
    modal.addEventListener('click', (e) => {
      if (e.target === modal) closeModal();
    });

    const modalPrevHandler = () => openModal((modalIndex - 1 + leadersData.length) % leadersData.length);
    const modalNextHandler = () => openModal((modalIndex + 1) % leadersData.length);

    modalPrev.addEventListener('click', modalPrevHandler);
    modalNext.addEventListener('click', modalNextHandler);

    // Carousel
    const track = document.getElementById('team-carousel-track');
    const slides = Array.from(track.children);
    const prevBtn = document.getElementById('carousel-prev');
    const nextBtn = document.getElementById('carousel-next');
    let currentIndex = 0;

    const updateCarousel = () => {
      track.style.transform = `translateX(-${currentIndex * 100}%)`;
    };

    const carouselNext = () => {
      currentIndex = (currentIndex + 1) % slides.length;
      updateCarousel();
    };

    const carouselPrev = () => {
      currentIndex = (currentIndex - 1 + slides.length) % slides.length;
      updateCarousel();
    };

    nextBtn.addEventListener('click', carouselNext);
    prevBtn.addEventListener('click', carouselPrev);
  });
</script>
@endsection
