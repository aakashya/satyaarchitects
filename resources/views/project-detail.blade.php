@extends('layouts.app')

@section('title', ($project['detail_title'] ?? $project['name']) . ' | Satya Architects')
@section('meta_description', $project['description'])
@section('meta_image', $project['hero_image'] ?? $project['image'])
@section('canonical', route('projects.show', ['category' => $project['category_slug'], 'project' => $project['project_slug']]))
@section('meta_type', 'article')

@section('content')
@php
  $heroImage = $project['hero_image'] ?? $project['image'];
  $sectionImageSources = [];
  $heroIconMap = [
      'Location' => 'fa-location-dot',
      'Sector' => 'fa-industry',
      'Site Area' => 'fa-vector-square',
      'Built-up Area' => 'fa-building',
  ];

  foreach ($project['content_sections'] ?? [] as $section) {
      if (!empty($section['image']['src'])) {
          $sectionImageSources[] = $section['image']['src'];
      }
  }

  $galleryImages = array_values(array_filter($project['gallery'] ?? [], function ($image) use ($sectionImageSources) {
      return !in_array($image['src'], $sectionImageSources, true);
  }));
  $featuredImage = $galleryImages[0] ?? null;
  $galleryGridImages = $featuredImage ? array_slice($galleryImages, 1) : $galleryImages;
  $factsheetImage = !empty($project['factsheet_image']) ? ['src' => $project['factsheet_image'], 'alt' => ($project['detail_title'] ?? $project['name']) . ' factsheet image'] : ($galleryGridImages[0] ?? null);
  $supportingImages = $factsheetImage
      ? array_values(array_filter($galleryGridImages, fn ($image) => $image['src'] !== $factsheetImage['src']))
      : $galleryGridImages;
  $overviewParagraphs = $project['overview'] ?? [];
  $overviewLead = $overviewParagraphs[0] ?? null;
  $overviewBody = array_slice($overviewParagraphs, 1);
@endphp

<section data-nav-hero data-nav-logo-glow="off" class="relative isolate flex min-h-screen overflow-hidden bg-slate-950">
  <div class="absolute inset-x-0 top-0 z-10 h-24 bg-gradient-to-b from-black/60 via-black/20 to-transparent md:h-32"></div>
  <img src="{{ $heroImage }}" alt="{{ $project['detail_title'] ?? $project['name'] }}" class="absolute inset-0 h-full w-full object-cover" loading="eager" decoding="async" fetchpriority="high">
  <div class="absolute inset-0 bg-black/35"></div>
  <div class="absolute inset-0 bg-gradient-to-b from-black/20 via-black/30 to-black/75"></div>

  <div class="relative z-20 mx-auto flex min-h-screen w-full max-w-7xl flex-col items-center justify-center px-6 pb-32 pt-24 text-center md:px-10 md:pb-36 lg:px-12 lg:pb-44">
    <div class="max-w-5xl">
      <h1 class="font-publico text-4xl leading-tight text-white md:text-6xl lg:text-7xl xl:text-[5.25rem]">
        {{ $project['detail_title'] ?? $project['name'] }}
      </h1>

      <p class="mx-auto mt-6 max-w-3xl text-base leading-relaxed text-white/85 md:text-lg lg:text-xl">
        {{ $project['description'] }}
      </p>
    </div>

    @if (!empty($project['hero_stats']))
    <div class="absolute inset-x-0 bottom-16 px-6 md:bottom-20 md:px-10 lg:bottom-24 lg:px-12">
      <div class="mx-auto grid max-w-5xl grid-cols-2 gap-x-6 gap-y-8 lg:grid-cols-4">
        @foreach ($project['hero_stats'] as $stat)
          <div>
            <div class="mx-auto flex h-11 w-11 items-center justify-center rounded-full border border-brand-gold/60 text-brand-gold">
              <i class="fa-solid {{ $heroIconMap[$stat['label']] ?? 'fa-circle-info' }} text-sm"></i>
            </div>
            <p class="mt-4 text-[10px] uppercase tracking-[0.28em] text-brand-gold">{{ $stat['label'] }}</p>
            <p class="mt-2 text-sm leading-snug text-white md:text-[15px]">{{ $stat['value'] }}</p>
          </div>
        @endforeach
      </div>
    </div>
    @endif

    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 text-white/80">
      <i class="fas fa-chevron-down animate-bounce text-2xl"></i>
    </div>
  </div>
</section>

<section class="bg-white py-10 md:py-12">
  <div class="mx-auto max-w-5xl px-6 text-center md:px-10">
    <div class="py-4 md:py-6">
      <h2 class="mx-auto max-w-4xl font-publico text-2xl leading-tight text-brand-dark md:text-4xl">
        {{ $project['overview_heading'] ?? 'A contextual architectural response grounded in clarity, performance, and long-term usability.' }}
      </h2>
    </div>
  </div>
</section>

