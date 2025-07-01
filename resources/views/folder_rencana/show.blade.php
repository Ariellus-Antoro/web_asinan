<x-app-layout>
    <div class="py-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <!-- Judul -->
                <h1 class="text-4xl font-bold mb-5 break-words">{{ $rencana->title }}</h1>

                <!-- Pembuat -->
                <div class="flex gap-5">
                    <img src="https://img.favpng.com/2/21/11/computer-icons-user-profile-user-account-clip-art-png-favpng-gDBjftHWJPTMjttnBiJh9vw96.jpg" alt="Avatar" class="w-15 h-10 rounded-full">

                    <div>
                        <h3> {{ $rencana->user->name }} </h3>
                        <span class="text-sm text-black/70">
                            {{ $rencana ->createdAt() }}
                        </span>
                    </div>


                </div>

                @if($rencana->user_id === Auth::id())
                <div class="mt-8 py-4 ">
                    <x-primary-button href="{{ route('folder_rencana.edit', $rencana) }}"> 
                        Edit Rencana
                    </x-primary-button>
                    <form class="inline-block" action="{{ route('folder_rencana.destroy', $rencana) }}" method="post">
                        @csrf
                        @method('delete')
                        
                        <x-danger-button>
                            Delete Rencana
                        </x-danger-button>
                    </form>    

                </div>
                @endif

                <!-- Content -->
                <div class="border-t mt-3">
                    <img src="{{ $rencana->imageUrl() }}" alt="" class="w-full mt-10">
                    
                    <div class="mt-5 text-lg text-gray-800 leading-relaxed break-words">
                        {{$rencana->content}}
                    </div>
                </div>

                
            </div>
        </div>
    </div>
</x-app-layout>
