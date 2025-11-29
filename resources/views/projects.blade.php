@extends('layouts.app')

@section('title', 'Projects | Satya Architects')

@section('content')
<section id="projects" class="pt-32 pb-20 min-h-screen">
  <div class="container mx-auto px-6">
    <h1 class="text-4xl font-serif font-bold text-slate-900 mb-12 border-b-2 border-brand-gold inline-block pb-2">Our Portfolio</h1>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Mock Project 1 -->
      <div class="group relative overflow-hidden cursor-pointer">
        <img src="https://images.unsplash.com/photo-1613490493576-7fde63acd811?q=80&w=2071&auto=format&fit=crop"
          class="w-full h-80 object-cover transform group-hover:scale-110 transition duration-500" alt="Project">
        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
          <div class="text-center text-white">
            <h3 class="text-xl font-bold uppercase">Skyline Towers</h3>
            <p class="text-sm text-brand-gold">Residential</p>
          </div>
        </div>
      </div>
      <!-- Mock Project 2 -->
      <div class="group relative overflow-hidden cursor-pointer">
        <img src="https://images.unsplash.com/photo-1577495508048-b635879837f1?q=80&w=1974&auto=format&fit=crop"
          class="w-full h-80 object-cover transform group-hover:scale-110 transition duration-500" alt="Project">
        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
          <div class="text-center text-white">
            <h3 class="text-xl font-bold uppercase">The Grand Mall</h3>
            <p class="text-sm text-brand-gold">Commercial</p>
          </div>
        </div>
      </div>
      <!-- Mock Project 3 -->
      <div class="group relative overflow-hidden cursor-pointer">
        <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?q=80&w=2070&auto=format&fit=crop"
          class="w-full h-80 object-cover transform group-hover:scale-110 transition duration-500" alt="Project">
        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
          <div class="text-center text-white">
            <h3 class="text-xl font-bold uppercase">Tech Park</h3>
            <p class="text-sm text-brand-gold">Institutional</p>
          </div>
        </div>
      </div>
      <!-- Mock Project 4 -->
      <div class="group relative overflow-hidden cursor-pointer">
        <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=2070&auto=format&fit=crop"
          class="w-full h-80 object-cover transform group-hover:scale-110 transition duration-500" alt="Project">
        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
          <div class="text-center text-white">
            <h3 class="text-xl font-bold uppercase">Urban Villa</h3>
            <p class="text-sm text-brand-gold">Housing</p>
          </div>
        </div>
      </div>
      <!-- Mock Project 5 -->
      <div class="group relative overflow-hidden cursor-pointer">
        <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=2031&auto=format&fit=crop"
          class="w-full h-80 object-cover transform group-hover:scale-110 transition duration-500" alt="Project">
        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
          <div class="text-center text-white">
            <h3 class="text-xl font-bold uppercase">Modern Loft</h3>
            <p class="text-sm text-brand-gold">Interior</p>
          </div>
        </div>
      </div>
      <!-- Mock Project 6 -->
      <div class="group relative overflow-hidden cursor-pointer">
        <img src="https://images.unsplash.com/photo-1493397212122-2b85dda7b8bd?q=80&w=2073&auto=format&fit=crop"
          class="w-full h-80 object-cover transform group-hover:scale-110 transition duration-500" alt="Project">
        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
          <div class="text-center text-white">
            <h3 class="text-xl font-bold uppercase">Green Complex</h3>
            <p class="text-sm text-brand-gold">Sustainable</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection