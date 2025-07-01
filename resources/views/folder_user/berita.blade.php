@extends('layouts.userApp')

@section('content')

<div id="controls-carousel" class="relative w-screen h-[70vh]" data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="relative w-screen h-full overflow-hidden">
        @foreach($beritaTerbarus as $beritaTerbaru)
            <div class="{{ $loop->first ? 'active' : 'hidden' }} duration-700 ease-in-out" data-carousel-item>
                <img src="{{ $beritaTerbaru->imageUrl() }}" 
                     class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" 
                     alt="...">
            </div>
        @endforeach
    </div>

    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>

<div class="p-10">
    <div class="w-full">

        <!-- Categories-->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-4 text-gray-900">
                <x-category-tabs-user :categories="$categories" />
            </div>
        </div>

        <!-- Content-->
        <div class="max-w-7xl mx-auto p-4">
            <div class="flex flex-wrap justify-center gap-6">
                @forelse ($beritas as $berita)
                    
                    <div class="mt-8 bg-white border-gray-200 rounded-lg shadow-lg bg-white rounded-lg shadow-sm flex-none w-[30%] ">
                        <a href="{{ route('folder_user.showberita', [
                                'username' => $berita->user->username,
                                'berita' => $berita->slug
                            ]) }}">
                            <img class="rounded-t-lg object-cover w-full h-48" src="{{ $berita->imageUrl() }}" alt="" />
                        </a>
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 break-all">{{ $berita->title }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 break-all">{{ $berita->content,5 }}</p>
                            <a href="#" class="text-sm text-gray-400">
                                {{ $berita ->createdAt() }}
                            </a>
                        </div>
                    </div>


                @empty
                    <div>
                        <p class="text-gray-900 text-gray-400 py-16"> Tidak Ditemukan Berita</p>
                    </div>

                @endforelse
            </div>

                {{$beritas->onEachSide(1)->links()}}
        </div>
    </div>
</div>
@endsection



