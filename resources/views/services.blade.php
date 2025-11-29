@extends('layouts.app')

@section('title', 'Services | Satya Architects')

@section('content')
<section id="services" class="pt-32 pb-20 bg-slate-50 min-h-screen">
  <div class="container mx-auto px-6">
    <div class="text-center max-w-3xl mx-auto mb-16">
      <h1 class="text-4xl font-serif font-bold text-slate-900 mb-4">Specialized Services</h1>
      <p class="text-gray-600">Comprehensive architectural and engineering solutions for complex requirements.</p>
    </div>

    <div class="space-y-12">
      <!-- Service Item 02 -->
      <div class="flex flex-col md:flex-row gap-8 bg-white p-8 shadow-sm border-l-4 border-brand-gold hover:shadow-lg transition">
        <div class="md:w-1/4">
          <span class="text-6xl font-black text-gray-100 block -mb-4">01</span>
          <h3 class="text-2xl font-serif font-bold text-slate-900 relative z-10">Structural Services</h3>
        </div>
        <div class="md:w-3/4">
          <p class="text-gray-600 leading-relaxed">
            Structural Services: Building Structures. Fiber Reinforced Polymers. Heavy Timber Structures. Light-Gauge Steel Structures. Masonry
            Structures. Prestressed Concrete Structures. Post-Tensioned Concrete Structures. Reinforced Concrete Structures. Structural Steel
            Structures. Wood-Framed Structures.
          </p>
        </div>
      </div>

      <!-- Service Item 03 -->
      <div class="flex flex-col md:flex-row gap-8 bg-white p-8 shadow-sm border-l-4 border-brand-gold hover:shadow-lg transition">
        <div class="md:w-1/4">
          <span class="text-6xl font-black text-gray-100 block -mb-4">02</span>
          <h3 class="text-2xl font-serif font-bold text-slate-900 relative z-10">Plumbing & Fire Fighting</h3>
        </div>
        <div class="md:w-3/4">
          <p class="text-gray-600 leading-relaxed">
            Today is the world of architecture and building where complex buildings are being erected day by day. Taller structures have even become
            the icon of development of a country. This answers the great importance given to construction related works and the huge demand for
            plumber, fire fighting services provider.
          </p>
        </div>
      </div>

      <!-- Service Item 04 -->
      <div class="flex flex-col md:flex-row gap-8 bg-white p-8 shadow-sm border-l-4 border-brand-gold hover:shadow-lg transition">
        <div class="md:w-1/4">
          <span class="text-6xl font-black text-gray-100 block -mb-4">03</span>
          <h3 class="text-2xl font-serif font-bold text-slate-900 relative z-10">Electrical Consultants</h3>
        </div>
        <div class="md:w-3/4">
          <p class="text-gray-600 leading-relaxed">
            Today is the world of architecture and building where complex buildings are being erected day by day. Taller structures have even become
            the icon of development of a country. This answers the great importance given to construction related works and the huge demand for
            electrical services provider.
          </p>
        </div>
      </div>

      <!-- Service Item 05 -->
      <div class="flex flex-col md:flex-row gap-8 bg-white p-8 shadow-sm border-l-4 border-brand-gold hover:shadow-lg transition">
        <div class="md:w-1/4">
          <span class="text-6xl font-black text-gray-100 block -mb-4">04</span>
          <h3 class="text-2xl font-serif font-bold text-slate-900 relative z-10">HVAC Services</h3>
        </div>
        <div class="md:w-3/4">
          <p class="text-gray-600 leading-relaxed">
            We're here to make your life a lot less hectic, and a lot more productive. As a local HVAC and Mechanical Contractor, We are committed to
            delivering true peace of mind. We perform regular inspections and maintenance of your building systems to ensure a greater level of
            operational excellence.
          </p>
        </div>
      </div>

      <!-- Service Item 06 -->
      <div class="flex flex-col md:flex-row gap-8 bg-white p-8 shadow-sm border-l-4 border-brand-gold hover:shadow-lg transition">
        <div class="md:w-1/4">
          <span class="text-6xl font-black text-gray-100 block -mb-4">05</span>
          <h3 class="text-2xl font-serif font-bold text-slate-900 relative z-10">Landscaping Services</h3>
        </div>
        <div class="md:w-3/4">
          <p class="text-gray-600 leading-relaxed">
            Our services include: Commercial landscaping for retail developments and business parks; Public open space landscaping on housing
            developments. Our landscape construction team can take your dreams and turn them into reality.
          </p>
        </div>
      </div>

      <!-- Service Item 07 -->
      <div class="flex flex-col md:flex-row gap-8 bg-white p-8 shadow-sm border-l-4 border-brand-gold hover:shadow-lg transition">
        <div class="md:w-1/4">
          <span class="text-6xl font-black text-gray-100 block -mb-4">06</span>
          <h3 class="text-2xl font-serif font-bold text-slate-900 relative z-10">Green Building</h3>
        </div>
        <div class="md:w-3/4">
          <p class="text-gray-600 leading-relaxed">
            Green Building Services maximizes your building's greatest potential by consulting on everything from reducing water and energy usage, to
            creating and engaging a sustainably-minded culture.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection