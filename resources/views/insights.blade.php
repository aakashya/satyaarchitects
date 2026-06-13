@extends('layouts.app')

@section('title', 'Insights | Satya Architects')
@section('meta_description', 'Explore the Satya Architects insights publication and research document.')
@section('meta_image', asset('images/insights/Park VIews _ iii.jpg'))
@section('canonical', route('insights'))

@section('content')
@php
  $insightsVideo = asset('images/insights/6615299-hd_1920_1080_25fps.mp4');
  $blogPosts = $blogPosts ?? [];
@endphp
<script>
  if ('scrollRestoration' in history) {
    history.scrollRestoration = 'manual';
  }

  const forceInsightsTop = () => {
    window.scrollTo({ top: 0, left: 0, behavior: 'auto' });
  };

  forceInsightsTop();
  window.addEventListener('pageshow', forceInsightsTop);
  window.addEventListener('load', forceInsightsTop);
</script>

<section class="bg-white pb-20 pt-32 md:pb-24">
  <div class="mx-auto max-w-6xl px-6 md:px-10 lg:px-12">
    <h1 class="text-center font-publico text-4xl leading-tight text-brand-dark md:text-6xl">Insights</h1>
    <p class="mx-auto mt-8 max-w-4xl text-center font-century text-base leading-relaxed text-brand-gray md:text-lg">
      We guide, plan and design the future of the built environment.
    </p>
  </div>

  <div class="mx-auto mt-10 w-full px-4 md:px-8 lg:px-10">
    <div id="insights-video-shell" class="relative h-[30rem] w-full overflow-hidden rounded-[1.5rem] bg-slate-950 shadow-[0_24px_70px_rgba(15,23,42,0.18)] md:h-[42rem] lg:h-[48rem]">
      <div class="pointer-events-none absolute inset-x-0 top-0 z-10 h-28 bg-gradient-to-b from-black/65 via-black/20 to-transparent md:h-32"></div>
      <video
        id="insights-video"
        class="h-full w-full object-cover"
        autoplay
        muted
        loop
        playsinline
        preload="auto">
        <source src="{{ $insightsVideo }}" type="video/mp4">
      </video>
    </div>
  </div>
</section>

<section class="bg-white py-16 md:py-20">
  <div class="mx-auto max-w-[1750px] px-6 md:px-10 lg:px-12">
    <div class="mb-10 flex items-center justify-between gap-4">
      <h2 class="font-publico text-4xl leading-tight text-brand-dark md:text-6xl">Blogs</h2>
      <div class="flex items-center gap-4 text-red-600">
        <a href="https://www.facebook.com/SatyaArchitects/" target="_blank" rel="noreferrer" class="transition hover:text-red-700">
          <i class="fab fa-facebook-f text-lg"></i>
        </a>
        <a href="https://www.instagram.com/satya_architects_/" target="_blank" rel="noreferrer" class="transition hover:text-red-700">
          <i class="fab fa-instagram text-lg"></i>
        </a>
      </div>
    </div>

    <div class="grid gap-9 md:grid-cols-2 xl:grid-cols-4">
      @foreach ($blogPosts as $post)
        <article class="group flex h-full flex-col">
          <figure class="w-full overflow-hidden bg-white">
            <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}" class="block h-auto w-full transition duration-500 group-hover:scale-[1.03]" loading="lazy" decoding="async">
          </figure>
          <p class="mt-4 inline-flex items-center gap-2 text-[13px] uppercase tracking-[0.03em] text-slate-700">
            <i class="fa-regular fa-calendar-days text-brand-gold"></i>
            <span>{{ $post['date'] }}</span>
          </p>
          <h3 class="mt-3 font-century text-[24px] leading-tight">
            <a href="{{ route('blogs.show', ['slug' => $post['slug']]) }}" class="text-black transition hover:text-brand-gold">
              {{ $post['title'] }}
            </a>
          </h3>
          <p class="mt-4 flex-1 font-century text-[16px] leading-relaxed text-slate-700">
            {{ $post['excerpt'] }}
          </p>
          <a href="{{ route('blogs.show', ['slug' => $post['slug']]) }}" class="mt-6 inline-block font-century text-[17px] font-semibold text-black transition group-hover:text-brand-gold">
            Read More
          </a>
        </article>
      @endforeach
    </div>
  </div>
