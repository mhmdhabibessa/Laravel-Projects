

<header class="text-gray-100 bg-gray-900 body-font shadow w-full">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <nav class="flex lg:w-2/5 flex-wrap items-center text-base md:ml-auto">
                <a
                    class="mr-5 hover:text-gray-900 cursor-pointer border-b border-transparent hover:border-indigo-600">About</a>
                <a
                    class="mr-5 hover:text-gray-900 cursor-pointer border-b border-transparent hover:border-indigo-600">Products</a>
                <a class="mr-5 hover:text-gray-900 cursor-pointer border-b border-transparent hover:border-indigo-600">Investor
                    Relations</a>
                <a
                    class="hover:text-gray-900 cursor-pointer border-b border-transparent hover:border-indigo-600">Contact</a>
            </nav>
            <a
                class="flex order-first lg:order-none lg:w-1/5 title-font font-medium items-center lg:items-center lg:justify-center mb-4 md:mb-0">
                <img src="https://pazly.dev/logo.png" style="height: 40px; margin-top: 10px; margin-bottom: 10px;"
                    alt="logo">

                <span class="ml-3 text-xl">Laracast Test </span>
            </a>
            <div class="lg:w-2/5 inline-flex lg:justify-end ml-5 lg:ml-0">
                <!-- <a href="Login" class="bg-indigo-700 hover:bg-indigo-500 text-white ml-4 py-2 px-3 rounded-lg">
                    Login
                </a> -->
                @auth
                <span  class="bg-indigo-700 hover:bg-indigo-500 text-white ml-4 py-2 px-3 rounded-lg">  welcom back {{auth() ->user() ->name }}</span>
                        <form method="post" action="/Logout">
                            @csrf
                            <button type="submit" class="bg-indigo-700 hover:bg-indigo-500 text-white ml-4 py-2 px-3 rounded-lg"> Logout </button>
                        </form>
                @else
                <a href="/Show_register" class="bg-indigo-700 hover:bg-indigo-500 text-white ml-4 py-2 px-3 rounded-lg">Register  </a>
                <a href="/Login" class="bg-indigo-700 hover:bg-indigo-500 text-white ml-4 py-2 px-3 rounded-lg">Login  </a>

                @endauth
            </div>
        </div>

        
    </header>
    
    <div class="container"> 
            @yield('content')
    </div>