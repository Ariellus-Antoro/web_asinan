@extends('layouts.userApp')

@section('content')
<!-- HERO Section -->
<div class="relative w-screen h-screen">
    <img src="/heroSection.jpeg" alt="Hero Section" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
    <div class="absolute inset-0 flex flex-col items-center justify-center text-white animate-fadeInUp">
        <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black tracking-wider">Rencana Desa</h1>
    </div>
</div>

<!-- RENCANA -->
<div class="relative min-h-screen">
    <!-- Pattern + Overlay -->
    <img src="/pattern.jpg" alt="Pattern" class="absolute inset-0 w-full h-full object-cover block">
    <div class="absolute inset-0 bg-black bg-opacity-90"></div>

    <!-- Content -->
    <div class="relative z-10 mx-auto p-4 space-y-8 " >
        @foreach ($rencanas as $index => $rencana)
            <a href="{{ route('folder_user.showRencana', [
                'username' => $rencana->user->username,
                'rencana' => $rencana->slug
                ]) }}" 
                class="flex space-x-4 p-10 rounded-2xl mt-8 transform hover:bg-white/10 transform  hover:-translate-y-2 hover:scale-105 animate-fadeInUp
                  
                        {{ $index % 2 == 1 ? ' justify-end' : '' }}" 
                style="animation-delay: 0.2s;" 
                data-aos="fade-up" data-aos-delay="200">
                
                @if ($index % 2 == 0)
                    <!-- Gambar Kiri -->
                    <img src="{{ $rencana->imageUrl() }}" alt="{{ $rencana->title }}" 
                        class="w-45 h-40 object-cover rounded-2xl transform 
                   hover:-translate-y-2 hover:scale-105 transition duration-300 ease-in-out">

                    <!-- Text -->
                    <div class="flex flex-col justify-center">
                        <h2 class="text-4xl font-bold text-white">{{ $rencana->title }}</h2>
                        <p class=" text-xl text-gray-300 mt-2 break-all">
                            {{ Str::words($rencana->content, 20) }}
                        </p>
                    </div>
                
                @else
                    <!-- Text -->
                    <div class="flex flex-col justify-center text-right">
                        <h2 class="text-4xl font-bold text-white break-all">{{ $rencana->title }}</h2>
                        <p class=" text-xl text-gray-300 mt-2 break-all">
                            {{ Str::words($rencana->content, 20) }}
                        </p>
                    </div>

                    <!-- Gambar Kanan -->
                    <img src="{{ $rencana->imageUrl() }}" alt="{{ $rencana->title }}" 
                        class="w-45 h-40 object-cover rounded-2xl transform 
                   hover:-translate-y-2 hover:scale-105 transition duration-300 ease-in-out">
                @endif
            </a>
        @endforeach
    </div>
</div>
@endsection
