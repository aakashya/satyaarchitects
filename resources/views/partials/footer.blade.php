<footer class="bg-black text-white border-t border-white/10">
  <div class="container mx-auto px-6">

    @php
    $links = [
    ['label' => 'Our Story', 'route' => 'home'],
    ['label' => 'Expertise', 'route' => 'expertise'],
    ['label' => 'Team', 'route' => 'team'],
    ['label' => 'Projects', 'route' => 'projects'],
    ['label' => 'Insights', 'route' => 'clients'],
    ['label' => 'Contact Us', 'route' => 'about'],
    ];

    // shared hover feel (blue hover, slightly premium)
    $blueTextHover = "transition-all duration-200 hover:text-sky-400 hover:translate-x-1";
    @endphp

    {{-- 4 Column Footer --}}
    <div class="py-14 grid gap-12 md:grid-cols-2 lg:grid-cols-4">

      {{-- 1) Brand --}}
      <div class="space-y-5">
        <img src="{{ asset('images/logo/logo2.png') }}" alt="Satya Architects" class="h-16 w-auto object-contain" />
        <p class="text-sm leading-relaxed text-white/70 max-w-sm">
          A multidisciplinary studio shaping refined architecture, interiors, and masterplans — built with clarity,
          craft, and timeless intent.
        </p>
        {{-- <p class="text-xs text-white/45">Typically replies within 24 hours.</p> --}}
      </div>

      {{-- 2) Visit --}}
      <div class="space-y-5">
        <h4 class="text-xs tracking-[0.32em] uppercase text-white/50">Visit</h4>

        <p class="text-sm leading-relaxed text-white/70">
          80-01, Emaar The Palm Square<br>
          Golf Course Extension Road, Sector 66<br>
          Gurugram, Haryana, 122102
        </p>

        <div class="space-y-3 text-sm">
          <a href="tel:9717676052" class="group flex items-center gap-3 text-white/70 transition">
            <span class="h-9 w-9 rounded-full border border-white/10 bg-white/5 flex items-center justify-center
                         transition group-hover:border-sky-400/50 group-hover:bg-sky-400/10">
              <i class="fas fa-phone text-[13px] text-white/70 transition group-hover:text-sky-400"></i>
            </span>
            <span class="tracking-wide transition group-hover:text-sky-400">+91 9717676052</span>
          </a>

          {{-- <a href="tel:9810757750" class="group flex items-center gap-3 text-white/70 transition">
            <span class="h-9 w-9 rounded-full border border-white/10 bg-white/5 flex items-center justify-center
                         transition group-hover:border-sky-400/50 group-hover:bg-sky-400/10">
              <i class="fas fa-mobile-alt text-[14px] text-white/70 transition group-hover:text-sky-400"></i>
            </span>
            <span class="tracking-wide transition group-hover:text-sky-400">9810757750</span>
          </a> --}}

          <a href="mailto:info@satyaarchitects.com" class="group flex items-center gap-3 text-white/70 transition">
            <span class="h-9 w-9 rounded-full border border-white/10 bg-white/5 flex items-center justify-center
                         transition group-hover:border-sky-400/50 group-hover:bg-sky-400/10">
              <i class="fas fa-envelope text-[13px] text-white/70 transition group-hover:text-sky-400"></i>
            </span>
            <span class="tracking-wide transition group-hover:text-sky-400">info@satyaarchitects.com</span>
          </a>
        </div>
      </div>

      {{-- 3) Navigation --}}
      <div class="space-y-5">
        <h4 class="text-xs tracking-[0.32em] uppercase text-white/50">Navigation</h4>

        {{-- one column --}}
        <nav class="flex flex-col gap-3 text-sm">
          @foreach($links as $link)
          <a href="{{ route($link['route']) }}" class="text-white/70 {{ $blueTextHover }}">
            {{ $link['label'] }}
          </a>
          @endforeach
        </nav>
      </div>

      {{-- 4) Connect --}}
      <div class="space-y-5">
        <h4 class="text-xs tracking-[0.32em] uppercase text-white/50">Connect</h4>

        <p class="text-sm text-white/60">Follow us on social media</p>

        <div class="flex items-center gap-3">
          <a href="https://www.instagram.com" target="_blank" rel="noreferrer" class="h-11 w-11 flex items-center justify-center rounded-full border border-white/10 bg-white/5
                    transition-all duration-200 hover:border-sky-400/60 hover:bg-sky-400/10 hover:text-sky-400">
            <i class="fab fa-instagram text-lg"></i>
          </a>

          <a href="https://www.linkedin.com" target="_blank" rel="noreferrer" class="h-11 w-11 flex items-center justify-center rounded-full border border-white/10 bg-white/5
                    transition-all duration-200 hover:border-sky-400/60 hover:bg-sky-400/10 hover:text-sky-400">
            <i class="fab fa-linkedin-in text-lg"></i>
          </a>

          <a href="https://www.facebook.com" target="_blank" rel="noreferrer" class="h-11 w-11 flex items-center justify-center rounded-full border border-white/10 bg-white/5
                    transition-all duration-200 hover:border-sky-400/60 hover:bg-sky-400/10 hover:text-sky-400">
            <i class="fab fa-facebook-f text-lg"></i>
          </a>
        </div>

        {{-- <div class="pt-2 flex">
          <a href="mailto:info@satyaarchitects.com" class="inline-flex items-center justify-center rounded-xl px-4 py-3 text-sm font-semibold
                    bg-white text-black hover:bg-sky-300 transition shadow-[0_12px_40px_rgba(0,0,0,0.45)]">
            Schedule a Consultation
          </a>
        </div> --}}

      </div>

    </div>

    {{-- Bottom Bar --}}
    <div class="border-t border-white/10 py-6 flex flex-col md:flex-row items-start md:items-center justify-between gap-3">
      <p class="text-xs text-white/50">
        © {{ date('Y') }} Satya Architects. All rights reserved.
      </p>

      <div class="flex items-center gap-3 text-xs text-white/45">
        <span class="h-px w-10 bg-white/10"></span>
        <span>Gurugram</span>
        <span class="text-white/25">•</span>
        <span>Nationwide collaborations</span>
      </div>
    </div>

  </div>
</footer>