@extends('layouts.userApp')

@section('content')

<!-- HERO Section -->
<div class="relative w-screen h-screen">
    <img src="/heroSection.jpeg" alt="Hero Section" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
    <div class="absolute inset-0 flex flex-col items-center justify-center text-white animate-fadeInUp">
        <h1 class="text-7xl font-black tracking-wider">Wisata</h1>
    </div>
</div>


<div class="py-8 mt-10">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">

        <div class="flex items-center mb-8">
            <div class="flex-grow border-2 border-black"></div>
            <span class="px-4 flex-shrink-0 text-4xl text-black tracking-wider">
               HIGHLIGHT WISATA
            </span>
            <div class="flex-grow border-2 border-black"></div>
        </div>

        <!-- CARD -->
        <div class="relative">
            <div class="flex justify-evenly">
                @forelse ($top3s as $wisata)
                    <a href="{{ route('folder_user.showWisata', [
                                'username' => $wisata->user->username,
                                'wisata' => $wisata->slug
                            ]) }}" class="relative flex-shrink-0 w-[23rem] h-[30rem] rounded-3xl overflow-hidden group">

                        <img class="w-full h-full object-cover" 
                            src="{{ $wisata->imageUrl() }}" 
                            alt="{{ $wisata->title }}">
                        <div class="absolute inset-0 flex items-center justify-center 
                                    bg-black bg-opacity-0 group-hover:bg-opacity-50 
                                    transition duration-300 ease-in-out">
                            <h5 class="text-2xl font-bold text-white opacity-0 
                                    translate-y-4 scale-95
                                    group-hover:opacity-100 group-hover:translate-y-0 group-hover:scale-100
                                    transition duration-300 ease-in-out">
                                {{ $wisata->title }}
                            </h5>
                        </div>
                    </a>
                @empty
                    <div>
                        <p class="text-gray-900 text-gray-400 py-16">Tidak Ditemukan Wisata</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<div class="relative min-h-screen mt-10">
    <!-- Pattern + Overlay -->
    <img src="/pattern.jpg" alt="Pattern" class="absolute inset-0 w-full h-full object-cover block">
    <div class="absolute inset-0 bg-black bg-opacity-90"></div>

    <!-- Content -->
    <div class="relative z-10 mx-auto p-4 space-y-8 " >
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-center mb-8 mt-10">
                <div class="px-4 flex-shrink-0 text-4xl font-bold text-white tracking-wider">
                Explore Wisata Lainnya
                </div>
            </div>

            <!-- CARD -->
            <div class="relative">
                <div class="grid grid-cols-2 gap-6">
                    @forelse ($remainings as $wisata)
                        <a href="{{ route('folder_user.showWisata', [
                                'username' => $wisata->user->username,
                                'wisata' => $wisata->slug
                            ]) }}" class="relative rounded-3xl overflow-hidden group shadow-lg border-white">
                            <img class="w-full h-[20rem] object-cover" 
                                src="{{ $wisata->imageUrl() }}" 
                                alt="{{ $wisata->title }}">
                            <div class="absolute inset-0 flex items-center justify-center 
                                        bg-black bg-opacity-0 group-hover:bg-opacity-50 
                                        transition duration-300 ease-in-out">
                                <h5 class="text-2xl font-bold text-white opacity-0 
                                            translate-y-4 scale-95
                                            group-hover:opacity-100 group-hover:translate-y-0 group-hover:scale-100
                                            transition duration-300 ease-in-out">
                                    {{ $wisata->title }}
                                </h5>
                            </div>
                        </a>
                    @empty
                        <div>
                            <p class="text-gray-900 text-gray-400 py-16">Tidak Ditemukan Wisata</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