</section>

@push('styles')
<style>
  .insights-intro-lock {
    overflow: hidden;
  }

  body.insights-intro-lock {
    overflow: hidden;
  }
</style>
@endpush

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const shell = document.getElementById('insights-video-shell');
    const video = document.getElementById('insights-video');
    const navbar = document.getElementById('navbar');
    const navbarLogo = document.getElementById('navbar-logo');

    if (!shell || !video) return;

    const htmlEl = document.documentElement;
    const bodyEl = document.body;

    window.scrollTo({ top: 0, behavior: 'auto' });
    const targetRect = shell.getBoundingClientRect();
    const targetBottom = targetRect.top + targetRect.height;
    const targetLeft = Math.max(0, targetRect.left);
    const targetWidth = targetRect.width;
    const introTopLift = window.innerWidth < 768 ? 64 : 110;
    const introStartTop = -introTopLift;
    const introHeight = targetBottom + introTopLift;

    const setIntroNavbar = () => {
      if (!navbar) return;
      navbar.classList.add('bg-transparent', 'text-white');
      navbar.classList.remove('bg-white', 'text-slate-900', 'shadow-md');
      if (navbarLogo) {
        navbarLogo.src = navbarLogo.dataset.logoTransparent;
        navbarLogo.classList.add('drop-shadow-[0_0_18px_rgba(255,255,255,1)]');
      }
    };

    const setSolidNavbar = () => {
      if (!navbar) return;
      navbar.classList.remove('bg-transparent', 'text-white');
      navbar.classList.add('bg-white', 'text-slate-900', 'shadow-md');
      if (navbarLogo) {
        navbarLogo.src = navbarLogo.dataset.logoSolid;
        navbarLogo.classList.remove('drop-shadow-[0_0_18px_rgba(255,255,255,1)]');
      }
    };

    setIntroNavbar();
    htmlEl.classList.add('insights-intro-lock');
    bodyEl.classList.add('insights-intro-lock');
    shell.style.position = 'fixed';
    shell.style.top = `${introStartTop}px`;
    shell.style.left = '0px';
    shell.style.right = 'auto';
    shell.style.width = '100vw';
    shell.style.height = `${introHeight}px`;
    shell.style.marginTop = '0px';
    shell.style.borderRadius = '0px';
    shell.style.zIndex = '45';

    const animateDown = () => {
      const navHeight = navbar ? navbar.getBoundingClientRect().height : 88;
      const switchTop = navHeight - 70 ; // switch header once video top reaches just below the header
      const travelDistance = targetRect.top - introStartTop;
      const switchRatio = travelDistance > 0
        ? Math.min(1, Math.max(0, (switchTop - introStartTop) / travelDistance))
        : 1;
      const animationDuration = 900;

      const keyframes = [
        {
          top: `${introStartTop}px`,
          left: '0px',
          width: '100vw',
          height: `${introHeight}px`,
          borderRadius: '0px'
        },
        {
          top: `${targetRect.top}px`,
          left: `${targetLeft}px`,
          width: `${targetWidth}px`,
          height: `${targetRect.height}px`,
          borderRadius: '24px'
        }
      ];

      const animation = shell.animate(keyframes, {
        duration: animationDuration,
        easing: 'cubic-bezier(0.22, 0.61, 0.36, 1)',
        fill: 'forwards'
      });

      const switchDelay = Math.round(animationDuration * switchRatio);
      const switchTimer = window.setTimeout(() => {
        setSolidNavbar();
      }, switchDelay);

      animation.onfinish = () => {
        window.clearTimeout(switchTimer);
        // Remove the filled keyframe effect so final `top` doesn't keep offsetting the element in normal flow.
        animation.cancel();
        setSolidNavbar();
        shell.style.position = '';
        shell.style.top = '';
        shell.style.left = '';
        shell.style.right = '';
        shell.style.width = '';
        shell.style.height = '';
        shell.style.marginTop = '';
        shell.style.borderRadius = '';
        shell.style.zIndex = '';
        htmlEl.classList.remove('insights-intro-lock');
        bodyEl.classList.remove('insights-intro-lock');
      };
    };

    window.setTimeout(animateDown, 2000);
  });
</script>
@endpush
@endsection
