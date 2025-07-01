<x-app-layout>

    <div class="py-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Button Tambah -->
            <div class="flex mt-8 ">
                <x-primary-button href="{{ route('folder_wisata.create') }}">
                    Tambah Tempat Wisata
                </x-primary-button>
            </div>
        
                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                    @forelse ($wisatas as $wisata)
                        <a href="{{route('folder_wisata.show', [
                                'username'=> $wisata->user->username,
                                'wisata'=> $wisata->slug
                                ]) }}" 
                            class="mt-8 flex flex-col bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden madarkx-w-xl mx-auto hover:bg-gray-100 transition-transform duration-300 hover:-translate-y-1 hover:shadow-md :border-gray-700">
                            
                            <img class="w-full h-64 object-cover rounded-t-lg" src="{{ $wisata->imageUrl() }}" src="{{ $wisata->imageUrl() }}" alt="">

                            <div class="p-4">
                                <h5 class="mb-2 text-xl font-semibold text-gray-800 break-all">
                                    {{$wisata->title}}
                                </h5>
                                <p class="text-sm text-gray-600 break-all">
                                    {{Str::words($wisata->content,15)}}
                                </p>
                            </div>
                        </a>
                    @empty
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                Tidak Ditemukan Wisata
                            </div>
                        </div>
                    @endforelse
                    
                </div>

                  {{$wisatas->onEachSide(1)->links()}}
                </div>
        </div>
    </div>
</x-app-layout>
