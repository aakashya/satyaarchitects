{{-- resources/views/contact.blade.php --}}
@extends('layouts.app')

@section('content')
<section class="bg-white text-black">
  <div class="container mx-auto px-6 py-16 lg:py-24">

    {{-- Header (center) --}}
    <div class="text-center">
      <h1 class="text-3xl md:text-4xl font-semibold tracking-tight">Contact</h1>
    </div>

    {{-- Top 3 Info Boxes (white cards + blue accent) --}}
    <div class="mt-10 px-6 lg:px-40">
      <div class="grid gap-6 md:grid-cols-3">

        {{-- Address --}}
        <div class="group rounded-2xl bg-white border border-black/10 shadow-sm hover:shadow-md transition overflow-hidden">
          <div class="h-1 w-full bg-sky-500"></div>
          <div class="p-6 text-center">
            <div class="mx-auto h-12 w-12 rounded-2xl bg-sky-50 border border-sky-100 flex items-center justify-center
                    group-hover:bg-sky-100 transition">
              <i class="fas fa-map-marker-alt text-lg text-sky-600"></i>
            </div>
            <p class="mt-3 text-[11px] tracking-[0.28em] uppercase text-black/50">Location</p>
            <p class="mt-2 text-sm leading-relaxed text-black/70">
              80-01, Emaar The Palm Square<br>
              Golf Course Extension Road, Sector 66<br>
              Gurugram, Haryana, 122102
            </p>
          </div>
        </div>

        {{-- Email --}}
        <div class="group rounded-2xl bg-white border border-black/10 shadow-sm hover:shadow-md transition overflow-hidden">
          <div class="h-1 w-full bg-sky-500"></div>
          <div class="p-6 text-center">
            <div class="mx-auto h-12 w-12 rounded-2xl bg-sky-50 border border-sky-100 flex items-center justify-center
                    group-hover:bg-sky-100 transition">
              <i class="fas fa-envelope text-lg text-sky-600"></i>
            </div>
            <p class="mt-3 text-[11px] tracking-[0.28em] uppercase text-black/50">Email</p>
            <p class="mt-2 text-sm text-black/70">
              <a href="mailto:info@satyaarchitects.com" class="hover:text-sky-600 transition">
                info@satyaarchitects.com
              </a>
            </p>
          </div>
        </div>

        {{-- Phone --}}
        <div class="group rounded-2xl bg-white border border-black/10 shadow-sm hover:shadow-md transition overflow-hidden">
          <div class="h-1 w-full bg-sky-500"></div>
          <div class="p-6 text-center">
            <div class="mx-auto h-12 w-12 rounded-2xl bg-sky-50 border border-sky-100 flex items-center justify-center
                    group-hover:bg-sky-100 transition">
              <i class="fas fa-phone-alt text-lg text-sky-600"></i>
            </div>
            <p class="mt-3 text-[11px] tracking-[0.28em] uppercase text-black/50">Contact</p>
            <div class="mt-2 text-sm text-black/70 space-y-1">
              <a href="tel:01244380570" class="block hover:text-sky-600 transition">0124-4380570</a>
              <a href="tel:9810757750" class="block hover:text-sky-600 transition">9810757750</a>
            </div>
          </div>
        </div>

      </div>
    </div>

    {{-- Map + Form --}}
    <div class="mt-10 grid gap-8 lg:grid-cols-2 items-start">

      {{-- Map (Left) --}}
      <div class="rounded-2xl border border-black/10 bg-white overflow-hidden shadow-sm">
        <div class="aspect-[16/12] w-full">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14038.0800834019!2d77.04432033321487!3d28.403561676893382!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d23b4671b7575%3A0xd9ac2238e42b4be1!2sSatya%20Architects!5e0!3m2!1sen!2sin!4v1767609042081!5m2!1sen!2sin"
            class="h-full w-full" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>

      {{-- Form (Right) --}}
      <div class="rounded-2xl border border-black/10 bg-white p-6 md:p-8 shadow-sm">
        <h2 class="text-xl md:text-2xl font-semibold">Book a Consultation</h2>

        <form method="POST" class="mt-6 space-y-5">
          @csrf

          <div class="space-y-2">
            <label class="text-xs tracking-[0.28em] uppercase text-black/50">Full Name</label>
            <input type="text" name="full_name" required placeholder="Your name" class="w-full rounded-xl border border-black/10 bg-white px-4 py-3 text-sm text-black placeholder:text-black/35
                     focus:outline-none focus:ring-2 focus:ring-sky-500/30 focus:border-sky-500/40" />
          </div>

          <div class="grid gap-4 md:grid-cols-2">
            <div class="space-y-2">
              <label class="text-xs tracking-[0.28em] uppercase text-black/50">Phone</label>
              <input type="tel" name="phone" required placeholder="Your phone number" class="w-full rounded-xl border border-black/10 bg-white px-4 py-3 text-sm text-black placeholder:text-black/35
                       focus:outline-none focus:ring-2 focus:ring-sky-500/30 focus:border-sky-500/40" />
            </div>
            <div class="space-y-2">
              <label class="text-xs tracking-[0.28em] uppercase text-black/50">Email</label>
              <input type="email" name="email" required placeholder="you@example.com" class="w-full rounded-xl border border-black/10 bg-white px-4 py-3 text-sm text-black placeholder:text-black/35
                       focus:outline-none focus:ring-2 focus:ring-sky-500/30 focus:border-sky-500/40" />
            </div>
          </div>

          <div class="space-y-2">
            <label class="text-xs tracking-[0.28em] uppercase text-black/50">Select a Service</label>
            <select name="service" required class="w-full rounded-xl border border-black/10 bg-white px-4 py-3 text-sm text-black
                     focus:outline-none focus:ring-2 focus:ring-sky-500/30 focus:border-sky-500/40">
              <option value="" disabled selected>Choose one</option>
              <option value="Architecture & Design Consultancy">Architecture and Design Consultancy</option>
              <option value="Masterplanning & Urban Design">Masterplanning and Urban Design</option>
              <option value="Interior & Experiential Design">Interior and Experiential Design</option>
              <option value="Landscape Architecture">Landscape Architecture</option>
              <option value="Industrial Design">Industrial Design</option>
              <option value="Project Management Consultancy">Project Management Consultancy</option>
              <option value="Workplace Consultancy">Workplace Consultancy</option>
            </select>
          </div>

          <div class="grid gap-4 md:grid-cols-2">
            <div class="space-y-2">
              <label class="text-xs tracking-[0.28em] uppercase text-black/50">Date</label>
              <input type="date" name="date" required class="w-full rounded-xl border border-black/10 bg-white px-4 py-3 text-sm text-black
                       focus:outline-none focus:ring-2 focus:ring-sky-500/30 focus:border-sky-500/40" />
            </div>
            <div class="space-y-2">
              <label class="text-xs tracking-[0.28em] uppercase text-black/50">Time</label>
              <select name="time" required class="w-full rounded-xl border border-black/10 bg-white px-4 py-3 text-sm text-black
                       focus:outline-none focus:ring-2 focus:ring-sky-500/30 focus:border-sky-500/40">
                <option value="" disabled selected>Select a time</option>
                <option value="10:00">10:00</option>
                <option value="11:00">11:00</option>
                <option value="12:00">12:00</option>
                <option value="13:00">13:00</option>
                <option value="14:00">14:00</option>
                <option value="15:00">15:00</option>
                <option value="16:00">16:00</option>
                <option value="17:00">17:00</option>
                <option value="18:00">18:00</option>
              </select>
            </div>
          </div>

          <div class="space-y-2">
            <label class="text-xs tracking-[0.28em] uppercase text-black/50">Comment</label>
            <textarea name="comment" rows="4" placeholder="Tell us about your project…" class="w-full rounded-xl border border-black/10 bg-white px-4 py-3 text-sm text-black placeholder:text-black/35
                     focus:outline-none focus:ring-2 focus:ring-sky-500/30 focus:border-sky-500/40"></textarea>
          </div>

          <div class="pt-2 flex items-center justify-end">
            <button type="submit" class="inline-flex items-center justify-center rounded-xl px-5 py-3 text-sm font-semibold
                     bg-black text-white hover:bg-sky-600 transition shadow-sm">
              Send Request
            </button>
          </div>
        </form>
      </div>

    </div>

  </div>
</section>
@endsection