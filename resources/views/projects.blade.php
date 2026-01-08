@extends('layouts.app')

@section('title', 'Projects | Satya Architects')

@section('content')
<section id="projects" class="pt-32 pb-20 min-h-screen bg-slate-50">
  @php
    use Illuminate\Support\Facades\File;
    use Illuminate\Support\Str;

    $projectBase = public_path('images/projects');
    $chipTextColors = [
      '#0ea5e9',
      '#f59e0b',
      '#10b981',
      '#a855f7',
      '#f97316',
      '#ef4444',
      '#14b8a6',
    ];

    $rawCategories = collect(File::directories($projectBase))->values();
    $categories = $rawCategories->map(function ($path, $index) use ($chipTextColors) {
      $folder = basename($path);
      $label = preg_replace('/^\\d+\\.\\s*/', '', $folder);
      return [
        'label' => $label,
        'slug' => Str::slug($label),
        'folder' => $folder,
        'color' => $chipTextColors[$index % count($chipTextColors)],
      ];
    });

    $projects = collect(File::allFiles($projectBase))
      ->filter(fn($file) => in_array(strtolower($file->getExtension()), ['jpg', 'jpeg', 'png', 'webp']))
      ->map(function ($file) {
        $folder = basename($file->getPath());
        $category = preg_replace('/^\\d+\\.\\s*/', '', $folder);
        $slug = Str::slug($category);
        $filename = pathinfo($file->getFilename(), PATHINFO_FILENAME);
        [$name, $location] = array_pad(array_map('trim', explode(',', $filename, 2)), 2, '');

        return [
          'name' => $name ?: $filename,
          'location' => $location ?: $category,
          'category' => $category,
          'slug' => $slug,
          'image' => asset('images/projects/' . $folder . '/' . $file->getFilename()),
        ];
      })
      ->sortBy('name')
      ->values();
  @endphp

  <div class="container mx-auto px-6">
    <div class="text-center">
      <h1 class="text-center font-semibold tracking-[0.18em] uppercase text-3xl md:text-3xl font-railway text-slate-900 mb-12 border-b-2 border-brand-gold inline-block pb-2">Our Projects</h1>
      {{-- <p class="max-w-5xl mx-auto text-sm md:text-base text-slate-600 leading-relaxed font-century">
        Over the years, Satya Architects has delivered a diverse portfolio across various sectors. <br>
        Every project represents a dialogue between client vision and design intent—translated into spaces that respond to people, place, and time.
        This collection showcases our evolution, our expertise, and our commitment to quality at every scale.
      </p> --}}
    </div>

    <div class="max-w-4xl mx-auto mb-12">
      {{-- Original gradient chip filter (commented out) --}}
      {{-- <div class="flex flex-wrap justify-center gap-3"> ... </div> --}}

      <div class="flex flex-wrap justify-center gap-8 text-xs md:text-lg font-semibold uppercase tracking-[0.15em] font-marcellus">
        <button type="button" data-category-chip="all" data-chip-color="#cba135"
          class="chip chip-filter active pb-1 border-b-2 border-brand-gold text-slate-900"
          style="--chip-color:#cba135; color: var(--chip-color);">
          All
        </button>
        @foreach ($categories as $category)
          <button type="button" data-category-chip="{{ $category['slug'] }}" data-chip-color="{{ $category['color'] }}"
            class="chip chip-filter pb-1 border-b-2 border-transparent text-slate-700 transition-colors"
            style="--chip-color: {{ $category['color'] }}; color: var(--chip-color);">
            {{ $category['label'] }}
          </button>
        @endforeach
      </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach ($projects as $project)
        <div class="group block relative overflow-hidden shadow-md cursor-pointer"
          data-project-card data-category="{{ $project['slug'] }}">
          <img src="{{ $project['image'] }}" class="w-full h-96 object-cover transform group-hover:scale-110 transition duration-500"
            alt="{{ $project['name'] }}">
          <div
            class="pointer-events-none absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-black/80 via-black/60 to-transparent transition duration-300">
          </div>
          <div class="absolute inset-x-0 bottom-0 p-5 flex items-end justify-between gap-3">
            <div>
              {{-- <p class="text-xs uppercase tracking-[0.2em] text-white/80"
                style="text-shadow:0 10px 20px rgba(0,0,0,0.7)">{{ $project['category'] }}</p> --}}
              <h3 class="text-lg uppercase font-semibold text-white leading-tight mt-1"
                style="text-shadow:0 18px 36px rgba(0,0,0,0.7)">{{ $project['name'] }}</h3>
            </div>
            <span
              class="px-3 py-1 rounded-full text-[10px] uppercase tracking-wide bg-white/10 text-white/90 backdrop-blur-sm border border-white/15"
              style="text-shadow:0 14px 28px rgba(0,0,0,0.55)">{{ $project['location'] }}</span>
          </div>
        </div>
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

        chips.forEach(c => {
          c.classList.remove('active', 'text-slate-900');
          c.style.borderColor = 'transparent';
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