<section class="relative overflow-hidden bg-white py-20 md:py-24">
  <div class="absolute -left-24 top-16 h-64 w-64 rounded-full bg-brand-gold/10 blur-3xl"></div>
  <div class="absolute right-0 top-0 h-72 w-72 rounded-full bg-slate-900/5 blur-3xl"></div>

  <div class="relative mx-auto max-w-7xl px-6 md:px-10 lg:px-12">
    <div class="grid gap-12 lg:grid-cols-12 lg:items-center">
      <div class="lg:col-span-5">
        <p class="mb-4 text-xs uppercase tracking-[0.34em] text-brand-gold">Project Overview</p>
        @if ($overviewLead)
          <p class="max-w-3xl text-lg leading-relaxed text-slate-700 md:text-xl">
            {{ $overviewLead }}
          </p>
        @endif

        @if (!empty($overviewBody))
          <div class="mt-8 space-y-5">
            @foreach ($overviewBody as $paragraph)
              <p class="text-base leading-relaxed text-brand-gray md:text-lg">{{ $paragraph }}</p>
            @endforeach
          </div>
        @endif
      </div>

      @if ($featuredImage)
        <div class="lg:col-span-7">
          <figure class="overflow-hidden rounded-[2rem] bg-slate-100 shadow-[0_30px_80px_rgba(15,23,42,0.12)]">
            <img src="{{ $featuredImage['src'] }}" alt="{{ $featuredImage['alt'] }}" class="block h-auto w-full" loading="lazy" decoding="async">
          </figure>
        </div>
      @endif
    </div>
  </div>
</section>

@if ($factsheetImage)
  <section class="bg-white py-6 md:py-10">
    <div class="w-full">
      <div class="grid gap-0 lg:grid-cols-12 lg:items-stretch">
        <div class="lg:col-span-7">
          <figure class="h-[22rem] overflow-hidden bg-slate-100 shadow-[0_30px_80px_rgba(15,23,42,0.12)] md:h-[30rem] lg:h-[38rem] xl:h-[42rem]">
            <img src="{{ $factsheetImage['src'] }}" alt="{{ $factsheetImage['alt'] }}" class="block h-full w-full object-cover object-center" loading="lazy" decoding="async">
          </figure>
        </div>

        <div class="lg:col-span-5">
          <div class="flex h-full w-full items-center bg-black p-8 text-white shadow-[0_30px_80px_rgba(15,23,42,0.2)] md:p-10 lg:p-12">
            <div class="mx-auto w-full max-w-xl">
              <p class="mb-8 text-center text-xs uppercase tracking-[0.34em] text-brand-gold">Factsheet</p>
              <div class="space-y-5">
                @foreach ($project['details'] as $label => $value)
                  <div class="grid grid-cols-[120px_minmax(0,1fr)] items-start gap-4 border-t border-white/10 pt-4 md:grid-cols-[140px_minmax(0,1fr)]">
                    <p class="text-[10px] uppercase tracking-[0.28em] text-white/45">{{ $label }}</p>
                    <p class="text-sm leading-relaxed text-white md:text-right">{{ $value }}</p>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endif

@if (!empty($project['content_sections']))
  <section class="bg-white py-10 md:py-14">
    <div class="w-full">
      @foreach ($project['content_sections'] as $index => $section)
        <article class="{{ $index > 0 ? 'mt-16 md:mt-20' : '' }}">
          <div class="grid gap-10 lg:grid-cols-5 lg:gap-0 lg:items-start">
            <div class="px-6 md:px-10 lg:px-12 lg:col-span-2 {{ $index % 2 === 1 ? 'lg:order-2' : '' }}">
              @if (!empty($section['eyebrow']))
                <p class="mb-4 text-xs uppercase tracking-[0.34em] text-brand-gold">{{ $section['eyebrow'] }}</p>
              @endif

              @if (!empty($section['title']))
                <h2 class="max-w-xl font-publico text-3xl leading-tight text-brand-dark md:text-5xl">
                  {{ $section['title'] }}
                </h2>
              @endif

              <div class="mt-6 space-y-4 text-sm leading-relaxed text-brand-gray md:text-base">
                @foreach ($section['paragraphs'] ?? [] as $paragraph)
                  <p>{{ $paragraph }}</p>
                @endforeach
              </div>

              @if (!empty($section['items']))
                <ul class="mt-6 space-y-3">
                  @foreach ($section['items'] as $item)
                    <li class="flex gap-3 text-sm leading-relaxed text-brand-gray md:text-base">
                      <span class="mt-2 h-1.5 w-1.5 flex-none rounded-full bg-brand-gold"></span>
                      <span>{{ $item }}</span>
                    </li>
                  @endforeach
                </ul>
              @endif

              @if (!empty($section['closing']))
                <p class="mt-6 text-sm leading-relaxed text-brand-gray md:text-base">{{ $section['closing'] }}</p>
              @endif
            </div>

            @if (!empty($section['image']))
              <div class="lg:col-span-3 {{ $index % 2 === 1 ? 'lg:order-1' : '' }}">
                <figure class="overflow-hidden bg-slate-100 shadow-[0_30px_80px_rgba(15,23,42,0.12)]">
                  <img src="{{ $section['image']['src'] }}" alt="{{ $section['image']['alt'] }}" class="block h-auto w-full" loading="lazy" decoding="async">
                </figure>
              </div>
            @endif
          </div>
        </article>
      @endforeach
    </div>
  </section>
