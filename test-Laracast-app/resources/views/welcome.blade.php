<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     
    
    </head>
    <body class="antialiased">
        
            @extends('layouts.nav')
            @section('content')

            <!-- slider on our web site  -->
        <div class="sliderAx h-auto">
      <div id="slider-1" class="container mx-auto">
        <div class="bg-cover bg-center  h-auto text-white py-24 px-10 object-fill" style="background-image: url(https://images.unsplash.com/photo-1544427920-c49ccfb85579?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1422&q=80)">
       <div class="md:w-1/2">
        <p class="font-bold text-sm uppercase">Services</p>
        <p class="text-3xl font-bold">Hello world</p>
        <p class="text-2xl mb-10 leading-none">Carousel with TailwindCSS and jQuery</p>
        <a href="#" class="bg-purple-800 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">Contact us</a>
        </div>  
    </div> <!-- container -->
      <br>
      </div>

      <div id="slider-2" class="container mx-auto">
        <div class="bg-cover bg-top  h-auto text-white py-24 px-10 object-fill" style="background-image: url(https://images.unsplash.com/photo-1544144433-d50aff500b91?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80)">
       
  <p class="font-bold text-sm uppercase">Services</p>
        <p class="text-3xl font-bold">Hello world</p>
        <p class="text-2xl mb-10 leading-none">Carousel with TailwindCSS and jQuery</p>
        <a href="#" class="bg-purple-800 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">Contact us</a>
         
    </div> <!-- container -->
      <br>
      </div>
    </div>
 <div  class="flex justify-between w-12 mx-auto pb-2">
        <button id="sButton1" onclick="sliderButton1()" class="bg-purple-400 rounded-full w-4 pb-2 " ></button>
    <button id="sButton2" onclick="sliderButton2() " class="bg-purple-400 rounded-full w-4 p-2"></button>
  </div>

  <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-4 mb-12">
  <div class="relative mt-6 max-w-lg mx-auto">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                    <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </span>
                <form  method="GET" action="#">
                <input class="w-full border rounded-md pl-10 pr-4 py-2 focus:border-blue-500 focus:outline-none focus:shadow-outline" 
                    type="text" 
                    name="search" 
                    placeholder="Search" 
                    value="{{request('search')}}"
                >
                </form>
            </div>
    <article>
        
        <h2 class="text-2xl font-extrabold text-gray-900">Categoory</h2>
        
        <section class="mt-6 grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-x-6 gap-y-8">
            
        @foreach($categories as $category)  
     
            <article class="relative w-full h-64 bg-cover bg-center group rounded-lg overflow-hidden shadow-lg hover:shadow-2xl  transition duration-300 ease-in-out"
                style="background-image: url({{$category -> link_photo}})">
                <div class="absolute inset-0 bg-black bg-opacity-50 group-hover:opacity-75 transition duration-300 ease-in-out"></div>
                <div class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex justify-center items-center">
                    <h3 class="text-center">
                        <a class="text-white text-2xl font-bold text-center" href="{{ route('category.show',['category' => $category] )    }}" >
                            <span class="absolute inset-0"></span>
                            {{$category ->name }}
                            
                        </a> <br>
                       
                    </h3>
                </div>
            </article>            
            @endforeach

        </section>
                
    </article> <br>
    {{$categories->links ()}}
</section>

        @if (session() -> has('success') )

                <div class="fixed bg-green-500 text-white py-2 rounded-xl bottom-3 right-3 text-sm"> {{ session('success') }} </div>
        @endif        


    </body>



    <footer class="flex justify-center px-4 text-gray-100 bg-gray-800">
        <div class="container py-6">
        <form action="">
            <div class="flex justify-center mt-6">
                <div class="bg-white rounded-lg">
                    <div class="flex flex-wrap justify-between md:flex-row">
                        <input type="email" class="m-1 p-2 appearance-none text-gray-700 text-sm focus:outline-none" placeholder="Enter your email">
                        <button class="w-full m-1 p-2 text-sm bg-gray-800 rounded-lg font-semibold uppercase lg:w-auto">subscribe</button>
                    </div>
                </div>
            </div>
            </form>

    </footer>





</html>
@endsection