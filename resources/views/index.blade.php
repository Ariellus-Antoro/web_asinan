@extends('layouts.userApp')

@section('content')

<!-- HERO Section -->
<div class="relative w-screen h-screen">
    <img src="/heroSection.jpeg" alt="Hero Section" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
    <div class="absolute inset-0 flex flex-col items-center justify-center text-white animate-fadeInUp">
        <h1 class="text-3xl md:text-5xl font-bold tracking-wide leading-tight">
            Temukan Pesona Desa yang Damai
        </h1>
        <p class="mt-4 text-lg md:text-2xl font-medium max-w-3xl">
            Tempat cerita dan tradisi berpadu dengan keindahan alam.
        </p>
    </div>
</div>

<div class="py-8 mt-10 " data-aos="fade-up" data-aos-delay="100">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">

        <div class="flex items-center mb-8">
            <div class="flex-grow border-2 border-black"></div>
            <span class="px-4 flex-shrink-0 text-4xl text-black tracking-wider">
               DESA ASINAN
            </span>
            <div class="flex-grow border-2 border-black"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <div class="grid grid-cols-2 grid-rows-2 gap-4">
                <img src="/home1.jpeg" alt="Gambar 1" class="w-full h-40 object-cover rounded-lg">
                <img src="/home2.jpeg" alt="Gambar 2" class="w-full h-40 object-cover rounded-lg">
                <img src="/home3.jpeg" alt="Gambar 3" class="col-span-2 w-full h-40 object-cover rounded-lg">
            </div>

            <div class="flex flex-col justify-start">
                <p class="mt-3 text-justify text-base/8 text-justify">
                    Desa Asinan merupakan salah satu desa di Kecamatan Bawen, Kabupaten Semarang, yang berbatasan langsung dengan Kecamatan Ambarawa. Desa ini terdiri dari empat dusun, yaitu Sumurup, Ba’an, Krajan, dan Mengkelang, dengan jumlah penduduk sekitar 4.200 jiwa yang tersebar dalam 5 RW dan 24 RT.
                </p>
                <br>
                <p class="text-base/8 text-justify">
                    Mayoritas penduduk Desa Asinan bermata pencaharian sebagai nelayan rawa dan petani. Keberadaan Rawa Pening menjadi sumber daya alam utama yang mendukung kegiatan ekonomi masyarakat, terutama di sektor perikanan dan pertanian. Hasil tangkapan ikan dikelola melalui lembaga Polakhsar yang juga berfungsi sebagai penyalur distribusi ikan.
                </p>
            </div>
        </div>

    </div>
</div>


<div class="py-8 mt-15" data-aos="fade-up" data-aos-delay="100">
    <div class=" max-w-8xl mx-auto sm:px-6 lg:px-8 flex flex-col justify-start">

        <div class="px-4 flex-shrink-0 text-4xl font-bold text-black tracking-wide">
            Keunikan Desa
        </div>

        <div class="mt-10 pl-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
                @foreach ($top_2_pakets as $paket_wisata)
                    <a href="{{ route('folder_user.showPaket_wisata', [
                                'username' => $paket_wisata->user->username,
                                'paket_wisata' => $paket_wisata->slug
                            ]) }} " 
                       class="bg-white rounded-2xl border border-gray-100 shadow-lg hover:shadow-2xl hover:scale-105 transition-all duration-300 h-[28rem]">
                       
                        <div class="h-64 overflow-hidden">
                            <img 
                               class="w-full h-full object-cover rounded-t-2xl" 
                               style="clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%)" 
                               src="{{ $paket_wisata->imageUrl() }}" 
                               alt="{{ $paket_wisata->title }}">
                        </div>
                        
                        <div class="p-3 flex flex-col justify-start mt-12">
                            <h5 class="text-2xl font-bold text-gray-800 text-center break-all overflow-hidden w-full max-w-full">
                                {{ $paket_wisata->title }}
                            </h5>
                        </div>
                    </a>
                @endforeach
                @foreach ($top_2_wisatas as $wisata)
                    <a href="{{ route('folder_user.showWisata', [
                                'username' => $wisata->user->username,
                                'wisata' => $wisata->slug
                            ]) }}" 
                       class="bg-white rounded-2xl border border-gray-100 shadow-lg hover:shadow-2xl hover:scale-105 transition-all duration-300 h-[28rem]">
                       
                        <div class="h-64 overflow-hidden">
                            <img 
                               class="w-full h-full object-cover rounded-t-2xl" 
                               style="clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%)" 
                               src="{{ $wisata->imageUrl() }}" 
                               alt="{{ $wisata->title }}">
                        </div>
                        
                        <div class="p-3 flex flex-col justify-start mt-12">
                            <h5 class="text-2xl font-bold text-gray-800 text-center break-all overflow-hidden">
                                {{ $wisata->title }}
                            </h5>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </div>
