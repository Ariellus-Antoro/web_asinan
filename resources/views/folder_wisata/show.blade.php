<x-app-layout>
    <div class="py-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <!-- Judul -->
                <h1 class="text-4xl font-bold mb-5 ">{{ $wisata->title }}</h1>


                @if($wisata->user_id === Auth::id())
                <div class="mt-8 py-4 ">
                    <x-primary-button href="{{ route('folder_wisata.edit', $wisata) }}"> 
                        Edit Wisata Desa
                    </x-primary-button>
                    <form class="inline-block" action="{{ route('folder_wisata.destroy', $wisata) }}" method="post">
                        @csrf
                        @method('delete')
                        
                        <x-danger-button>
                            Delete Wisata Desa
                        </x-danger-button>
                    </form>    

                </div>
                @endif

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
</x-app-layout>
