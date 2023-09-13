<nav class="bg-slate-800 p-6 dark:text-slate-300">
    <div class=" container mx-auto flex justify-between items-center">
        <a href="/" class="text-white font-semibold text-5xl">Home</a>
        <div class="flex space-x-4">
            <a href="/about" class="text-white mt-2 text-2xl">About</a>
            @if (!Auth::check())
            <a href="{{route('login')}}" class="text-white mt-2">Login</a>
            <a href="{{route('register')}}" class="text-white mt-2">Register</a>
            @else
            <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center inline-flex items-center text-2xl dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">{{Auth::user()->name}} <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg></button>
            <!-- Dropdown menu -->
            <div id="dropdownHover"
                class="z-10 hidden bg-slate-700 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:text-slate-300 text-slate-300">
                <ul class="py-2 text-2xl text-gray-700 dark:text-slate-300" aria-labelledby="dropdownHoverButton">
                    <li>
                        <a href="{{route('make-post')}}"
                            class="block px-4 py-2 hover:bg-gray-500 text-slate-300 dark:hover:bg-gray-600 dark:hover:text-white">New
                            post</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-500 text-slate-300 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-500 text-slate-300 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                    </li>
                    <li>
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button type="submit"
                                class="block px-4 py-2 text-slate-300 hover:bg-gray-500 w-full dark:hover:bg-gray-600 dark:hover:text-white">Sign
                                out</button>
                        </form>
                    </li>
                </ul>
            </div>
            @endif
        </div>
    </div>
</nav>