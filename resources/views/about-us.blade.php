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
  $imageAboutOne = asset('images/about/imgabout1.jpg');
  $imageAboutTwo = asset('images/about/imageabout2.jpg');
  $indiaMarket = asset('images/about/india-market.webp');
  $graphTwo = asset('images/about/graph2.png');
  $pieLegends = [
      ['label' => 'Automobiles', 'value' => '1783K sq.ft', 'pct' => 34.8, 'color' => '#ef3f0a'],
      ['label' => 'Warehouses', 'value' => '901K sq.ft', 'pct' => 17.6, 'color' => '#1f6ea5'],
      ['label' => 'ICD', 'value' => '799K sq.ft', 'pct' => 15.6, 'color' => '#2d9b55'],
      ['label' => 'Garments', 'value' => '473K sq.ft', 'pct' => 9.2, 'color' => '#d0a51e'],
      ['label' => 'Others', 'value' => '380K sq.ft', 'pct' => 7.4, 'color' => '#874cc7'],
      ['label' => 'Cold Storage', 'value' => '256K sq.ft', 'pct' => 5.0, 'color' => '#149d9b'],
      ['label' => 'Print/Pkg', 'value' => '242K sq.ft', 'pct' => 4.7, 'color' => '#d94b70'],
      ['label' => 'Pharma', 'value' => '135K sq.ft', 'pct' => 2.6, 'color' => '#65ad3a'],
      ['label' => 'Leather & Tannery', 'value' => '79K sq.ft', 'pct' => 1.5, 'color' => '#ba5205'],
      ['label' => 'Malt', 'value' => '70K sq.ft', 'pct' => 1.4, 'color' => '#64748b'],
  ];

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
          <p class="mt-4 font-century text-sm leading-relaxed text-brand-gray md:text-base">
            Established in 2010, a consultancy firm with extensive technical and advisory expertise. We guide, plan and design the future of the built environment.
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
        <article>
          <div class="mb-10 text-center">
            <h3 class="font-century text-3xl font-bold leading-tight text-slate-950 md:text-4xl">
              Built-up Area Distribution by Industry Sector
            </h3>
            <p class="mt-5 font-century text-sm leading-relaxed text-slate-500 md:text-lg">
              Total Built-up Area&nbsp;&nbsp;&middot;&nbsp;&nbsp;5,117,708 Sq.ft&nbsp;&nbsp;&middot;&nbsp;&nbsp;51.18 Lakh Sq.ft&nbsp;&nbsp;&middot;&nbsp;&nbsp;10 Sectors&nbsp;&nbsp;&middot;&nbsp;&nbsp;58 Projects
            </p>
            <div class="mx-auto mt-8 h-px max-w-3xl bg-slate-200"></div>
          </div>
          @php
            $cx = 380;
            $cy = 380;
            $gap = 1.35;
            $toPoint = function (float $radius, float $angle) use ($cx, $cy): array {
                $rad = deg2rad($angle - 90);
                return [$cx + ($radius * cos($rad)), $cy + ($radius * sin($rad))];
            };
            $arcPath = function (float $start, float $end, float $outerRadius, float $innerRadius) use ($toPoint): string {
                [$x1, $y1] = $toPoint($outerRadius, $start);
                [$x2, $y2] = $toPoint($outerRadius, $end);
                [$x3, $y3] = $toPoint($innerRadius, $end);
                [$x4, $y4] = $toPoint($innerRadius, $start);
                $largeArc = ($end - $start) > 180 ? 1 : 0;

                return sprintf(
                    'M %.3f %.3f A %.3f %.3f 0 %d 1 %.3f %.3f L %.3f %.3f A %.3f %.3f 0 %d 0 %.3f %.3f Z',
                    $x1,
                    $y1,
                    $outerRadius,
                    $outerRadius,
                    $largeArc,
                    $x2,
                    $y2,
                    $x3,
                    $y3,
                    $innerRadius,
                    $innerRadius,
                    $largeArc,
                    $x4,
                    $y4
                );
            };
            $chartSectors = [];
            $currentAngle = 0;
            $flipTextLabels = ['Warehouses', 'Others', 'Cold Storage', 'Print/Pkg', 'Pharma', 'Leather & Tannery', 'Malt'];

            foreach ($pieLegends as $legend) {
                $span = $legend['pct'] * 3.6;
                $start = $currentAngle + $gap;
                $end = $currentAngle + $span - $gap;

                if ($end <= $start) {
                    $start = $currentAngle + 0.35;
                    $end = $currentAngle + $span - 0.35;
                }

                $mid = ($start + $end) / 2;
                [$outerLabelX, $outerLabelY] = $toPoint(273, $mid);
                [$percentX, $percentY] = $toPoint(172, $mid);
                $textRotation = ($mid > 90 && $mid < 270) ? $mid + 180 : $mid;
                $labelRotation = $textRotation - 90;
                $percentRotation = $textRotation - 90;

                if (in_array($legend['label'], $flipTextLabels, true)) {
                    $labelRotation += 180;
                    $percentRotation += 180;
                }

                $chartSectors[] = [
                    ...$legend,
                    'outer_path' => $arcPath($start, $end, 314, 232),
                    'inner_path' => $arcPath($start, $end, 222, 124),
                    'outer_label_x' => $outerLabelX,
                    'outer_label_y' => $outerLabelY,
                    'percent_x' => $percentX,
                    'percent_y' => $percentY,
                    'label_rotation' => $labelRotation,
                    'percent_rotation' => $percentRotation,
                    'label_class' => 'builtup-radial-chart__sector-label' . ($legend['pct'] < 3 ? ' builtup-radial-chart__sector-label--small' : ''),
                    'label_line_gap' => $legend['pct'] < 3 ? 8 : 10,
                ];

                $currentAngle += $span;
            }
          @endphp
          <div class="grid items-center gap-8 lg:grid-cols-[0.55fr_1.9fr_0.55fr] lg:gap-10">
            <div class="hidden gap-4 lg:order-1 lg:grid lg:grid-cols-1">
              @foreach (array_slice($pieLegends, 0, 5) as $legend)
                <div class="flex flex-col items-center gap-2 text-center">
                  <span class="h-5 w-5 shrink-0" style="background-color: {{ $legend['color'] }}"></span>
                  <span>
                    <span class="block font-century text-xs font-semibold text-slate-900 md:text-sm">{{ $legend['label'] }}</span>
                    <span class="block font-century text-xs text-slate-500">{{ $legend['value'] }}</span>
                  </span>
                </div>
              @endforeach
            </div>
            <div class="order-1 mx-auto w-full max-w-[980px] lg:order-2">
              <svg class="builtup-radial-chart" viewBox="0 0 760 760" role="img" aria-labelledby="builtup-chart-title builtup-chart-desc">
                <title id="builtup-chart-title">Built-up area distribution by industry sector</title>
                <desc id="builtup-chart-desc">A two-ring radial chart showing total built-up area of 51.18 lakh square feet across 10 industry sectors.</desc>
                <defs>
                  <filter id="builtup-soft-shadow" x="-12%" y="-12%" width="124%" height="124%">
                    <feDropShadow dx="0" dy="12" stdDeviation="14" flood-color="#cbd5e1" flood-opacity="0.34" />
                  </filter>
                </defs>

                <circle cx="380" cy="380" r="326" fill="#f1f7fb" />

                <g filter="url(#builtup-soft-shadow)">
                  @foreach ($chartSectors as $sector)
                    <path d="{{ $sector['inner_path'] }}" fill="{{ $sector['color'] }}" opacity="0.18" stroke="#fff" stroke-width="4" />
                  @endforeach
                  @foreach ($chartSectors as $sector)
                    <path d="{{ $sector['outer_path'] }}" fill="{{ $sector['color'] }}" stroke="#fff" stroke-width="6" />
                  @endforeach
                </g>

                @foreach ($chartSectors as $sector)
                  <text
                    x="{{ $sector['outer_label_x'] }}"
                    y="{{ $sector['outer_label_y'] }}"
                    transform="rotate({{ $sector['label_rotation'] }} {{ $sector['outer_label_x'] }} {{ $sector['outer_label_y'] }})"
                    text-anchor="middle"
                    dominant-baseline="middle"
                    class="{{ $sector['label_class'] }}">
                    @foreach (explode(' ', str_replace('/', '/ ', $sector['label'])) as $wordIndex => $word)
                      <tspan x="{{ $sector['outer_label_x'] }}" dy="{{ $wordIndex === 0 ? 0 : $sector['label_line_gap'] }}">{{ $word }}</tspan>
                    @endforeach
                  </text>
                  <text
                    x="{{ $sector['percent_x'] }}"
                    y="{{ $sector['percent_y'] }}"
                    transform="rotate({{ $sector['percent_rotation'] }} {{ $sector['percent_x'] }} {{ $sector['percent_y'] }})"
                    text-anchor="middle"
                    dominant-baseline="middle"
                    fill="{{ $sector['color'] }}"
                    class="builtup-radial-chart__percent">
                    {{ number_format($sector['pct'], 1) }}%
                  </text>
                @endforeach

                <circle cx="380" cy="380" r="121" fill="#fff" stroke="#d6e6f1" stroke-width="8" />
                <circle cx="380" cy="380" r="112" fill="none" stroke="#c9ddeb" stroke-width="2" />
                <text x="380" y="344" text-anchor="middle" class="builtup-radial-chart__total">51.18</text>
                <text x="380" y="371" text-anchor="middle" class="builtup-radial-chart__unit">Lakh Sq.ft</text>
                <line x1="314" y1="392" x2="446" y2="392" stroke="#d7dee7" stroke-width="1.5" />
                <text x="380" y="416" text-anchor="middle" class="builtup-radial-chart__caption">TOTAL BUILT-UP AREA</text>
                <text x="380" y="439" text-anchor="middle" class="builtup-radial-chart__built">5,117,708 Sq.ft</text>
                <text x="380" y="463" text-anchor="middle" class="builtup-radial-chart__meta">10 Sectors&nbsp;&nbsp;&middot;&nbsp;&nbsp;58 Projects</text>
              </svg>
            </div>
            <div class="order-2 grid grid-cols-2 gap-x-6 gap-y-5 lg:hidden">
              @foreach ($pieLegends as $legend)
                <div class="flex flex-col items-center gap-2 text-center">
                  <span class="h-5 w-5 shrink-0" style="background-color: {{ $legend['color'] }}"></span>
                  <span>
                    <span class="block font-century text-xs font-semibold text-slate-900 md:text-sm">{{ $legend['label'] }}</span>
                    <span class="block font-century text-xs text-slate-500">{{ $legend['value'] }}</span>
                  </span>
                </div>
              @endforeach
            </div>
            <div class="hidden gap-4 lg:order-3 lg:grid lg:grid-cols-1">
              @foreach (array_slice($pieLegends, 5) as $legend)
                <div class="flex flex-col items-center gap-2 text-center">
                  <span class="h-5 w-5 shrink-0" style="background-color: {{ $legend['color'] }}"></span>
                  <span>
                    <span class="block font-century text-xs font-semibold text-slate-900 md:text-sm">{{ $legend['label'] }}</span>
                    <span class="block font-century text-xs text-slate-500">{{ $legend['value'] }}</span>
                  </span>
                </div>
              @endforeach
            </div>
          </div>
        </article>

        <article class="grid gap-6 lg:grid-cols-[0.42fr_0.58fr] lg:gap-10">
          <div class="flex items-center px-6 py-7 md:px-8 md:py-8">
            <div>
              <p class="font-century text-sm leading-relaxed text-brand-gray md:text-base">
                Our expertise spans planning, architecture, engineering, and design-build services across various sectors within the sustainable built environment.
              </p>
              <p class="mt-4 font-century text-sm leading-relaxed text-brand-gray md:text-base">
                We are a leading data-driven design company specialising in Architecture, Master planning, Landscape, Interior Design, and Branded Environments.
              </p>
              <p class="mt-4 font-century text-sm leading-relaxed text-brand-gray md:text-base">
                And as creative problem solvers, we're passionate about design that's tailored to the needs of the people who live, work and experience the destinations we create.
              </p>
              <p class="mt-4 font-century text-sm leading-relaxed text-brand-gray md:text-base">
                Our holistic approach integrates architecture, engineering, infrastructure engineering, urban design, regional planning, landscape design, interior design, and environmental sustainability, bridging the gap between developed and developing regions.
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
          <figure class="overflow-hidden">
            <img src="{{ $graphTwo }}" alt="Satya Architects graph" class="block h-auto w-full object-contain" loading="lazy" decoding="async">
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

  .builtup-radial-chart {
    display: block;
    width: 100%;
    height: auto;
    overflow: visible;
  }

  .builtup-radial-chart__sector-label {
    fill: #fff;
    font-family: 'Century Gothic', sans-serif;
    font-size: 9.5px;
    font-weight: 700;
    letter-spacing: 0.01em;
  }

  .builtup-radial-chart__sector-label--small {
    font-size: 7.2px;
    letter-spacing: 0;
  }

  .builtup-radial-chart__percent {
    font-family: 'Century Gothic', sans-serif;
    font-size: 13px;
    font-weight: 700;
  }

  .builtup-radial-chart__total {
    fill: #16172c;
    font-family: 'Century Gothic', sans-serif;
    font-size: 30px;
    font-weight: 800;
  }

  .builtup-radial-chart__unit {
    fill: #657084;
    font-family: 'Century Gothic', sans-serif;
    font-size: 12px;
    font-weight: 500;
  }

  .builtup-radial-chart__caption {
    fill: #9aa4b2;
    font-family: 'Century Gothic', sans-serif;
    font-size: 8px;
    font-weight: 800;
    letter-spacing: 0.06em;
  }

  .builtup-radial-chart__built {
    fill: #1f6ea5;
    font-family: 'Century Gothic', sans-serif;
    font-size: 10.5px;
    font-weight: 800;
  }

  .builtup-radial-chart__meta {
    fill: #a5adba;
    font-family: 'Century Gothic', sans-serif;
    font-size: 8px;
    font-weight: 500;
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

