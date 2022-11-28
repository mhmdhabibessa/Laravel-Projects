<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <title>Laravel From Scratch Blog</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>


<body class="bg-gray-100 h-screen">
    <div class="ml-10 mr-10">
        <nav class="border-gray-200 px-2 sm:px-4 py-2.5 border-solid border-b-2 border-gray-400  dark:bg-gray-900">
            <div class="container  flex flex-wrap items-center justify-between mx-auto">
                <div class=" items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-search">
                    <div class="relative mt-3 md:hidden sm:display-flex ">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5  text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" id="search-navbar" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search...">
                    </div>
                    <ul class="flex flex-col p-4 mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0  dark:bg-gray-800  dark:border-gray-700">
                        <li>
                            <a href="/about-us" class="block py-2 pl-3 pr-4 text-black  hover:text-yellow-500  text-gray-700 md:p-0 dark:text-white" aria-current="page">About Us ?</a>
                        </li>
                        <li>
                            <a href="/contact-us" class="block py-2 pl-3 pr-4 text-black  hover:text-yellow-500 md:hover:bg-transparent md:p-0 ">contact-us</a>
                        </li>
                    </ul>
                </div>
                <div class="flex md:order-2">
                    <div class="relative  md:block">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Search icon</span>
                        </div>
                        <input type="text" id="search-navbar" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search...">
                    </div>
                    <div class="flex justify-center mt-2 md:ml-4 ml-40 space-x-4 text-gray-700">
                        <!-- Instagram -->

                        <a href="" class="">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 16C13.0609 16 14.0783 15.5786 14.8284 14.8284C15.5786 14.0783 16 13.0609 16 12C16 10.9391 15.5786 9.92172 14.8284 9.17157C14.0783 8.42143 13.0609 8 12 8C10.9391 8 9.92172 8.42143 9.17157 9.17157C8.42143 9.92172 8 10.9391 8 12C8 13.0609 8.42143 14.0783 9.17157 14.8284C9.92172 15.5786 10.9391 16 12 16V16Z" stroke="#3B3D3B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M3 16V8C3 6.67392 3.52678 5.40215 4.46447 4.46447C5.40215 3.52678 6.67392 3 8 3H16C17.3261 3 18.5979 3.52678 19.5355 4.46447C20.4732 5.40215 21 6.67392 21 8V16C21 17.3261 20.4732 18.5979 19.5355 19.5355C18.5979 20.4732 17.3261 21 16 21H8C6.67392 21 5.40215 20.4732 4.46447 19.5355C3.52678 18.5979 3 17.3261 3 16Z" stroke="#3B3D3B" stroke-width="1.5" />
                                <path d="M17.5 6.51002L17.51 6.49902" stroke="#3B3D3B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        <!-- Youtube -->
                        <a href="">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14 12L10.5 14V10L14 12Z" stroke="#3B3D3B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M2 12.707V11.292C2 8.39702 2 6.94902 2.905 6.01802C3.811 5.08602 5.237 5.04602 8.088 4.96502C9.438 4.92702 10.818 4.90002 12 4.90002C13.181 4.90002 14.561 4.92702 15.912 4.96502C18.763 5.04602 20.189 5.08602 21.094 6.01802C22 6.94902 22 8.39802 22 11.292V12.707C22 15.603 22 17.05 21.095 17.982C20.189 18.913 18.764 18.954 15.912 19.034C14.562 19.073 13.182 19.1 12 19.1C10.819 19.1 9.439 19.073 8.088 19.034C5.237 18.954 3.811 18.914 2.905 17.982C2 17.05 2 15.602 2 12.708V12.707Z" stroke="#3B3D3B" stroke-width="1.5" />
                            </svg>
                        </a>

                        <!-- Twitter -->
                        <a href="">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M23 3.00999C23 3.00999 20.982 4.20199 19.86 4.53999C19.2577 3.84751 18.4573 3.35669 17.567 3.13392C16.6767 2.91116 15.7395 2.96719 14.8821 3.29445C14.0247 3.62171 13.2884 4.2044 12.773 4.96371C12.2575 5.72303 11.9877 6.62233 12 7.53999V8.53999C10.2426 8.58556 8.50127 8.19581 6.93101 7.40544C5.36074 6.61507 4.01032 5.44863 3 4.00999C3 4.00999 -1 13.01 8 17.01C5.94053 18.408 3.48716 19.1089 1 19.01C10 24.01 21 19.01 21 7.50999C21 7.23199 20.972 6.95399 20.92 6.67999C21.94 5.67399 23 3.00999 23 3.00999Z" stroke="#3B3D3B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        <!-- Facebook -->
                        <a href="">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 8V16C21 17.3261 20.4732 18.5979 19.5355 19.5355C18.5979 20.4732 17.3261 21 16 21H8C6.67392 21 5.40215 20.4732 4.46447 19.5355C3.52678 18.5979 3 17.3261 3 16V8C3 6.67392 3.52678 5.40215 4.46447 4.46447C5.40215 3.52678 6.67392 3 8 3H16C17.3261 3 18.5979 3.52678 19.5355 4.46447C20.4732 5.40215 21 6.67392 21 8Z" stroke="#3B3D3B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M11 21V12C11 9.812 11.5 8 15 8M9 13H15" stroke="#3B3D3B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="flex mt-1 border-gray-400">
            <section class="mx-auto">
                <!-- logo -->
                <nav class="flex justify-between border-solid text-white">
                    <div class="px-5 xl:px-12 py-6 flex w-full items-center">
                        <a href="/">
                            <img src="/images/Frame.svg" alt="">
                        </a>
                    </div>
                </nav>
            </section>
        </div>
        <div class="flex mt-4 border-b-2 border-t-2 border-gray-400">
            <section class="relative mx-auto">
                <!-- navbar -->
                <nav class="flex justify-between border-solid text-white">
                    <div class="px-5 xl:px-12 py-6 flex w-full items-center">
                        <ul class="flex space-x-6  md:flex px-4 mx-auto font-semibold font-heading">
                            <li><a class="text-gray-900 hover:text-yellow-500" href="#">Home</a></li>
                            <li><a class="text-gray-900 hover:text-yellow-500" href="#">Articles</a></li>
                            <li><a class="text-gray-900 hover:text-yellow-500" href="#">News</a></li>
                            <li><a class="text-gray-900 hover:text-yellow-500" href="#">Activity</a></li>
                            <li><a class="text-gray-900 hover:text-yellow-500" href="#">Store</a></li>
                            <li><a class="text-gray-900 hover:text-yellow-500" href="#">Artists</a></li>
                        </ul>
                    </div>
                </nav>
            </section>
        </div>


        <div class="md:flex md:mt-4 mt-4 sm:grid sm:grid-cols-1">
            <div class="">
                <div class="bg-white p-2 mb-2 ">
                    <h1 class="text-xl">Articels</h1>
                </div>
                <div class="md:flex  sm:grid sm:grid-cols-1 bg-white p-4 justify-between">
                    <div class="mt-2">
                        <h1 class="font-bold text-l">Room 14: Ink when it leads to blood and people </h1>
                        <p class="text-base mt-2">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident et consequatur doloremque doloribus, fugiat necessitatibus iste ab. Inventore deleniti harum vel sapiente, optio, eius facere facilis ipsam aut saepe earum?
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis quia exercitationem expedita doloribus! Itaque excepturi illum saepe repellendus. Temporibus fugiat maxime repudiandae enim autem mollitia quis cumque. Impedit, blanditiis deleniti.</p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Enim voluptatem vel culpa amet quod tempore doloremque sed cupiditate ratione optio, assumenda asperiores, ad dignissimos ullam, praesentium recusandae itaque unde reiciendis.
                        <div class="flex justify-between">
                            <div class="flex m-1 mt-4">
                                <img src="images/author.png" alt="">
                                <span class="ml-2 text-base text-yellow-500">Abdallhaa.Mufleh</span>
                            </div>

                            <div class="flex mt-4 mr-4">
                                <span class="mt-1 mr-2"> <img src="images/Date.png" alt=""> </span>
                                <span class="text-gray-500 text-center text-base "> Date: 20/10/2010 </span>
                            </div>
                        </div>
                        <br>
                        <button class="border-2 border-black rounded-lg p-1 mt-2 hover:bg-gray-300 hover:text-yellow-500">
                            More Details
                        </button>
                    </div>
                    <div class="mt-4 w-full">
                        <img src="images/Langing.png" class="right-0 h-full object-fill h-48" alt="">
                    </div>
                </div>
            </div>
            <div>
                <div class="md:w-72  md:ml-8">
                    <div class="bg-white  p-2 mb-2 md:mt-0 mt-4">
                        <h1 class="text-xl">About us ? </h1>
                    </div>
                    <div class="bg-white">
                        <div class="px-5 xl:px-12 py-6 flex w-full  items-center md:ml-0 ml-32">
                            <a href="/">
                                <img src="/images/Frame.svg" height="150px" width="150px" alt="">
                            </a>
                        </div>
                        <p class="p-4">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime quasi laborum quam libero dolor, provident ullam vero commodi laboriosam eveniet earum dignissimos, consectetur itaque neque pariatur explicabo aliquid atque facere?
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </div>



    <!-- footer -->
    <footer class="p-4 bg-gray-900 sm:p-6 dark:bg-gray-900 mt-24">
        <div class="md:flex md:justify-between">
            <div class="mb-6 md:mb-0 sm:mr-10">
                <img src="images/Frame.svg" width="200" height="200" alt="ArtFromPlaestine">
            </div>
            <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-100 uppercase dark:text-white">Links</h2>
                    <ul class="text-gray-500 dark:text-gray-400">
                        <li class="mb-4">
                            <a class="hover:text-yellow-500">Artists</a>
                        </li>
                        <li>
                            <a class="hover:text-yellow-500">Store</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-100 uppercase dark:text-white">Pages</h2>
                    <ul class="text-gray-500 dark:text-gray-400">
                        <li class="mb-4">
                            <a href="/about-us" class="hover:text-yellow-400">About Us</a>
                        </li>
                        <li>
                            <a href="/contact-us" class="hover:text-yellow-400">Contact us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <div class="sm:flex sm:items-center sm:justify-between">
            <span class="text-sm text-gray-400 sm:text-center dark:text-gray-400">© 2023
                <a class="hover:underline">ArtFromPlaestine</a>. All Rights Reserved.
            </span>
            <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
                <a href="#" class="text-gray-100 hover:text-yellow-400 dark:hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Facebook page</span>
                </a>
                <a href="#" class="text-gray-100 hover:text-yellow-400 dark:hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Instagram page</span>
                </a>
                <a href="#" class="text-gray-100 hover:text-yellow-400 dark:hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                    </svg>
                    <span class="sr-only">Twitter page</span>
                </a>


            </div>
        </div>
    </footer>
</body>

</html>