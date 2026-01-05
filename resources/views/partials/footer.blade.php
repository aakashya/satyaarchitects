<footer class="bg-black text-white border-t border-white/10">
  <div class="container mx-auto px-6">

    {{-- 4 Column Footer --}}
    <div class="py-14 grid gap-12 md:grid-cols-2 lg:grid-cols-4">

      {{-- 1) Brand --}}
      <div class="space-y-5">
        <img
          src="{{ asset('images/logo/logo2.png') }}"
          alt="Satya Architects"
          class="h-16 w-auto object-contain"
        />

        <p class="text-sm leading-relaxed text-white/70 max-w-sm">
          A multidisciplinary studio shaping refined architecture, interiors, and masterplans — built with clarity,
          craft, and timeless intent.
        </p>

        <div class="pt-2">
          <a href="mailto:info@satyaarchitects.com"
             class="inline-flex items-center justify-center rounded-xl px-4 py-3 text-sm font-semibold
                    bg-white text-black hover:bg-sky-300 transition shadow-[0_12px_40px_rgba(0,0,0,0.45)]">
            Schedule a Consultation
          </a>
          <p class="mt-3 text-xs text-white/45">Typically replies within 24 hours.</p>
        </div>
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
          <a href="tel:01244380570"
             class="group flex items-center gap-3 text-white/70 hover:text-white transition">
            <span class="h-9 w-9 rounded-full border border-white/10 bg-white/5 flex items-center justify-center
                         group-hover:border-white/25 group-hover:bg-white/10 transition">
              <i class="fas fa-phone-alt text-[13px] text-white/70 group-hover:text-white transition"></i>
            </span>
            <span class="tracking-wide">0124-4380570</span>
          </a>

          <a href="tel:9810757750"
             class="group flex items-center gap-3 text-white/70 hover:text-white transition">
            <span class="h-9 w-9 rounded-full border border-white/10 bg-white/5 flex items-center justify-center
                         group-hover:border-white/25 group-hover:bg-white/10 transition">
              <i class="fas fa-mobile-alt text-[14px] text-white/70 group-hover:text-white transition"></i>
            </span>
            <span class="tracking-wide">9810757750</span>
          </a>

          <a href="mailto:info@satyaarchitects.com"
             class="group flex items-center gap-3 text-white/70 hover:text-white transition">
            <span class="h-9 w-9 rounded-full border border-white/10 bg-white/5 flex items-center justify-center
                         group-hover:border-white/25 group-hover:bg-white/10 transition">
              <i class="fas fa-envelope text-[13px] text-white/70 group-hover:text-white transition"></i>
            </span>
            <span class="tracking-wide">info@satyaarchitects.com</span>
          </a>
        </div>
      </div>

      {{-- 3) Navigation --}}
      <div class="space-y-5">
        <h4 class="text-xs tracking-[0.32em] uppercase text-white/50">Navigation</h4>

        @php
          $links = [
            ['label' => 'Our Story', 'route' => 'home'],
            ['label' => 'Expertise', 'route' => 'expertise'],
            ['label' => 'Studio', 'route' => 'services'],
            ['label' => 'Projects', 'route' => 'projects'],
            ['label' => 'Insights', 'route' => 'clients'],
            ['label' => 'Contact Us', 'route' => 'about'],
          ];
        @endphp

        <nav class="space-y-3 text-sm">
          @foreach($links as $link)
            <a href="{{ route($link['route']) }}"
               class="group flex items-center gap-3 w-fit text-white/70 hover:text-white transition">
              <span class="h-1.5 w-1.5 rounded-full bg-white/25 group-hover:bg-sky-300 transition"></span>
              <span class="tracking-wide group-hover:translate-x-0.5 transition">{{ $link['label'] }}</span>
            </a>
          @endforeach
        </nav>
      </div>

      {{-- 4) Connect --}}
      <div class="space-y-5">
        <h4 class="text-xs tracking-[0.32em] uppercase text-white/50">Connect</h4>

        <p class="text-sm leading-relaxed text-white/70">
          Follow for project reveals, process, and studio updates.
        </p>

        <div class="flex items-center gap-3">
          <a href="https://www.instagram.com" target="_blank" rel="noreferrer"
             class="h-11 w-11 flex items-center justify-center rounded-full border border-white/10 bg-white/5
                    hover:bg-white/10 hover:border-white/25 hover:text-white transition">
            <i class="fab fa-instagram text-lg"></i>
          </a>
          <a href="https://www.linkedin.com" target="_blank" rel="noreferrer"
             class="h-11 w-11 flex items-center justify-center rounded-full border border-white/10 bg-white/5
                    hover:bg-white/10 hover:border-white/25 hover:text-white transition">
            <i class="fab fa-linkedin-in text-lg"></i>
          </a>
          <a href="https://www.facebook.com" target="_blank" rel="noreferrer"
             class="h-11 w-11 flex items-center justify-center rounded-full border border-white/10 bg-white/5
                    hover:bg-white/10 hover:border-white/25 hover:text-white transition">
            <i class="fab fa-facebook-f text-lg"></i>
          </a>
        </div>

        <div class="pt-1 text-xs text-white/45 space-y-2">
          <p>For collaborations & consultations.</p>
          <p class="text-white/35">Mon–Sat • 10:00–18:00</p>
        </div>
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
