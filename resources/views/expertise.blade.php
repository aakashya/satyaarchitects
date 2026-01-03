@extends('layouts.app')

@section('content')
@php
// Put images in: public/images/expertise/<filename>
  $expertiseItems = [
  [
  "title" => "Architecture and Design Consultancy",
  "desc" => "Comprehensive architectural and design services delivering functional, sustainable, and cost-effective solutions.",
  "image" => "architecture.png",
  ],
  [
  "title" => "Masterplanning and Urban Design",
  "desc" => "Holistic urban design solutions addressing growth, infrastructure, and livability. Planned with long-term vision and responsibility.",
  "image" => "masterplanning.jpg",
  ],
  [
  "title" => "Interior and Experiential Design",
  "desc" => "Tailored interior design solutions focused on comfort, efficiency, and brand expression. Creating meaningful spatial experiences.",
  "image" => "interior.jpg",
  ],
  [
  "title" => "Landscape Architecture",
  "desc" => "Sustainable landscape planning enhancing environmental and visual value. Integrated seamlessly with the built environment.",
  "image" => "landscape.jpg",
  ],
  [
  "title" => "Industrial Design",
  "desc" => "Innovative industrial design services translating ideas into market-ready products. Balancing aesthetics, usability, and manufacturing
  efficiency.",
  "image" => "industrial.jpg",
  ],
  [
  "title" => "Project Management Consultancy",
  "desc" => "End-to-end project management ensuring timelines, budgets, and quality standards are met. Delivering certainty at every stage.",
  "image" => "pmc.png",
  ],
  [
  "title" => "Workplace Consultancy",
  "desc" => "Strategic workplace planning aligned with organizational goals and workforce needs. Enhancing performance through design.",
  "image" => "workplace.png",
  ],
  ];
  @endphp

  <section class="w-full py-16 md:py-24 bg-white">
    <div class="container mx-auto px-6 mt-10">

      {{-- Heading --}}
      <h1 class="text-center font-semibold tracking-[0.18em] uppercase text-3xl md:text-3xl font-railway">
        Our Expertise
      </h1>

      {{-- Intro text --}}
      <p class="mt-5 text-center text-sm md:text-lg text-gray-600 max-w-5xl mx-auto leading-relaxed font-century">
        Every project begins with an idea and evolves through collaboration. We focus on clarity,
        functionality, and elegance, supported by advanced technology and meticulous attention to detail.
        The result: design that elevates everyday living and stands the test of time.
      </p>

      {{-- Grid --}}
      <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
        @foreach ($expertiseItems as $item)
        <article class="group relative overflow-hidden shadow-lg">
          {{-- Image --}}
          <img src="{{ asset('images/expertise/' . $item['image']) }}" alt="{{ $item['title'] }}"
            class="h-auto w-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">

          {{-- Dark gradient overlay (bottom only to lift text) --}}
          <div class="pointer-events-none absolute inset-x-0 bottom-0 h-1/2 bg-gradient-to-t from-black/80 via-black/35 to-transparent"></div>

          {{-- Content overlay --}}
          <div class="absolute inset-x-0 bottom-0 p-6">
            {{-- Title (bottom by default; moves up on hover) --}}
            <h3 class="text-white uppercase text-xl md:text-xl font-railway
                                   transform transition-all duration-500
                                   translate-y-0 group-hover:-translate-y-1">
              {{ $item['title'] }}
            </h3>

            {{-- Description (hidden by default; visible on hover) --}}
            <p class="mt-1 text-white/90 text-sm md:text-sm leading-relaxed font-century
                                  opacity-0 max-h-0 overflow-hidden transform transition-all duration-500
                                  translate-y-1 group-hover:opacity-100 group-hover:max-h-40 group-hover:translate-y-0">
              {{ $item['desc'] }}
            </p>
          </div>

          {{-- (Optional) subtle border on hover --}}
          <div class="absolute inset-0 rounded-2xl ring-1 ring-white/10 transition group-hover:ring-white/30"></div>
        </article>
        @endforeach
      </div>

    </div>
  </section>
  @endsection
