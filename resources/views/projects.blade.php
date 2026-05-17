@extends('layouts.app')

@section('title', 'Projects | Residential, Commercial & Industrial Work - Satya Architects')
@section('meta_description', 'Explore our portfolio of residential, commercial, industrial & institutional projects across Gurgaon, Delhi, Rohtak, Noida, Sonipat & 30+ cities.')
@section('meta_image', asset('images/slider/forteasia.png'))

@section('content')
<section id="projects" class="min-h-screen bg-slate-50 pt-32 pb-20">
  <div class="container mx-auto px-6">
    <div class="text-center">
      <h1 class="mb-12 inline-block border-b-2 border-brand-gold pb-2 text-center font-publico text-4xl leading-tight uppercase text-brand-dark md:text-5xl">Our Projects</h1>
    </div>

    <div class="mx-auto mb-12 max-w-4xl">
      <div class="flex flex-wrap justify-center gap-8 font-marcellus text-sm font-semibold uppercase tracking-[0.15em] md:text-lg">
        <button type="button" data-category-chip="all" data-chip-color="#cba135"
          class="chip chip-filter active border-b-2 border-brand-gold pb-1 text-slate-900"
          style="--chip-color:#cba135; color: var(--chip-color);">
          All
        </button>
        @foreach ($categories as $category)
          <button type="button" data-category-chip="{{ $category['slug'] }}" data-chip-color="{{ $category['color'] }}"
            class="chip chip-filter border-b-2 border-transparent pb-1 text-slate-700 transition-colors"
            style="--chip-color: {{ $category['color'] }}; color: var(--chip-color);">
            {{ $category['label'] }}
          </button>
        @endforeach
      </div>
    </div>

    <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
      @foreach ($projects as $project)
        @php
          $hasDetailPage = in_array($project['project_slug'], ['dhoot-transmission-jhajjar', 'forteasia-industrial-township-rohtak'], true);
        @endphp

        @if ($hasDetailPage)
          <a href="{{ route('projects.show', ['category' => $project['category_slug'], 'project' => $project['project_slug']]) }}"
            class="group relative block overflow-hidden shadow-md"
            data-project-card data-category="{{ $project['category_slug'] }}">
            <img src="{{ $project['image'] }}" class="h-96 w-full object-cover transition duration-500 group-hover:scale-110"
              alt="{{ $project['name'] }}" loading="lazy" decoding="async">
            <div
              class="pointer-events-none absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-black/80 via-black/60 to-transparent transition duration-300">
            </div>
            <div class="absolute inset-x-0 bottom-0 flex items-end justify-between gap-3 p-5">
              <div>
                <p class="mb-2 text-[10px] uppercase tracking-[0.28em] text-brand-gold">{{ $project['category'] }}</p>
                <h2 class="mt-1 text-[17px] font-semibold uppercase leading-tight text-white"
                  style="text-shadow:0 18px 36px rgba(0,0,0,0.7)">{{ $project['name'] }}</h2>
              </div>
              <span
                class="rounded-full border border-white/15 bg-white/10 px-3 py-1 text-[10px] uppercase tracking-wide text-white/90 backdrop-blur-sm"
                style="text-shadow:0 14px 28px rgba(0,0,0,0.55)">{{ $project['location'] }}</span>
            </div>
          </a>
        @else
          <div class="group relative block cursor-default overflow-hidden shadow-md"
            data-project-card data-category="{{ $project['category_slug'] }}">
            <img src="{{ $project['image'] }}" class="h-96 w-full object-cover transition duration-500 group-hover:scale-110"
              alt="{{ $project['name'] }}" loading="lazy" decoding="async">
            <div
              class="pointer-events-none absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-black/80 via-black/60 to-transparent transition duration-300">
            </div>
            <div class="absolute inset-x-0 bottom-0 flex items-end justify-between gap-3 p-5">
              <div>
                <p class="mb-2 text-[10px] uppercase tracking-[0.28em] text-brand-gold">{{ $project['category'] }}</p>
                <h2 class="mt-1 text-[17px] font-semibold uppercase leading-tight text-white"
                  style="text-shadow:0 18px 36px rgba(0,0,0,0.7)">{{ $project['name'] }}</h2>
              </div>
              <span
                class="rounded-full border border-white/15 bg-white/10 px-3 py-1 text-[10px] uppercase tracking-wide text-white/90 backdrop-blur-sm"
                style="text-shadow:0 14px 28px rgba(0,0,0,0.55)">{{ $project['location'] }}</span>
            </div>
          </div>
        @endif
      @endforeach
    </div>
  </div>
</section>

<style>
  .chip-filter {
    border-bottom: 2px solid transparent;
  }

  .chip-filter:hover {
    border-color: var(--chip-color);
  }

  .chip-filter.active {
    border-color: var(--chip-color);
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const chips = document.querySelectorAll('[data-category-chip]');
    const cards = document.querySelectorAll('[data-project-card]');

    chips.forEach((chip) => {
      chip.addEventListener('click', () => {
        const target = chip.dataset.categoryChip;

        chips.forEach((currentChip) => {
          currentChip.classList.remove('active', 'text-slate-900');
          currentChip.style.borderColor = 'transparent';
        });

        chip.classList.add('active', 'text-slate-900');
        chip.style.borderColor = chip.dataset.chipColor || '#cba135';

        cards.forEach((card) => {
          const isMatch = target === 'all' || card.dataset.category === target;
          card.classList.toggle('hidden', !isMatch);
        });
      });
    });
  });
</script>
@endsection
