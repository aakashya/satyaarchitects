@extends('layouts.app')

@section('title', $blog['meta_title'] ?? ($blog['title'] . ' | Satya Architects'))
@section('meta_description', $blog['meta_description'] ?? $blog['excerpt'])
@section('meta_image', $blog['image'])
@section('canonical', route('blogs.show', ['slug' => $blog['slug']]))
@section('meta_type', 'article')

@section('content')
<section class="bg-white pb-16 pt-32 md:pb-20">
  <div class="mx-auto max-w-6xl px-6 md:px-10 lg:px-12">
    <a href="{{ route('insights') }}" class="inline-flex items-center gap-2 text-xs uppercase tracking-[0.22em] text-slate-500 transition hover:text-brand-gold">
      <i class="fas fa-arrow-left text-[11px]"></i>
      <span>Back to Blogs</span>
    </a>

    <p class="mt-8 flex w-fit items-center gap-2 text-xs uppercase tracking-[0.2em] text-slate-500">
      <i class="fa-regular fa-calendar-days text-brand-gold"></i>
      <span>{{ $blog['date'] }}</span>
    </p>
    <h1 class="mt-3 font-publico text-4xl leading-tight text-brand-dark md:text-6xl">{{ $blog['title'] }}</h1>

    <div class="mt-10">
      <figure class="overflow-hidden rounded-[1.5rem] bg-slate-200 shadow-[0_24px_55px_rgba(15,23,42,0.12)]">
        <img src="{{ $blog['image'] }}" alt="{{ $blog['title'] }}" class="h-full w-full object-cover" loading="eager" decoding="async">
      </figure>
    </div>

    <article class="mt-12 w-full space-y-6 font-century text-base leading-relaxed text-slate-700 md:text-lg">
      <p class="text-lg leading-relaxed text-brand-gray md:text-xl">{{ $blog['excerpt'] }}</p>
      @foreach ($blog['body'] as $block)
        @php
          $type = is_array($block) ? ($block['type'] ?? 'paragraph') : 'paragraph';
        @endphp

        @if ($type === 'heading')
          <h2 class="pt-6 font-publico text-2xl leading-tight text-brand-dark md:text-3xl">{{ $block['text'] }}</h2>
        @elseif ($type === 'list')
          <ul class="list-disc space-y-2 pl-6">
            @foreach ($block['items'] as $item)
              <li>{{ $item }}</li>
            @endforeach
          </ul>
        @else
          <p>{{ is_array($block) ? $block['text'] : $block }}</p>
        @endif
      @endforeach
    </article>
  </div>
</section>

@if (!empty($relatedPosts))
  <section class="bg-slate-50 pb-20 pt-14 md:pb-24">
    <div class="mx-auto max-w-6xl px-6 md:px-10 lg:px-12">
      <h2 class="font-publico text-3xl text-brand-dark md:text-4xl">More from Insights</h2>
      <div class="mt-8 grid gap-7 md:grid-cols-3">
        @foreach ($relatedPosts as $item)
          <article class="group flex h-full flex-col rounded-[1.25rem] border border-slate-200 bg-white p-4">
            <a href="{{ route('blogs.show', ['slug' => $item['slug']]) }}" class="block overflow-hidden rounded-xl bg-slate-200">
              <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="h-52 w-full object-cover transition duration-500 group-hover:scale-[1.05]" loading="lazy" decoding="async">
            </a>
            <p class="mt-4 inline-flex items-center gap-2 text-xs uppercase tracking-[0.18em] text-slate-500">
              <i class="fa-regular fa-calendar-days text-brand-gold"></i>
              <span>{{ $item['date'] }}</span>
            </p>
            <h3 class="mt-2 font-century text-xl leading-snug text-slate-900">
              <a href="{{ route('blogs.show', ['slug' => $item['slug']]) }}" class="transition group-hover:text-brand-gold">
                {{ $item['title'] }}
              </a>
            </h3>
            <a href="{{ route('blogs.show', ['slug' => $item['slug']]) }}" class="mt-5 inline-block text-sm font-semibold uppercase tracking-[0.14em] text-black transition group-hover:text-brand-gold">
              Read More
            </a>
          </article>
        @endforeach
      </div>
    </div>
  </section>
@endif
@endsection
