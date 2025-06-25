@extends('layouts.userApp')

@section('content')

<!-- HERO Section -->
<div class="relative w-screen h-screen">
    <img src="/heroSection.jpeg" alt="Hero Section" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
    <div class="absolute inset-0 flex flex-col items-center justify-center text-white animate-fadeInUp">
        <h1 class="text-7xl font-black tracking-wider">Paket Wisata</h1>
    </div>
</div>

<div class="py-8 mt-10">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">

        <div class="flex items-center mb-8">
            <div class="flex-grow border-2 border-black"></div>
            <span class="px-4 flex-shrink-0 text-4xl text-black tracking-wider">
                PAKET WISATA
            </span>
            <div class="flex-grow border-2 border-black"></div>
        </div>

        <div class="relative">
            <div id="cardSlider" class="flex overflow-x-auto gap-10 scroll-smooth px-4 py-6 scrollbar-hide">
                @forelse ($paket_wisatas as $paket_wisata)
                    <a href="{{ route('folder_user.showPaket_wisata', [
                                'username' => $paket_wisata->user->username,
                                'paket_wisata' => $paket_wisata->slug
                            ]) }}" 
                        class="flex-shrink-0 w-[24rem] h-[35rem] flex flex-col bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 transition-transform duration-300 hover:-translate-y-1 hover:shadow-md">
                        
                        <img class="w-full h-[95%] object-cover rounded-t-lg" src="{{ $paket_wisata->imageUrl() }}" alt="Gambar Paket Wisata">
                        
                        <div class="p-4">
                            <h5 class="text-2xl font-regular text-gray-800 text-center">
                                {{ $paket_wisata->title }}
                            </h5>
                        </div>
                    </a>
                @empty
                    <div>
                        <p class="text-gray-900 text-gray-400 py-16">Tidak Ditemukan Paket Wisata</p>
                    </div>
                @endforelse
            </div>

            <button id="prevBtn" type="button" class="absolute top-1/2 left-0 -translate-y-1/2 z-30 p-2 bg-white/70 rounded-full shadow hover:bg-white">
                <svg class="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <button id="nextBtn" type="button" class="absolute top-1/2 right-0 -translate-y-1/2 z-30 p-2 bg-white/70 rounded-full shadow hover:bg-white">
                <svg class="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const slider = document.getElementById('cardSlider');
        const nextBtn = document.getElementById('nextBtn');
        const prevBtn = document.getElementById('prevBtn');

        const scrollAmount = 424;

        nextBtn.addEventListener('click', () => {
            slider.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        });

        prevBtn.addEventListener('click', () => {
            slider.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        });
    });
</script>
@endsection
