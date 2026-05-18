@extends('layouts.app')

@section('title', 'About Us | Satya Architects')
@section('meta_description', 'SATYA ARCHITECTS is a multi-disciplinary, independently-owned collaborative design practice delivering planning, architecture, engineering, and design-build services.')
@section('meta_image', asset('images/about/india-market.webp'))
@section('canonical', route('about-us'))

@section('content')
@php
  $aboutGalleryPath = public_path('images/about/new');
  $aboutGalleryItems = [];
  $projectProposalOne = asset('images/about/project_proposal1.jpg');
  $projectProposalTwo = asset('images/about/project_proposal2.png');
  $imageAboutOne = asset('images/about/imgabout1.jpg');
  $imageAboutTwo = asset('images/about/imageabout2.jpg');
  $indiaMarket = asset('images/about/india-market.webp');
  $imageRemaining = asset('images/about/image.jpg');

  if (\Illuminate\Support\Facades\File::exists($aboutGalleryPath)) {
      $aboutGalleryItems = collect(\Illuminate\Support\Facades\File::files($aboutGalleryPath))
          ->filter(fn (\Symfony\Component\Finder\SplFileInfo $file) => in_array(strtolower($file->getExtension()), ['jpg', 'jpeg', 'png', 'webp'], true))
          ->sortBy(fn (\Symfony\Component\Finder\SplFileInfo $file) => $file->getFilename())
          ->values()
          ->map(function (\Symfony\Component\Finder\SplFileInfo $file, int $index) {
              return [
                  'src' => asset('images/about/new/' . $file->getFilename()),
                  'alt' => 'About us gallery image ' . ($index + 1),
              ];
          })
          ->all();
  }
@endphp

<section class="bg-white pb-20 pt-32 md:pb-24">
  <div class="mx-auto mt-10 mb-14 max-w-[1480px] px-6 md:mt-12 md:mb-16 md:px-10 lg:mt-14 lg:mb-20 lg:px-12">
    <div class="overflow-hidden bg-white">
      <div class="grid items-stretch lg:grid-cols-[1.15fr_0.85fr]">
        <figure class="mx-auto w-[84%] self-center md:w-[82%] lg:w-[80%]">
          <img src="{{ $indiaMarket }}" alt="India market" class="block h-auto w-full object-contain" loading="lazy" decoding="async">
        </figure>
        <div class="px-8 py-10 text-brand-dark md:px-12 md:py-14 lg:px-16 lg:py-16">
          <h1 class="font-publico text-4xl leading-tight md:text-5xl lg:text-6xl">About Us</h1>
          <p class="mt-8 font-century text-base leading-relaxed text-brand-gray md:text-xl">
            Satya Architects, a Leading Architecture &amp; Interior Design Firm, believe architecture should do more than occupy space-it should inspire, perform, and endure. Every project is approached with clarity of thought, contextual understanding, and attention to detail.
          </p>
        </div>
      </div>
    </div>
  </div>

  @if (!empty($aboutGalleryItems))
    <div class="mt-10 px-6 md:px-10 lg:px-12">
      <div class="about-accordion">
        @foreach ($aboutGalleryItems as $index => $item)
          @php
            $itemCount = count($aboutGalleryItems);
            $isLeftExpand = $index < 2;
            $isRightExpand = $index >= ($itemCount - 2);
            $isCenterExpand = !$isLeftExpand && !$isRightExpand;
          @endphp
          <figure
            class="about-accordion__item {{ $isRightExpand ? 'about-accordion__item--reverse' : '' }} {{ $isCenterExpand ? 'about-accordion__item--center' : '' }}"
            style="--item-index: {{ $index }}; --item-count: {{ count($aboutGalleryItems) }};">
            <img src="{{ $item['src'] }}" alt="{{ $item['alt'] }}" class="about-accordion__image" loading="lazy" decoding="async">
          </figure>
        @endforeach
      </div>
    </div>
  @endif

  @php
    $studioCultureRows = [
      [
        'label' => 'Insights & Research',
        'title' => 'Design Driven by Clarity & Collaboration',
        'copy' => 'Our studio thrives on thoughtful collaboration, refined design thinking, and technical precision. Every project evolves through research, dialogue, and attention to detail—resulting in spaces that are timeless, functional, and deeply contextualized.',
      ],
      [
        'label' => 'Services',
        'title' => 'From Vision to Built Reality',
        'copy' => 'We follow an integrated and collaborative approach that balances creativity with execution. From Architecture Consultancy to project management consultancy, every stage is carefully coordinated to ensure clarity, efficiency, and exceptional design quality',
      ],
      [
        'label' => 'Contact Us',
        'title' => 'Let us do the hard work',
        'copy' => 'a multidisciplinary team of architects, interior designers, and planners committed to delivering innovative architectural designs across residential, commercial, industrial, hospitality, and institutional sectors.',
      ],
    ];
  @endphp

  <section class="mt-14 bg-[#ececec] py-12 md:py-16 lg:py-20">
    <div class="mx-auto max-w-[1480px] px-6 md:px-10 lg:px-12">
      <div class="grid gap-10 lg:grid-cols-[0.25fr_0.75fr] lg:gap-14">
        <div>
          <h2 class="font-publico text-4xl leading-[0.95] text-black md:text-5xl">STUDIO<br>CULTURE</h2>
        </div>
        <div class="border-t border-slate-300">
          @foreach ($studioCultureRows as $row)
            <article class="studio-culture-row grid gap-6 border-b border-slate-300 py-9 md:py-12 lg:grid-cols-[90px_1fr_340px] lg:gap-12">
              <p class="studio-culture-label">{{ $row['label'] }}</p>
              <h3 class="studio-culture-title">{{ $row['title'] }}</h3>
              <p class="studio-culture-copy">{{ $row['copy'] }}</p>
            </article>
          @endforeach
        </div>
      </div>
    </div>
  </section>

  <div class="mx-auto mt-16 max-w-5xl px-6 md:px-10">
    <article>
      <p class="font-century text-base leading-relaxed text-brand-gray md:text-lg">
        Our expertise spans planning, architecture, engineering, and design-build services across various sectors within the sustainable built environment.
      </p>
      <figure class="mt-6 w-full overflow-hidden md:w-1/2">
        <img src="{{ $projectProposalOne }}" alt="Project proposal 1" class="block h-auto w-full object-cover" loading="lazy" decoding="async">
      </figure>
    </article>

    <article class="mt-14">
      <p class="font-century text-base leading-relaxed text-brand-gray md:text-lg">
        Established in 2010, a consultancy firm with extensive technical and advisory expertise. We guide, plan and design the future of the built environment.
      </p>
      <div class="mt-6 grid w-full gap-6 md:w-1/2">
        <figure class="overflow-hidden">
          <img src="{{ $imageAboutOne }}" alt="Image About 1" class="block h-[16rem] w-full object-cover md:h-[19rem]" loading="lazy" decoding="async">
        </figure>
        <figure class="overflow-hidden">
          <img src="{{ $imageAboutTwo }}" alt="Image About 2" class="block h-[16rem] w-full object-cover md:h-[19rem]" loading="lazy" decoding="async">
        </figure>
      </div>
    </article>

    <article class="mt-14">
      <p class="font-century text-base leading-relaxed text-brand-gray md:text-lg">
        We are a leading data-driven design company specialising in Architecture, Master planning, Landscape, Interior Design, and Branded Environments.
      </p>
      <figure class="mt-6 overflow-hidden">
        <img src="{{ $projectProposalTwo }}" alt="Project proposal 2" class="block h-auto w-full object-cover" loading="lazy" decoding="async">
      </figure>
    </article>

    <article class="mt-14">
      <p class="font-century text-base leading-relaxed text-brand-gray md:text-lg">
        And as creative problem solvers, we're passionate about design that's tailored to the needs of the people who live, work and experience the destinations we create.
      </p>
      <figure class="mt-6 overflow-hidden">
        <img src="{{ $indiaMarket }}" alt="India market outlook" class="block h-auto w-full object-cover" loading="lazy" decoding="async">
      </figure>
    </article>

    <article class="mt-14">
      <p class="font-century text-base leading-relaxed text-brand-gray md:text-lg">
        Our holistic approach integrates architecture, engineering, infrastructure engineering, urban design, regional planning, landscape design, interior design, and environmental sustainability, bridging the gap between developed and developing regions.
      </p>
      <figure class="mt-6 overflow-hidden">
        <img src="{{ $imageRemaining }}" alt="About image remaining" class="block h-auto w-full object-cover" loading="lazy" decoding="async">
      </figure>
    </article>
  </div>
