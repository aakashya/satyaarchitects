@extends('layouts.app')

@section('title', 'Insights | Satya Architects')
@section('meta_description', 'Explore the Satya Architects insights publication and research document.')
@section('meta_image', asset('images/insights/Park%20VIews%20_%20iii.jpg'))
@section('canonical', route('insights'))

@section('content')
@php
  $heroImage = asset('images/insights/Park VIews _ iii.jpg');
  $pdfFile = asset('images/insights/Dissertation_REPORTT%2022.11.22%20FINAL.pdf');
@endphp

<section data-nav-hero class="relative min-h-screen overflow-hidden bg-slate-950">
  <img
    src="{{ $heroImage }}"
    alt="Insights hero image"
    class="absolute inset-0 h-full w-full object-cover object-top"
    loading="eager"
    decoding="async"
    fetchpriority="high">
</section>

<section class="bg-white px-6 py-12 md:px-10 md:py-16 lg:px-12 lg:py-20">
  <div class="mx-auto max-w-7xl">
    <div class="mb-8 flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
      <div class="max-w-3xl">
        <p class="mb-5 text-xs uppercase tracking-[0.34em] text-brand-gold">Insights</p>
        <h1 class="font-publico text-4xl leading-tight text-brand-dark md:text-6xl">
          Research and publication
        </h1>
        <p class="mt-5 text-sm leading-relaxed text-slate-600 md:text-lg">
          A focused document presentation from Satya Architects, combining visual context with the full publication below.
        </p>
      </div>

      <div class="md:text-right">
        <a
          href="{{ $pdfFile }}"
          target="_blank"
          rel="noreferrer"
          class="inline-flex items-center gap-2 text-xs uppercase tracking-[0.28em] text-brand-gold transition hover:text-brand-dark">
          <span>Open PDF</span>
          <i class="fas fa-arrow-up-right-from-square text-[11px]"></i>
        </a>
      </div>
    </div>

    <div class="overflow-hidden rounded-[1.75rem] border border-slate-200 bg-slate-50 shadow-[0_24px_70px_rgba(15,23,42,0.08)]">
      <iframe
        src="{{ $pdfFile }}#toolbar=1&navpanes=0&scrollbar=1"
        title="Satya Architects insight PDF"
        class="h-[70vh] w-full md:h-[85vh]">
      </iframe>
    </div>
  </div>
</section>
@endsection