</div>

<div class="py-8 mt-15" data-aos="fade-up" data-aos-delay="100">
    <div class=" max-w-8xl mx-auto sm:px-6 lg:px-8 flex flex-col justify-start">

        <div class="px-4 flex-shrink-0 text-4xl font-bold text-black tracking-wide">
            Featured Video
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-10 px-4 md:px-10">
            <div class="relative aspect-video">
                <iframe
                    class="absolute inset-0 w-full h-full rounded-lg shadow"
                    src="https://www.youtube.com/embed/{{ $featured_video }}"
                    title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                ></iframe>
            </div>

            <div class="flex flex-col justify-start">
                <h1 class="font-semibold text-black text-4xl tracking-wide ml-8">Profil Singkat</h1>
                <br>
                <p class="font-regular text-black text-base/8 p-8 text-justify">
                    Mayoritas penduduk Desa Asinan bermata pencaharian sebagai nelayan rawa dan petani. Keberadaan Rawa Pening menjadi sumber daya alam utama yang mendukung kegiatan ekonomi masyarakat, terutama di sektor perikanan dan pertanian. Hasil tangkapan ikan dikelola melalui lembaga Polakhsar yang juga berfungsi sebagai penyalur distribusi ikan.
                </p>
            </div>                
        </div>
    </div>
</div>

<div class="py-8" data-aos="fade-up" data-aos-delay="100">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 flex flex-col justify-start">

        <div class="px-4 flex-shrink-0 text-4xl font-bold text-black tracking-wide">
            Berita Terbaru
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 px-4">

            @forelse ($top_4_beritas as $berita)
                <div class=" mt-10 bg-white border border-gray-100 shadow-lg hover:shadow-2xl hover:scale-105 transition-all duration-300 rounded-lg w-[18rem]">
                    <a href="{{ route('folder_user.showberita', [
                        'username' => $berita->user->username,
                        'berita' => $berita->slug
                    ]) }}">
                        <img class="rounded-t-lg w-full h-48 object-cover object-center" src="{{ $berita->imageUrl() }}" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 break-all">{{ $berita->title }}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 break-all">{{ $berita->content,5 }}</p>
                        <a href="#" class="text-sm text-gray-400">
                            {{ $berita->createdAt() }}
                        </a>
                    </div>
                </div>
            @empty
                <div>
                    <p class="text-gray-900 text-gray-400 py-16">Tidak Ditemukan Berita</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<div class="relative min-h-screen flex items-center justify-center mt-10" data-aos="fade-up" data-aos-delay="100">  
    <img src="/pattern.jpg" alt="Pattern" class="absolute inset-0 w-full h-full object-cover block">
    <div class="absolute inset-0 bg-black bg-opacity-90"></div>
    <div class="relative z-10 w-full max-w-7xl mx-auto"> 

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div class="text-white text-center md:text-left px-8">
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold leading-tight">
                    ADA APA SAJA DI DESA ASINAN?
                </h1>
            </div>

            <div class="relative flex items-center">
                <div id="cardSlider" class="flex space-x-6 overflow-x-auto p-4 snap-x snap-mandatory scrollbar-hide">

                    @foreach($wisatas as $wisata)
                    
                    <a href="{{ route('folder_user.showWisata', [
                                'username' => $wisata->user->username,
                                'wisata' => $wisata->slug
                            ]) }}" 
                            class="snap-center flex-shrink-0 w-[22rem] h-[30rem] relative rounded-2xl overflow-hidden shadow-lg">
                        <img src="{{ $wisata->imageUrl() }}" class="w-full h-full object-cover" alt="">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                        <p class="absolute bottom-4 left-4 text-white text-xl font-semibold">{{ $wisata->title }}</p>
                    </a>

                    @endforeach

                </div>
                
                <div class="absolute -right-6 z-20">
                    <button id="nextBtn" class="bg-white rounded-full p-3 shadow-lg hover:bg-gray-200 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>

            </div>

        </div>
    </div>

</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const slider = document.getElementById('cardSlider');
        const nextBtn = document.getElementById('nextBtn');
        const scrollAmount = 424;

        nextBtn.addEventListener('click', () => {

            if (slider.scrollLeft + slider.clientWidth >= slider.scrollWidth - 5) {
                slider.scrollTo({ left: 0, behavior: 'smooth' });
            } else {
                slider.scrollBy({ left: scrollAmount, behavior: 'smooth' });
            }
        });
    });
</script>



@endsection

