<x-app-layout>
    <div class="py-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <!-- Judul -->
                <h1 class="text-4xl font-bold mb-5 break-words">{{ $paket_wisata->title }}</h1>

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

                @if($paket_wisata->user_id === Auth::id())
                <div class="mt-8 py-4 ">
                    <x-primary-button href="{{ route('folder_paketWisata.edit', $paket_wisata) }}"> 
                        Edit Paket Wisata
                    </x-primary-button>
                    <form class="inline-block" action="{{ route('folder_paketWisata.destroy', $paket_wisata) }}" method="post">
                        @csrf
                        @method('delete')
                        
                        <x-danger-button>
                            Delete Paket Wisata
                        </x-danger-button>
                    </form>    

                </div>
                @endif

                <!-- Content -->
                <div class="border-t mt-3">
                    <img src="{{ $paket_wisata->imageUrl() }}" alt="" class="w-full mt-10">

                    <h3 class="mt-5 text-xl font-bold">DESKRIPSI PAKET</h3>
                    
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <strong>HARGA : </strong> Rp {{$paket_wisata->harga}}
                            <br>
                            <p class="text-lg mb-5"> <strong>Nomor Kontak :</strong>  <a href="{{ $contact_phone }} " class="text-blue-600 hover:underline"> {{ $contact_phone }}</a> </p>
                        </div>
                    </div>

                    <div class="mt-5 text-lg text-gray-800 leading-relaxed break-words text-justify">
                        {{$paket_wisata->content}}
                    </div>
                </div>

                
            </div>
        </div>
    </div>
</x-app-layout>