</section>

@push('styles')
<style>
  .about-accordion {
    position: relative;
    width: 100%;
    height: 36rem;
    overflow: hidden;
    background: transparent;
  }

  .about-accordion__item {
    position: absolute;
    inset-block: 0;
    left: calc((100% / var(--item-count)) * var(--item-index));
    width: calc(100% / var(--item-count));
    overflow: hidden;
    border-right: 2px solid rgba(255, 255, 255, 0.55);
    transition: width 420ms ease, transform 420ms ease;
    z-index: 1;
  }

  .about-accordion__item--reverse {
    left: auto;
    right: calc((100% / var(--item-count)) * (var(--item-count) - var(--item-index) - 1));
  }

  .about-accordion__image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
  }

  @media (hover: hover) and (pointer: fine) {
    .about-accordion .about-accordion__item:hover {
      width: calc((100% / var(--item-count)) * 3);
      z-index: 20;
    }

    .about-accordion .about-accordion__item--center:hover {
      transform: translateX(calc(-100% / 3));
    }
  }

  .studio-culture-label {
    font-family: 'Century Gothic', sans-serif;
    color: #334155;
    font-size: 1.2rem;
    line-height: 1;
    writing-mode: vertical-rl;
    transform: rotate(180deg);
    letter-spacing: 0.02em;
    text-align: end;
  }

  .studio-culture-title {
    font-family: 'Publico', 'Playfair Display', serif;
    color: #0c4b3d;
    font-size: clamp(2rem, 3.5vw, 3.4rem);
    line-height: 1.06;
  }

  .studio-culture-copy {
    font-family: 'Century Gothic', sans-serif;
    color: #1f2937;
    font-size: clamp(1.02rem, 1.4vw, 1.1rem);
    line-height: 1.42;
  }

  @media (max-width: 767px) {
    .about-accordion {
      height: 24rem;
      display: flex;
      position: static;
      overflow-x: auto;
      scroll-snap-type: x mandatory;
      -webkit-overflow-scrolling: touch;
      background: transparent;
      gap: 0.4rem;
    }

    .about-accordion__item {
      position: static;
      inset-block: auto;
      left: auto;
      width: auto;
      border-right: 0;
      flex: 0 0 72%;
      scroll-snap-align: start;
    }

    .studio-culture-label {
      writing-mode: horizontal-tb;
      transform: none;
      font-size: 0.9rem;
      text-transform: uppercase;
      letter-spacing: 0.16em;
    }
  }
</style>
@endpush
@endsection
