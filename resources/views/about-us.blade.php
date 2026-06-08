@extends('layouts.app')

@section('title', 'About Us | Satya Architects')
@section('meta_description', 'SATYA ARCHITECTS is a multi-disciplinary, independently-owned collaborative design practice delivering planning, architecture, engineering, and design-build services.')
@section('meta_image', asset('images/about/india-market.webp'))
@section('canonical', route('about-us'))

@section('content')
@php
  $aboutGalleryPath = public_path('images/about/new');
  $aboutGalleryItems = [];
  $projectProposalOne = asset('images/about/piechart.png');
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

<section class="bg-white pb-20 pt-32 md:pb-24 md:pt-36">
  <div class="mx-auto mb-12 max-w-[1480px] px-6 md:mb-14 md:px-10 lg:mb-16 lg:px-12">
    <div class="grid items-stretch gap-12 md:gap-14 lg:grid-cols-[1.2fr_0.8fr] lg:gap-20">
      <figure class="order-2 w-full self-start lg:order-1">
        <img src="{{ $indiaMarket }}" alt="India market" class="block h-[300px] w-full object-cover md:h-[380px] lg:h-[420px]" loading="lazy" decoding="async">
      </figure>
      <div class="order-1 flex items-center px-6 py-3 text-brand-dark md:px-10 lg:order-2 lg:px-12">
        <div>
          <h1 class="font-publico text-4xl leading-tight text-brand-dark md:text-5xl lg:text-6xl">About Us</h1>
          <p class="mt-6 font-century text-sm leading-relaxed text-brand-gray md:text-base">
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
        'copy' => 'Our studio thrives on thoughtful collaboration, refined design thinking, and technical precision. Every project evolves through research, dialogue, and attention to detail - resulting in spaces that are timeless, functional, and deeply contextualized.',
      ],
      [
        'label' => 'Services',
        'title' => 'From Vision to Built Reality',
        'copy' => 'We follow an integrated and collaborative approach that balances creativity with execution. From Architecture Consultancy to project management consultancy, every stage is carefully coordinated to ensure clarity, efficiency, and exceptional design quality',
      ],
      [
        'label' => 'Contact Us',
        'title' => 'Let us do the hard work',
        'copy' => 'A multidisciplinary team of architects, interior designers, and planners committed to delivering innovative architectural designs across residential, commercial, industrial, hospitality, and institutional sectors.',
      ],
    ];
  @endphp

  <section class="mt-12 bg-[#ececec] py-10 md:py-14 lg:py-16">
    <div class="mx-auto max-w-[1480px] px-6 md:px-10 lg:px-12">
      <div class="grid gap-7 lg:grid-cols-[0.23fr_0.77fr] lg:gap-10">
        <div>
          <h2 class="font-publico text-3xl leading-[0.95] text-black md:text-4xl">STUDIO<br>CULTURE</h2>
        </div>
        <div class="border-t border-slate-300">
          @foreach ($studioCultureRows as $row)
            <article class="studio-culture-row grid gap-4 border-b border-slate-300 py-7 md:py-9 lg:grid-cols-[74px_1fr_300px] lg:gap-8">
              <p class="studio-culture-label">{{ $row['label'] }}</p>
              <h3 class="studio-culture-title">{{ $row['title'] }}</h3>
              <p class="studio-culture-copy font-century">{{ $row['copy'] }}</p>
            </article>
          @endforeach
        </div>
      </div>
    </div>
  </section>

  <section class="mt-16">
    <div class="mx-auto max-w-[1480px] px-6 md:px-10 lg:px-12">
      <div class="space-y-12 md:space-y-14">
        <article class="grid gap-6 lg:grid-cols-[0.58fr_0.42fr] lg:gap-10">
          <figure class="overflow-hidden">
            <img src="{{ $projectProposalOne }}" alt="Satya Architects pie chart" class="block h-auto w-full object-contain" loading="lazy" decoding="async">
          </figure>
          <div class="flex flex-col justify-center px-6 py-7 md:px-8 md:py-8">
            <p class="font-century text-sm leading-relaxed text-brand-gray md:text-base">
              Our expertise spans planning, architecture, engineering, and design-build services across various sectors within the sustainable built environment.
            </p>
            <p class="mt-4 font-century text-sm leading-relaxed text-brand-gray md:text-base">
              Established in 2010, a consultancy firm with extensive technical and advisory expertise. We guide, plan and design the future of the built environment.
            </p>
          </div>
        </article>

        <article class="grid gap-6 lg:grid-cols-[0.42fr_0.58fr] lg:gap-10">
          <div class="flex items-center px-6 py-7 md:px-8 md:py-8">
            <div>
              <p class="font-century text-sm leading-relaxed text-brand-gray md:text-base">
                We are a leading data-driven design company specialising in Architecture, Master planning, Landscape, Interior Design, and Branded Environments.
              </p>
              <p class="mt-4 font-century text-sm leading-relaxed text-brand-gray md:text-base">
                And as creative problem solvers, we're passionate about design that's tailored to the needs of the people who live, work and experience the destinations we create.
              </p>
            </div>
          </div>
          <div class="grid w-full gap-6 md:mx-auto md:w-[82%] lg:w-[78%]">
            <figure class="overflow-hidden">
              <img src="{{ $imageAboutOne }}" alt="Image about 1" class="block h-[280px] w-full object-cover md:h-[320px]" loading="lazy" decoding="async">
            </figure>
            <figure class="overflow-hidden">
              <img src="{{ $imageAboutTwo }}" alt="Image about 2" class="block h-[280px] w-full object-cover md:h-[320px]" loading="lazy" decoding="async">
            </figure>
          </div>
        </article>

        <article class="overflow-hidden">
          <figure>
            <img src="{{ $projectProposalTwo }}" alt="Project proposal 2" class="block h-auto w-full object-contain" loading="lazy" decoding="async">
          </figure>
        </article>

        <article class="grid gap-6 lg:grid-cols-[0.45fr_0.55fr] lg:gap-10">
          <div class="flex items-center px-6 py-7 md:px-8 md:py-8">
            <p class="font-century text-sm leading-relaxed text-brand-gray md:text-base">
              Our holistic approach integrates architecture, engineering, infrastructure engineering, urban design, regional planning, landscape design, interior design, and environmental sustainability, bridging the gap between developed and developing regions.
            </p>
          </div>
          <figure class="overflow-hidden">
            <img src="{{ $imageRemaining }}" alt="About image remaining" class="block h-[320px] w-full object-cover md:h-[390px]" loading="lazy" decoding="async">
          </figure>
        </article>
      </div>
    </div>
  </section>
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
    font-size: 0.98rem;
    line-height: 1;
    writing-mode: vertical-rl;
    transform: rotate(180deg);
    letter-spacing: 0.02em;
    text-align: end;
  }

  .studio-culture-title {
    font-family: 'Publico', 'Playfair Display', serif;
    color: #0c4b3d;
    font-size: clamp(1.65rem, 2.8vw, 2.8rem);
    line-height: 1.08;
  }

  .studio-culture-copy {
    font-family: 'Century Gothic', sans-serif;
    color: #1f2937;
    font-size: clamp(0.92rem, 1.15vw, 1rem);
    line-height: 1.4;
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
      font-size: 0.82rem;
      text-transform: uppercase;
      letter-spacing: 0.16em;
    }

    .studio-culture-title {
      font-size: 1.7rem;
    }

    .studio-culture-copy {
      font-size: 0.92rem;
    }
  }
</style>
@endpush
@endsection
