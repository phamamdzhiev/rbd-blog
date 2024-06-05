<header class="relative">
    <nav class="bg-white border-gray-">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class="self-center text-2xl font-semibold whitespace-nowrap">
                    {{config('app.name')}}
                </span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto">
                <ul class="font-medium flex flex-col p-3 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white">
                    <li>
                        <a href="/"
                           class="block py-1 px-3 text-gray-900 rounded md:bg-transparent">Home</a>
                    </li>
                    @auth('web')
                        <li class="block py-1 px-3 text-gray-900 rounded md:bg-transparent">
                            Hello, {{ auth('web')->user()?->name }}
                        </li>
                        <li class="block py-1 px-3 text-red-500 rounded md:bg-transparent">
                            <a href="{{ route('user.logout') }}">Logout</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('user.login') }}"
                               class="block py-1 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700">Login</a>
                        </li>
                        <li>
                            <a href="{{ route('user.register') }}"
                               class="block py-1 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>