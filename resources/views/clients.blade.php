@extends('layouts.app')

@section('title', 'Clients | Satya Architects')

@section('content')
<section id="clients" class="pt-32 pb-20 min-h-screen">
  <div class="container mx-auto px-6">
    <h1 class="text-4xl font-serif font-bold text-slate-900 mb-12 border-b-2 border-brand-gold inline-block pb-2">Our Clients</h1>
    <p class="text-gray-600 mb-12 max-w-2xl">We are proud to have worked with some of the most prestigious names in the industry.</p>

    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-8">
      <!-- Mock Client Logos -->
      <div class="h-32 bg-white shadow flex items-center justify-center border border-gray-100 grayscale hover:grayscale-0 transition">
        <i class="fas fa-gem text-4xl text-blue-600"></i>
      </div>
      <div class="h-32 bg-white shadow flex items-center justify-center border border-gray-100 grayscale hover:grayscale-0 transition">
        <i class="fas fa-mountain text-4xl text-green-600"></i>
      </div>
      <div class="h-32 bg-white shadow flex items-center justify-center border border-gray-100 grayscale hover:grayscale-0 transition">
        <i class="fas fa-building text-4xl text-gray-800"></i>
      </div>
      <div class="h-32 bg-white shadow flex items-center justify-center border border-gray-100 grayscale hover:grayscale-0 transition">
        <i class="fas fa-landmark text-4xl text-amber-600"></i>
      </div>
      <div class="h-32 bg-white shadow flex items-center justify-center border border-gray-100 grayscale hover:grayscale-0 transition">
        <i class="fas fa-city text-4xl text-indigo-600"></i>
      </div>
      <div class="h-32 bg-white shadow flex items-center justify-center border border-gray-100 grayscale hover:grayscale-0 transition">
        <i class="fas fa-hotel text-4xl text-red-600"></i>
      </div>
      <div class="h-32 bg-white shadow flex items-center justify-center border border-gray-100 grayscale hover:grayscale-0 transition">
        <i class="fas fa-cube text-4xl text-purple-600"></i>
      </div>
      <div class="h-32 bg-white shadow flex items-center justify-center border border-gray-100 grayscale hover:grayscale-0 transition">
        <i class="fas fa-layer-group text-4xl text-teal-600"></i>
      </div>
    </div>
  </div>
</section>
@endsection