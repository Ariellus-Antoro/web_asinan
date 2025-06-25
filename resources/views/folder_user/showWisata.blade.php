@extends('layouts.userApp')
@section('content')    
    <div class="py-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <!-- Judul -->
                <h1 class="text-4xl font-bold mb-5 ">{{ $wisata->title }}</h1>

                <!-- Content -->
                <div class="border-t mt-3">
                    <img src="{{ $wisata->imageUrl() }}" alt="" class="w-full mt-10">
                    
                    <div class="mt-5 text-lg text-gray-800 leading-relaxed break-words">
                        {{$wisata->content}}
                    </div>
                </div>

                
            </div>
        </div>
    </div>
@endsection