<x-app-layout>

    <div class="py-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Button Tambah -->
            <div class="flex mt-8 ">
                <x-primary-button href="{{ route('folder_rencana.create') }}">
                    Tambah Rencana
                </x-primary-button>
            </div>

            <!-- Content-->
            <div class="text-gray-900">
                <div class="p-4 ">
                    @forelse ($rencanas as $rencana)
                        <div class="flex bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 mb-8">

                            <div class="p-5 flex-1">
                                <a href=" {{route('folder_rencana.show', [
                                'username'=> $rencana->user->username,
                                'rencana'=> $rencana->slug
                                ]) }}">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{$rencana->title}}
                                    </h5>
                                </a>
                                <div class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                    {{Str::words($rencana->content,20)}}
                                </div>
                                <a href="{{route('folder_rencana.show', [
                                'username'=> $rencana->user->username,
                                'rencana'=> $rencana->slug
                                ]) }}" class="text-sm text-gray-400">
                                    {{ $rencana ->createdAt() }}
                                </a>
                            </div>
                            <a href="{{route('folder_rencana.show', [
                                'username'=> $rencana->user->username,
                                'rencana'=> $rencana->slug
                                ]) }}">
                                <img class=" w-48 h-full max-h-64 object-cover rounded-r-lg" src="{{ $rencana->imageUrl() }}" alt="" />
                            </a>
                        </div>

                    @empty
                        <div>
                            <p class="text-gray-900 text-gray-400 py-16"> Tidak Ditemukan Rencana Desa</p>
                        </div>

                    @endforelse
                </div>

                {{$rencanas->onEachSide(1)->links()}}
            </div>

        </div>
    </div>
</x-app-layout>
