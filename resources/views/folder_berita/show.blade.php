<x-app-layout>
    <div class="py-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <!-- Judul -->
                <h1 class="text-4xl font-bold mb-5 ">{{ $berita->title }}</h1>

                <!-- Pembuat -->
                <div class="flex gap-5">
                    <img src="https://img.favpng.com/2/21/11/computer-icons-user-profile-user-account-clip-art-png-favpng-gDBjftHWJPTMjttnBiJh9vw96.jpg" alt="Avatar" class="w-15 h-10 rounded-full">

                    <div>
                        <h3> {{ $berita->user->name }} </h3>
                        <span class="text-sm text-black/70">
                            {{ $berita ->createdAt() }}
                        </span>
                    </div>


                </div>

                @if($berita->user_id === Auth::id())
                <div class="mt-8 py-4 ">
                    <x-primary-button href="{{ route('folder_berita.edit', $berita) }}"> 
                        Edit Berita
                    </x-primary-button>
                    <form class="inline-block" action="{{ route('folder_berita.destroy', $berita) }}" method="post">
                        @csrf
                        @method('delete')
                        
                        <x-danger-button>
                            Delete Berita
                        </x-danger-button>
                    </form>    

                </div>
                @endif

                <!-- Content -->
                <div class="border-t mt-3">
                    <img src="{{ $berita->imageUrl() }}" alt="" class="w-full mt-10">
                    
                    <div class="mt-5 text-lg text-gray-800 leading-relaxed break-words">
                        {{$berita->content}}
                    </div>
                </div>

                
            </div>
        </div>
    </div>
</x-app-layout>
