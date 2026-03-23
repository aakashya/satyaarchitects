@extends('layouts.app')

@section('title', ($project['detail_title'] ?? $project['name']) . ' | Satya Architects')
@section('meta_description', $project['description'])
@section('meta_image', $project['image'])
@section('canonical', route('projects.show', ['category' => $project['category_slug'], 'project' => $project['project_slug']]))
@section('meta_type', 'article')

@section('content')
<section class="bg-white pt-16 lg:pt-20">
  @php
    $gallery = $project['gallery'] ?? [];
    $leadImage = $gallery[0] ?? null;
    $remainingGallery = array_slice($gallery, 1);
  @endphp

  <div class="flex flex-col lg:flex-row">
    <div class="flex w-full flex-col bg-white p-6 pt-8 md:p-12 md:pt-10 lg:w-1/2 lg:p-20 lg:pt-20">
      <div class="max-w-xl">
        <span class="mb-6 block text-sm uppercase tracking-[0.3em] text-brand-gold">{{ $project['display_category'] ?? $project['category'] }}</span>
        <h1 class="mb-12 font-publico text-4xl leading-tight text-brand-dark md:text-5xl lg:text-6xl">
          {{ $project['detail_title'] ?? $project['name'] }}
        </h1>

        <div class="mb-16 grid grid-cols-2 gap-x-8 gap-y-10">
          @foreach ($project['details'] as $label => $value)
            <div class="space-y-1">
              <h2 class="text-[10px] uppercase tracking-[0.28em] text-brand-gold">{{ $label }}</h2>
              <p class="text-sm font-medium text-brand-dark">{{ $value }}</p>
            </div>
          @endforeach
        </div>

        <div class="space-y-6">
          <h2 class="border-b border-brand-gray/10 pb-4 text-lg uppercase tracking-[0.24em] text-brand-dark">Project Overview</h2>
          <p class="text-lg leading-relaxed text-brand-gray">
            {{ $project['description'] }}
          </p>

          <div class="space-y-4 text-sm leading-relaxed text-brand-gray">
            @foreach ($project['overview'] as $paragraph)
              <p>{{ $paragraph }}</p>
            @endforeach
          </div>

          @if (!empty($project['content_sections']))
            @foreach ($project['content_sections'] as $section)
              <div class="space-y-4 pt-4">
                <h3 class="text-sm uppercase tracking-[0.24em] text-brand-dark">{{ $section['title'] }}</h3>

                @foreach ($section['paragraphs'] ?? [] as $paragraph)
                  <p class="text-sm leading-relaxed text-brand-gray">{{ $paragraph }}</p>
                @endforeach

                @if (!empty($section['items']))
                  <ul class="space-y-2 pl-5 text-sm leading-relaxed text-brand-gray">
                    @foreach ($section['items'] as $item)
                      <li class="list-disc">{{ $item }}</li>
                    @endforeach
                  </ul>
                @endif

                @if (!empty($section['closing']))
                  <p class="text-sm leading-relaxed text-brand-gray">{{ $section['closing'] }}</p>
                @endif
              </div>
            @endforeach
          @endif
        </div>

        <div class="mt-12 border-t border-brand-gray/10 pt-8">
          <a href="{{ route('projects') }}"
            class="inline-flex items-center justify-center border border-brand-gold px-8 py-3 text-xs uppercase tracking-[0.28em] text-brand-gold transition hover:bg-brand-gold hover:text-brand-dark">
            <span aria-hidden="true" class="mr-2">&larr;</span>
            Back to Projects
          </a>
        </div>
      </div>
    </div>

    <div class="w-full space-y-6 bg-slate-50 p-6 md:space-y-8 md:p-10 lg:w-1/2 lg:p-12">
      @if ($leadImage)
        <div class="bg-white shadow-xl">
          <img src="{{ $leadImage['src'] }}" alt="{{ $leadImage['alt'] }}" class="block h-auto w-full"
            loading="lazy" decoding="async">
        </div>
      @endif

      @foreach (array_chunk($remainingGallery, 3) as $group)
        @if (!empty($group[0]) || !empty($group[1]))
          <div class="grid grid-cols-1 gap-6 md:grid-cols-2 md:gap-8">
            @foreach (array_slice($group, 0, 2) as $image)
              <div class="bg-white shadow-xl">
                <img src="{{ $image['src'] }}" alt="{{ $image['alt'] }}" class="block h-auto w-full"
                  loading="lazy" decoding="async">
              </div>
            @endforeach
          </div>
        @endif

        @if (!empty($group[2]))
          <div class="bg-white shadow-xl">
            <img src="{{ $group[2]['src'] }}" alt="{{ $group[2]['alt'] }}" class="block h-auto w-full"
              loading="lazy" decoding="async">
          </div>
        @endif
      @endforeach
    </div>
  </div>
</section>

@endsection
