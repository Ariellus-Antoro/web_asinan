<x-app-layout>
    <div class="py-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-3xl mb-5 break-words">
                Edit Rencana: <strong class="font-bold">{{ $rencana->title }}</strong>
             </h1>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <form action="{{ route('folder_rencana.update',$rencana)}}" enctype="multipart/form-data" method="POST">
                    
                    @csrf
                    @method('put')
                    @if($rencana->imageUrl())
                        <div class="mb-8">
                            <img src="{{ $rencana->imageUrl() }}" alt="$rencana->title" class="w-full">
                        </div>
                    @endif
                    
                    <!-- Image -->
                    <div>
                        <x-input-label for="image" :value="__('Image')" />
                        <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')"/>
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <!--Title -->
                    <div class="mt-4">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $rencana->title)" autofocus />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <!-- Content -->
                    <div class="mt-4">
                        <x-input-label for="content" :value="__('Content')" />
                        <x-text-input-textarea id="content" class="block mt-1 w-full" type="text" name="content">
                            {{old('content', $rencana->content)}}
                        </x-text-input-textarea>
                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>

                    <x-primary-button class="mt-6">
                        Submit
                    </x-primary-button>    

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
