@extends('layouts.userApp')

@section('content')
    <div class="py-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <!-- Judul -->
                <h1 class="text-4xl font-bold mb-5 ">{{ $paket_wisata->title }}</h1>

                <!-- Pembuat -->
                <div class="flex gap-5">
                    <img src="https://img.favpng.com/2/21/11/computer-icons-user-profile-user-account-clip-art-png-favpng-gDBjftHWJPTMjttnBiJh9vw96.jpg" alt="Avatar" class="w-15 h-10 rounded-full">

                    <div>
                        <h3> {{ $paket_wisata->user->name }} </h3>
                        <span class="text-sm text-black/70">
                            {{ $paket_wisata ->createdAt() }}
                        </span>
                    </div>


                </div>

                <!-- Content -->
                <div class="border-t mt-3">
                    <img src="{{ $paket_wisata->imageUrl() }}" alt="" class="w-full mt-10">
                    
                    <div class="mt-8">
                        <strong>HARGA : </strong> Rp {{$paket_wisata->harga}}
                    </div>

                    <div class="mt-5 text-lg text-gray-800 leading-relaxed break-words">
                        {{$paket_wisata->content}}
                    </div>
                </div>

                
            </div>
        </div>
    </div>
@endsection
