<x-app-layout>
    <div class="py-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
             <!-- Category -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900">
                    <x-category-tabs />  
                </div>
            </div>
            <!-- Button Tambah -->
            <div class="flex mt-8 ">
            <a href="{{route('folder_berita.create')}}">
                <x-primary-Button>
                    Tambah Berita
                </x-primary-Button>
            </a>
            </div>


             <!-- Content-->
            <div class="text-gray-900">
                <div class="p-4 ">
                    @forelse ($beritas as $berita)
                        <div class="flex bg-white border border-gray-200 rounded-lg shadow-sm mb-8 ">

                            <div class="p-5 flex-1">
                                <a href=" {{route('folder_berita.show', [
                                'username'=> $berita->user->username,
                                'berita'=> $berita->slug
                                ]) }}">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 break-all">
                                        {{$berita->title}}
                                    </h5>
                                </a>
                                <div class="mb-3 font-normal text-gray-700 break-all">
                                    {{Str::words($berita->content,15)}}
                                </div>
                                <a href="{{route('folder_berita.show', [
                                'username'=> $berita->user->username,
                                'berita'=> $berita->slug
                                ]) }}" class="text-sm text-gray-400">
                                    {{ $berita ->createdAt() }}
                                </a>
                            </div>
                            <a href="{{route('folder_berita.show', [
                                'username'=> $berita->user->username,
                                'berita'=> $berita->slug
                                ]) }}">
                                <img class=" w-48 h-full max-h-64 object-cover rounded-r-lg" src="{{ $berita->imageUrl() }}" alt="" />
                            </a>
                        </div>

                    @empty
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                Tidak Ditemukan Berita
                            </div>
                        </div>

                    @endforelse
                </div>

                {{$beritas->onEachSide(1)->links()}}
            </div>
        </div>
    </div>
</x-app-layout>
