<nav class="bg-white fixed w-full top-0 left-0 z-50 border-b border-gray-100 shadow-sm">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <!-- Logo -->
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse ">
            <x-application-logo class="h-8 w-auto fill-current text-gray-800 rounded-full" />
        </a>

        <!-- Mobile menu toggle button -->
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg 
                   md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 
                   "
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>

        <!-- Navigation Links -->
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
                class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-xl bg-gray-50 
                       md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white 
                       ">
                
                <li>
                    <a href="{{route('index')}}"
                       class=" {{ request()->is('user') 
            ? 'text-blue-600 font-bold' 
            : 'text-gray-900 hover:text-blue-600' }} block py-2 px-4 text-gray-900 font-extrabold hover:text-blue-600 transform hover:scale-105 transition ">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{route('folder_user.wisata')}}"
                       class=" {{ request()->is('user/wisata*') 
            ? 'text-blue-600 font-bold' 
            : 'text-gray-900 hover:text-blue-600' }} block py-2 px-4 text-gray-900 font-extrabold hover:text-blue-600 transform hover:scale-105 transition ">
                        Tempat Wisata
                    </a>
                </li>
                <li>
                    <a href="{{route('folder_user.paket_wisata')}}"
                       class=" {{ request()->is('user/paket_wisata*') 
            ? 'text-blue-600 font-bold' 
            : 'text-gray-900 hover:text-blue-600' }} block py-2 px-4 text-gray-900 font-extrabold hover:text-blue-600 transform hover:scale-105 transition">
                        Paket Wisata
                    </a>
                </li>
                <li>
                    <a href="{{route('folder_user.berita')}}"
                       class=" {{ request()->is('user/berita*') 
            ? 'text-blue-600 font-bold' 
            : 'text-gray-900 hover:text-blue-600' }} block py-2 px-4 text-gray-900 font-extrabold hover:text-blue-600 transform hover:scale-105 transition">
                        Berita
                    </a>
                </li>
                <li>
                    <a href="{{route('folder_user.rencana')}}"
                       class=" {{ request()->is('user/rencana*') 
            ? 'text-blue-600 font-bold' 
            : 'text-gray-900 hover:text-blue-600' }} block py-2 px-4 text-gray-900 font-extrabold hover:text-blue-600 transform hover:scale-105 transition">
                        Rencana
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
