@extends('layouts.app')

@section('title', 'Projects | Satya Architects')

@section('content')
<section id="projects" class="pt-32 pb-20 min-h-screen bg-slate-50">
  @php
    use Illuminate\Support\Facades\File;
    use Illuminate\Support\Str;

    $projectBase = public_path('images/projects');
    $chipColors = [
      'linear-gradient(135deg,#0ea5e9,#1d4ed8)',
      'linear-gradient(135deg,#f59e0b,#d97706)',
      'linear-gradient(135deg,#10b981,#047857)',
      'linear-gradient(135deg,#a855f7,#7c3aed)',
      'linear-gradient(135deg,#f97316,#ea580c)',
      'linear-gradient(135deg,#ef4444,#b91c1c)',
      'linear-gradient(135deg,#14b8a6,#0f766e)',
    ];

    $rawCategories = collect(File::directories($projectBase))->values();
    $categories = $rawCategories->map(function ($path, $index) use ($chipColors) {
      $folder = basename($path);
      $label = preg_replace('/^\\d+\\.\\s*/', '', $folder);
      return [
        'label' => $label,
        'slug' => Str::slug($label),
        'folder' => $folder,
        'color' => $chipColors[$index % count($chipColors)],
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
    </div>

    <div class="max-w-5xl mx-auto mb-12">
      <div class="flex flex-wrap justify-center gap-3">
        <button type="button" data-category-chip="all"
          class="chip active px-4 py-2 rounded-full text-xs md:text-sm font-semibold uppercase tracking-[0.15em] text-white shadow"
          style="background: linear-gradient(135deg,#111827,#1f2937);">All</button>
        @foreach ($categories as $category)
          <button type="button" data-category-chip="{{ $category['slug'] }}"
            class="chip px-4 py-2 rounded-full text-xs md:text-sm font-semibold uppercase tracking-[0.15em] text-white shadow"
            style="background: {{ $category['color'] }};">
            {{ $category['label'] }}
          </button>
        @endforeach
      </div>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach ($projects as $project)
        <div class="group block relative overflow-hidden rounded-xl shadow-md cursor-pointer"
          data-project-card data-category="{{ $project['slug'] }}">
          <img src="{{ $project['image'] }}" class="w-full h-80 object-cover transform group-hover:scale-110 transition duration-500"
            alt="{{ $project['name'] }}">
          <div
            class="pointer-events-none absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-black/80 via-black/60 to-transparent transition duration-300">
          </div>
          <div class="absolute inset-x-0 bottom-0 p-5 flex items-end justify-between gap-3">
            <div>
              <p class="text-xs uppercase tracking-[0.2em] text-white/80"
                style="text-shadow:0 10px 20px rgba(0,0,0,0.7)">{{ $project['category'] }}</p>
              <h3 class="text-xl font-semibold text-white leading-tight mt-1"
                style="text-shadow:0 18px 36px rgba(0,0,0,0.7)">{{ $project['name'] }}</h3>
            </div>
            <span
              class="px-3 py-1 rounded-full text-[11px] uppercase tracking-wide bg-white/10 text-white/90 backdrop-blur-sm border border-white/15"
              style="text-shadow:0 14px 28px rgba(0,0,0,0.55)">{{ $project['location'] }}</span>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const chips = document.querySelectorAll('[data-category-chip]');
    const cards = document.querySelectorAll('[data-project-card]');

    chips.forEach((chip) => {
      chip.addEventListener('click', () => {
        const target = chip.dataset.categoryChip;

        chips.forEach(c => c.classList.remove('ring-2', 'ring-white/80', 'ring-offset-2', 'ring-offset-slate-50'));
        chip.classList.add('ring-2', 'ring-white/80', 'ring-offset-2', 'ring-offset-slate-50');

        cards.forEach((card) => {
          const isMatch = target === 'all' || card.dataset.category === target;
          card.classList.toggle('hidden', !isMatch);
        });
      });
    });
  });
</script>
@endsection
