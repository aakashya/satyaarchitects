<nav id="navbar" class="fixed w-full z-50 transition-all duration-300 text-white bg-transparent">
  <div class="container mx-auto px-6 flex justify-between items-center">
    <!-- Logo -->
    <a href="{{ route('home') }}" class="flex items-center gap-3">
      <img id="navbar-logo" src="{{ asset('images/logo/logo2.png') }}" data-logo-transparent="{{ asset('images/logo/logo2.png') }}"
        data-logo-solid="{{ asset('images/logo/satya-new-logoo.png') }}" alt="Satya Architects"
        class="h-20 w-auto object-contain drop-shadow-[0_0_18px_rgba(255,255,255,1)]" />
    </a>

    <!-- Desktop Menu -->
    <div class="hidden md:flex space-x-8 text-base font-railway font-medium tracking-wide uppercase">
      <a href="{{ route('home') }}" class="hover:text-brand-gold transition">OUR STORY</a>
      <a href="{{ route('about-us') }}" class="hover:text-brand-gold transition">ABOUT US</a>
      <a href="{{ route('expertise') }}" class="hover:text-brand-gold transition">EXPERTISE</a>
      <a href="{{ route('projects') }}" class="hover:text-brand-gold transition">PROJECTS</a>
      <a href="{{ route('about') }}" class="hover:text-brand-gold transition">CONTACT US</a>
    </div>

    <!-- Mobile Menu Button -->
    <button id="mobile-menu-button" class="md:hidden text-2xl focus:outline-none">
      <i class="fas fa-bars"></i>
    </button>
  </div>

  <!-- Mobile Menu Overlay -->
  <div id="mobile-menu" class="hidden fixed inset-0 z-60 bg-brand-dark/95 text-white font-railway md:hidden">
    <div class="relative flex h-full flex-col px-6 py-8">
      <div class="flex justify-end">
        <button id="mobile-menu-close-button" class="text-3xl leading-none focus:outline-none" aria-label="Close menu">
          <i class="fas fa-times"></i>
        </button>
      </div>
      <div class="mt-12 flex flex-1 flex-col items-center justify-center gap-8 text-center text-2xl uppercase tracking-[0.3em]">
        <a href="{{ route('home') }}" class="hover:text-brand-gold transition">Our Story</a>
        <a href="{{ route('about-us') }}" class="hover:text-brand-gold transition">About Us</a>
        <a href="{{ route('expertise') }}" class="hover:text-brand-gold transition">Expertise</a>
        <a href="{{ route('projects') }}" class="hover:text-brand-gold transition">Projects</a>
        <a href="{{ route('about') }}" class="hover:text-brand-gold transition">Contact Us</a>
      </div>
    </div>
  </div>
</nav>
