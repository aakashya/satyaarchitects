@extends('layouts.app')

@section('title', 'Page Not Found | Satya Architects')
@section('meta_description', 'The page you are looking for could not be found. Return to Satya Architects home or explore our projects.')

@section('content')
<section class="min-h-[70vh] flex items-center justify-center bg-slate-50 text-slate-900">
  <div class="container mx-auto px-6 text-center">
    <p class="text-xs tracking-[0.35em] uppercase text-slate-400 mb-4">404</p>
    <h1 class="text-3xl md:text-5xl font-semibold mb-4">Page not found</h1>
    <p class="text-sm md:text-base text-slate-600 max-w-xl mx-auto mb-8">
      The page you're looking for doesn't exist or has been moved.
    </p>
    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
      <a href="{{ route('home') }}" class="px-6 py-3 rounded-xl bg-black text-white text-sm font-semibold hover:bg-slate-800 transition">
        Back to Home
      </a>
      <a href="{{ route('projects') }}" class="px-6 py-3 rounded-xl border border-slate-300 text-sm font-semibold hover:border-slate-400 transition">
        View Projects
      </a>
    </div>
  </div>
</section>
@endsection
