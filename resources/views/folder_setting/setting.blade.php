<x-app-layout>
<div>
    <div class="p-4">
        <div class="bg-white overflow-hidden shadow-sm">
            <h2 class="text-xl md:text-3xl font-bold p-5">
                LOGO
            </h2>

            <div class="flex gap-10 pl-5 pr-5 pb-5">
                <img src="{{ $logoUrl}}" alt="#" class="h-12 w-auto fill-current">

                <form action="{{ route('folder_setting.update')}}" enctype="multipart/form-data" method="POST" class="w-full">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')"/>
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <x-primary-button class="mt-10">
                        Submit
                    </x-primary-button>  
                </form>
 
            </div>

        </div>
    </div>

    <div class="bg-white overflow-hidden shadow-sm">
        <h1 class="text-xl md:text-3xl font-bold p-5">
            FEATURED VIDEO
        </h1>

        <div class="flex flex-col items-start px-5 pb-8">

            <div class="w-full max-w-2xl">

                <div class="relative aspect-video mb-6">
                    <iframe
                        class="absolute inset-0 w-full h-full rounded-lg shadow"
                        src="https://www.youtube.com/embed/{{ $featured_video }}"
                        title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div>

                <form action="{{ route('folder_setting.updateVideo') }}" method="POST" class="w-full">
                    @csrf
                    @method('PUT')

                    <div class="mt-4">
                        <x-input-label for="video_url" :value="__('Ganti Featured Video')" />
                        <x-text-input id="video_url" class="block mt-1 w-full" type="text" name="video_url" :value="old('video_url')" autofocus />
                        <x-input-error :messages="$errors->get('video_url')" class="mt-2" />
                    </div>

                    <x-primary-button class="mt-6">
                        Submit
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>

    <div class="p-4">
        <div class="bg-white overflow-hidden shadow-sm">
            <h1 class="text-xl md:text-3xl font-bold p-5">
                CONTACT PERSON
            </h1>


            <div class="pl-5 pr-5 pb-5">
                <form action="{{ route('folder_setting.updateContact')}}" enctype="multipart/form-data" method="POST" class="w-full">

                    <p class="text-lg mb-5">Nama Pemilik Kontak : {{ $contact_name }} </p>
                    <p class="text-lg mb-5"> Nomor Kontak : <a href="{{ $contact_phone }} " class="text-blue-600 hover:underline"> {{ $contact_phone }}</a> </p>
                    @csrf
                    @method('PUT')

                    <div class="mt-4">
                        <x-input-label for="contact_name" :value="__('Ganti Nama Kontak')" />
                        <x-text-input id="contact_name" class="block mt-1 w-full" type="text" name="contact_name" :value="old('contact_name')" autofocus />
                        <x-input-error :messages="$errors->get('contact_name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="contact_phone" :value="__('Ganti Kontak')" />
                        <x-text-input id="contact_phone" class="block mt-1 w-full" type="text" name="contact_phone" :value="old('contact_phone')" autofocus />
                        <x-input-error :messages="$errors->get('contact_phone')" class="mt-2" />
                    </div>

                    <x-primary-button class="mt-10">
                        Submit
                    </x-primary-button>  
                </form>
 
            </div>
        </div>


    </div>
</div>
</x-app-layout> 