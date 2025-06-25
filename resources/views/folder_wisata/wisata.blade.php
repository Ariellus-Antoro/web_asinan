<x-app-layout>

    <div class="py-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Button Tambah -->
            <div class="flex mt-8 ">
                <x-primary-button href="{{ route('folder_wisata.create') }}">
                    Tambah Tempat Wisata
                </x-primary-button>
            </div>

            <div class="text-gray-900">
                <div class="p-4 ">
                    @forelse ($wisatas as $wisata)
                        <a href="{{route('folder_wisata.show', [
                                'username'=> $wisata->user->username,
                                'wisata'=> $wisata->slug
                                ]) }}" 
                            class="mt-8 flex flex-col bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden max-w-xl mx-auto hover:bg-gray-100 transition-transform duration-300 hover:-translate-y-1 hover:shadow-md dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                            
                            <img class="w-full h-64 object-cover rounded-t-lg" src="{{ $wisata->imageUrl() }}" src="{{ $wisata->imageUrl() }}" alt="">

                            <div class="p-4">
                                <h5 class="mb-2 text-xl font-semibold text-gray-800 dark:text-white">
                                    {{$wisata->title}}
                                </h5>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    {{Str::words($wisata->content,20)}}
                                </p>
                            </div>
                        </a>
                    @empty
                        <div>
                            <p class="text-gray-900 text-gray-400 py-16"> Tidak Ditemukan Wisata Desa</p>
                        </div>
                    @endforelse
                    
                </div>

                  {{$wisatas->onEachSide(1)->links()}}
                </div>



        </div>
    </div>
</x-app-layout>
