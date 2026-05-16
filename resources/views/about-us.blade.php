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
  <div class="mx-auto max-w-5xl px-6 md:px-10">
    <h1 class="text-center font-publico text-4xl leading-tight text-brand-dark md:text-6xl">About Us</h1>

    <p class="mt-10 font-century text-base leading-relaxed text-brand-gray md:text-lg">
      SATYA ARCHITECTS, is a multi-disciplinary, independently-owned collaborative design practice.
    </p>
  </div>

  @if (!empty($aboutGalleryItems))
    <div class="mt-10 px-6 md:px-10 lg:px-12">
      <div class="about-accordion">
        @foreach ($aboutGalleryItems as $index => $item)
          @php
            $isReverseExpand = $index >= (count($aboutGalleryItems) - 2);
          @endphp
          <figure
            class="about-accordion__item {{ $isReverseExpand ? 'about-accordion__item--reverse' : '' }}"
            style="--item-index: {{ $index }}; --item-count: {{ count($aboutGalleryItems) }};">
            <img src="{{ $item['src'] }}" alt="{{ $item['alt'] }}" class="about-accordion__image" loading="lazy" decoding="async">
          </figure>
        @endforeach
      </div>
    </div>
  @endif

  <div class="mx-auto mt-14 max-w-5xl px-6 md:px-10">
    <article>
      <p class="font-century text-base leading-relaxed text-brand-gray md:text-lg">
        Our expertise spans planning, architecture, engineering, and design-build services across various sectors within the sustainable built environment.
      </p>
      <figure class="mx-auto mt-6 w-full max-w-3xl overflow-hidden rounded-[1.5rem] bg-slate-100 shadow-[0_20px_55px_rgba(15,23,42,0.12)]">
        <img src="{{ $projectProposalOne }}" alt="Project proposal 1" class="block h-auto w-full object-cover" loading="lazy" decoding="async">
      </figure>
    </article>

    <article class="mt-14">
      <p class="font-century text-base leading-relaxed text-brand-gray md:text-lg">
        Established in 2010, a consultancy firm with extensive technical and advisory expertise. We guide, plan and design the future of the built environment.
      </p>
      <div class="mx-auto mt-6 grid w-full max-w-4xl gap-6 md:grid-cols-2">
        <figure class="overflow-hidden rounded-[1.5rem] bg-slate-100 shadow-[0_20px_55px_rgba(15,23,42,0.12)]">
          <img src="{{ $imageAboutOne }}" alt="Image About 1" class="block h-[16rem] w-full object-cover md:h-[19rem]" loading="lazy" decoding="async">
        </figure>
        <figure class="overflow-hidden rounded-[1.5rem] bg-slate-100 shadow-[0_20px_55px_rgba(15,23,42,0.12)]">
          <img src="{{ $imageAboutTwo }}" alt="Image About 2" class="block h-[16rem] w-full object-cover md:h-[19rem]" loading="lazy" decoding="async">
        </figure>
      </div>
    </article>

    <article class="mt-14">
      <p class="font-century text-base leading-relaxed text-brand-gray md:text-lg">
        We are a leading data-driven design company specialising in Architecture, Master planning, Landscape, Interior Design, and Branded Environments.
      </p>
      <figure class="mt-6 overflow-hidden rounded-[1.5rem] bg-slate-100 shadow-[0_20px_55px_rgba(15,23,42,0.12)]">
        <img src="{{ $projectProposalTwo }}" alt="Project proposal 2" class="block h-auto w-full object-cover" loading="lazy" decoding="async">
      </figure>
    </article>

    <article class="mt-14">
      <p class="font-century text-base leading-relaxed text-brand-gray md:text-lg">
        And as creative problem solvers, we're passionate about design that's tailored to the needs of the people who live, work and experience the destinations we create.
      </p>
      <figure class="mt-6 overflow-hidden rounded-[1.5rem] bg-slate-100 shadow-[0_20px_55px_rgba(15,23,42,0.12)]">
        <img src="{{ $indiaMarket }}" alt="India market outlook" class="block h-auto w-full object-cover" loading="lazy" decoding="async">
      </figure>
    </article>

    <article class="mt-14">
      <p class="font-century text-base leading-relaxed text-brand-gray md:text-lg">
        Our holistic approach integrates architecture, engineering, infrastructure engineering, urban design, regional planning, landscape design, interior design, and environmental sustainability, bridging the gap between developed and developing regions.
      </p>
      <figure class="mt-6 overflow-hidden rounded-[1.5rem] bg-slate-100 shadow-[0_20px_55px_rgba(15,23,42,0.12)]">
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
    border-radius: 1.25rem;
    overflow: hidden;
    background: #e2e8f0;
  }

  .about-accordion__item {
    position: absolute;
    inset-block: 0;
    left: calc((100% / var(--item-count)) * var(--item-index));
    width: calc(100% / var(--item-count));
    overflow: hidden;
    border-right: 1px solid rgba(255, 255, 255, 0.55);
    transition: width 420ms ease;
    box-shadow: 0 18px 42px rgba(15, 23, 42, 0.16);
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
      border-radius: 1rem;
    }
  }
</style>
@endpush
@endsection
