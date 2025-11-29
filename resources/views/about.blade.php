@extends('layouts.app')

@section('title', 'About Us | Satya Architects')

@section('content')
<section id="about" class="pt-32 pb-20 min-h-screen">
  <div class="container mx-auto px-6">
    <h1 class="text-4xl font-serif font-bold text-slate-900 mb-12 border-b-2 border-brand-gold inline-block pb-2">About Us</h1>

    <div class="grid md:grid-cols-2 gap-12 items-center">
      <img src="https://images.unsplash.com/photo-1556955112-28cde3817b0a?q=80&w=2070&auto=format&fit=crop" class="shadow-2xl rounded-sm"
        alt="Our Team">

      <div class="space-y-6 text-gray-700">
        <p class="text-lg font-light italic text-slate-900">"We deliver best results."</p>
        <p>M/s Satya Architects constitute a group of keen and energetic Architects and Interior Designers. The firm has acquired experience and
          expertise to cater the requirements of varied building projects.</p>
        <p>We believe that every project is unique and requires a tailored approach. Our team works closely with clients to understand their vision
          and translate it into reality through innovative design solutions and technical excellence.</p>
        <p>Located in Gurgaon, we have established ourselves as a premier consultancy firm, utilizing cutting-edge technology and sustainable
          practices.</p>
      </div>
    </div>
  </div>
</section>
@endsection