<nav id="navbar" class="fixed w-full z-50 transition-all duration-300 text-white bg-transparent">
  <div class="container mx-auto px-6 flex justify-between items-center">
    <!-- Logo -->
    <a href="{{ route('home') }}" class="flex items-center gap-3">
      <img src="{{ asset('images/logo/satya-new-logoo.png') }}" alt="Satya Architects Logo" class="h-20 w-auto object-contain drop-shadow-[0_0_18px_rgba(255,255,255,1)]">
    </a>

    <!-- Desktop Menu -->
    <div class="hidden md:flex space-x-8 text-base font-railway font-medium tracking-wide uppercase">
      <a href="{{ route('home') }}" class="hover:text-brand-gold transition">OUR STORY</a>
      <a href="{{ route('about') }}" class="hover:text-brand-gold transition">EXPERTISE</a>
      <a href="{{ route('services') }}" class="hover:text-brand-gold transition">STUDIO</a>
      <a href="{{ route('projects') }}" class="hover:text-brand-gold transition">PROJECTS</a>
      <a href="{{ route('clients') }}" class="hover:text-brand-gold transition">INSIGHTS</a>
      <a href="{{ route('about') }}" class="hover:text-brand-gold transition">CONTACT US</a>
    </div>

    <!-- Mobile Menu Button -->
    <button id="mobile-menu-button" class="md:hidden text-2xl focus:outline-none">
      <i class="fas fa-bars"></i>
    </button>
  </div>

  <!-- Mobile Menu Overlay -->
  <div id="mobile-menu" class="hidden absolute font-railway top-full left-0 w-full bg-brand-dark text-white p-6 md:hidden shadow-lg">
    <div class="flex flex-col space-y-4 text-center">
      <a href="{{ route('home') }}" class="hover:text-brand-gold">Home</a>
      <a href="{{ route('about') }}" class="hover:text-brand-gold">About Us</a>
      <a href="{{ route('projects') }}" class="hover:text-brand-gold">Projects</a>
      <a href="{{ route('services') }}" class="hover:text-brand-gold">Services</a>
      <a href="{{ route('clients') }}" class="hover:text-brand-gold">Clients</a>
    </div>
  </div>
</nav>