@endif

@if (!empty($supportingImages))
  <section class="bg-white py-16 md:py-20">
    <div class="mx-auto max-w-7xl px-6 md:px-10 lg:px-12">
      <div class="mb-10 flex flex-col gap-4 border-b border-slate-200 pb-8 md:flex-row md:items-end md:justify-between">
        <div class="max-w-2xl">
          <p class="mb-4 text-xs uppercase tracking-[0.34em] text-brand-gold">Project Gallery</p>
          <h2 class="font-publico text-3xl leading-tight text-brand-dark md:text-5xl">More views from the facility</h2>
        </div>
        <p class="max-w-md text-sm leading-relaxed text-slate-500">
          A visual sequence of the industrial facility, from large-scale planning moves to the finer spatial details that shape the working environment.
        </p>
      </div>

      <div class="relative overflow-hidden bg-slate-100 shadow-[0_24px_60px_rgba(15,23,42,0.1)]" data-project-carousel>
        @foreach ($supportingImages as $index => $image)
          <figure
            class="project-gallery-slide {{ $index === 0 ? 'is-active' : '' }}"
            data-project-slide
            aria-hidden="{{ $index === 0 ? 'false' : 'true' }}">
            <img src="{{ $image['src'] }}" alt="{{ $image['alt'] }}" class="block h-[22rem] w-full object-cover md:h-[32rem] lg:h-[44rem]" loading="lazy" decoding="async">
          </figure>
        @endforeach

        @if (count($supportingImages) > 1)
          <div class="absolute bottom-6 left-1/2 z-10 flex -translate-x-1/2 gap-2" aria-hidden="true">
            @foreach ($supportingImages as $index => $image)
              <span class="project-gallery-dot {{ $index === 0 ? 'is-active' : '' }}" data-project-dot></span>
            @endforeach
          </div>
        @endif
      </div>
    </div>
  </section>
@endif

<section class="bg-white px-6 py-16 md:px-10 md:py-20 lg:px-12">
  <div class="mx-auto max-w-2xl border border-brand-gold/40 bg-brand-gold/5 px-8 py-8 text-center md:px-10">
    <h2 class="font-publico text-2xl leading-tight text-brand-dark md:text-3xl">Return to the full project catalogue</h2>
    <p class="mx-auto mt-4 max-w-xl text-sm leading-relaxed text-slate-600 md:text-base">
      Explore more work across residential, commercial, industrial, and institutional sectors.
    </p>
    <a href="{{ route('projects') }}"
      class="mt-6 inline-flex items-center justify-center gap-2 text-xs uppercase tracking-[0.28em] text-brand-gold transition hover:text-brand-dark">
      <span aria-hidden="true">&larr;</span>
      <span>Back to Projects</span>
    </a>
  </div>
</section>

@push('styles')
<style>
  .project-gallery-slide {
    position: absolute;
    inset: 0;
    opacity: 0;
    pointer-events: none;
    transition: opacity 700ms ease;
  }

  .project-gallery-slide.is-active {
    position: relative;
    opacity: 1;
    pointer-events: auto;
  }

  .project-gallery-dot {
    width: 0.625rem;
    height: 0.625rem;
    border-radius: 9999px;
    background: rgba(255, 255, 255, 0.45);
    transition: transform 300ms ease, background-color 300ms ease, width 300ms ease;
  }

  .project-gallery-dot.is-active {
    background: #ffffff;
    width: 1.5rem;
    transform: scale(1);
  }
</style>
@endpush

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const carousel = document.querySelector('[data-project-carousel]');
    if (!carousel) return;

    const slides = carousel.querySelectorAll('[data-project-slide]');
    const dots = carousel.querySelectorAll('[data-project-dot]');

    if (slides.length <= 1) return;

    let activeIndex = 0;

    const setActiveSlide = (nextIndex) => {
      slides.forEach((slide, index) => {
        const isActive = index === nextIndex;
        slide.classList.toggle('is-active', isActive);
        slide.setAttribute('aria-hidden', isActive ? 'false' : 'true');
      });

      dots.forEach((dot, index) => {
        dot.classList.toggle('is-active', index === nextIndex);
      });

      activeIndex = nextIndex;
    };

    window.setInterval(() => {
      setActiveSlide((activeIndex + 1) % slides.length);
    }, 5000);
  });
</script>
@endpush
@endsection
