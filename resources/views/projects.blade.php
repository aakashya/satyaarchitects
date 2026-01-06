@extends('layouts.app')

@section('title', 'Projects | Satya Architects')

@section('content')
<section id="projects" class="pt-32 pb-20 min-h-screen">
  @php
    $projects = [
      [
        'name' => 'INFRA ONE TOWNSHIP',
        'type' => 'Urban Design',
        'location' => 'Rohtak',
        'image' => asset('images/hero/nn/01.jpg'),
        'url' => url('/projects/infra-one-township-rohtak'),
      ],
      [
        'name' => 'SJ HOUSING',
        'type' => 'High Rise',
        'location' => 'Gurgaon',
        'image' => asset('images/hero/nn/02.jpg'),
        'url' => url('/projects/sj-housing-gurgaon'),
      ],
      [
        'name' => 'INTERNATIONAL EXPERIENTIAL SCHOOL',
        'type' => 'Education',
        'location' => 'Gurgaon',
        'image' => asset('images/hero/nn/03.jpg'),
        'url' => url('/projects/international-experiential-school-gurgaon'),
      ],
      [
        'name' => 'FUTURISTIC THINKING',
        'type' => 'Holistic Approach',
        'location' => 'Concept',
        'image' => asset('images/hero/nn/04.jpg'),
        'url' => url('/projects/futuristic-thinking'),
      ],
      [
        'name' => 'SAGA CASTLE',
        'type' => 'Commercial',
        'location' => 'Bhiwadi',
        'image' => asset('images/hero/nn/05.jpg'),
        'url' => url('/projects/saga-castle-bhiwadi'),
      ],
      [
        'name' => 'FOOD PARK',
        'type' => 'Masterplanning',
        'location' => 'Meghalaya',
        'image' => asset('images/hero/nn/06.png'),
        'url' => url('/projects/food-park-meghalaya'),
      ],
      [
        'name' => 'SHOPPING MALL',
        'type' => 'Commercial',
        'location' => 'India',
        'image' => asset('images/hero/nn/07.jpg'),
        'url' => url('/projects/shopping-mall'),
      ],
      [
        'name' => 'SHUBHANGAN',
        'type' => 'Masterplanning',
        'location' => 'Panipat',
        'image' => asset('images/hero/nn/08.jpg'),
        'url' => url('/projects/shubhangan-panipat'),
      ],
    ];

    $projectTypes = collect($projects)->pluck('type')->unique()->values();
    $projectLocations = collect($projects)->pluck('location')->unique()->values();
  @endphp

  <div class="container mx-auto px-6">
    <div class="text-center">
      <h1 class="text-4xl font-serif font-bold text-slate-900 mb-12 border-b-2 border-brand-gold inline-block pb-2">Our Projects</h1>
    </div>

    <div class="max-w-4xl mx-auto mb-12">
      <div class="flex flex-col md:flex-row gap-4 items-center justify-center bg-white/70 backdrop-blur-lg border border-slate-200/70 rounded-2xl px-6 py-4 shadow-lg">
        <div class="flex flex-col w-full md:w-1/2">
          <label for="filter-type" class="text-xs uppercase tracking-[0.2em] text-slate-500 mb-1">Type</label>
          <select id="filter-type"
            class="w-full bg-white border border-slate-200 rounded-lg px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-brand-gold/70 focus:border-brand-gold/70 shadow-sm">
            <option value="all">All</option>
            @foreach ($projectTypes as $type)
              <option value="{{ $type }}">{{ $type }}</option>
            @endforeach
          </select>
        </div>
        <div class="flex flex-col w-full md:w-1/2">
          <label for="filter-location" class="text-xs uppercase tracking-[0.2em] text-slate-500 mb-1">Location</label>
          <select id="filter-location"
            class="w-full bg-white border border-slate-200 rounded-lg px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-brand-gold/70 focus:border-brand-gold/70 shadow-sm">
            <option value="all">All</option>
            @foreach ($projectLocations as $location)
              <option value="{{ $location }}">{{ $location }}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach ($projects as $project)
        <a href="{{ $project['url'] }}" class="group block relative overflow-hidden rounded-xl shadow-md cursor-pointer"
          data-project-card data-type="{{ $project['type'] }}" data-location="{{ $project['location'] }}">
          <img src="{{ $project['image'] }}" class="w-full h-auto object-cover transform group-hover:scale-110 transition duration-500"
            alt="{{ $project['name'] }}">
          <div
            class="pointer-events-none absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-black/80 via-black/60 to-transparent transition duration-300">
          </div>
          <div class="absolute inset-x-0 bottom-0 p-5 flex items-end justify-between gap-3">
            <div>
              <p class="text-xs uppercase tracking-[0.2em] text-white/80"
                style="text-shadow:0 10px 20px rgba(0,0,0,0.7)">{{ $project['type'] }}</p>
              <h3 class="text-xl font-semibold text-white leading-tight mt-1"
                style="text-shadow:0 18px 36px rgba(0,0,0,0.7)">{{ $project['name'] }}</h3>
            </div>
            <span
              class="px-3 py-1 rounded-full text-[11px] uppercase tracking-wide bg-white/10 text-white/90 backdrop-blur-sm border border-white/15"
              style="text-shadow:0 14px 28px rgba(0,0,0,0.55)">{{ $project['location'] }}</span>
          </div>
        </a>
      @endforeach
    </div>
  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const typeFilter = document.getElementById('filter-type');
    const locationFilter = document.getElementById('filter-location');
    const cards = document.querySelectorAll('[data-project-card]');

    function applyFilters() {
      const typeValue = typeFilter.value;
      const locationValue = locationFilter.value;

      cards.forEach((card) => {
        const matchesType = typeValue === 'all' || card.dataset.type === typeValue;
        const matchesLocation = locationValue === 'all' || card.dataset.location === locationValue;
        card.classList.toggle('hidden', !(matchesType && matchesLocation));
      });
    }

    typeFilter.addEventListener('change', applyFilters);
    locationFilter.addEventListener('change', applyFilters);
  });
</script>
@endsection
