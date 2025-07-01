<x-app-layout>

    <div class="py-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Button Tambah -->
            <div class="flex mt-8 ">
                <x-primary-button href="{{ route('folder_paketWisata.create') }}">
                    Tambah Paket Wisata
                </x-primary-button>
            </div>

            <!-- Content -->
            <div class="flex flex-wrap justify-start gap-6 mt-8">
                @forelse ($paket_wisatas as $paket_wisata)
                    <div class="w-full sm:w-[48%] bg-white border border-gray-200 rounded-lg shadow-sm">
                    <a href="{{route('folder_paketWisata.show', [
                                'username'=> $paket_wisata->user->username,
                                'paket_wisata'=> $paket_wisata->slug
                                ]) }}">
                        <img class="rounded-t-lg w-full h-48 object-cover" src="{{ $paket_wisata->imageUrl() }}" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="{{route('folder_paketWisata.show', [
                                'username'=> $paket_wisata->user->username,
                                'paket_wisata'=> $paket_wisata->slug
                                ]) }}">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{$paket_wisata->title}}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700">
                            {{$paket_wisata->harga}}
                        </p>
                    </div>
                </div>
                @empty
                    <div>
                        <p class="text-gray-900 text-gray-400 py-16"> Tidak Ditemukan Paket Wisata</p>
                    </div>
                @endforelse
            </div>
            


        </div>
    </div>
</x-app-layout>
