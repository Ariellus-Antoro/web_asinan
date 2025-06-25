<ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-400 justify-center">
    <li class="me-2">
        <a href="{{ route('berita') }}" class="inline-block px-4 py-2 rounded-lg 
            {{ request('category') ? 
                'hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white' : 
                'text-white bg-blue-600' }}">
            All
        </a>
    </li>

    @foreach ($categories as $category)
        <li class="me-2">
            <a href="{{ route('berita.byCategory', $category) }}"
                class="
                    inline-block px-4 py-2 rounded-lg 
                    {{ Route::currentRouteNamed('berita.byCategory') && request('category')->id == $category->id 
                        ? 'text-white bg-blue-600' 
                        : 'hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white' }}">
                {{ $category->name }}
            </a>
        </li>
    @endforeach
</ul>