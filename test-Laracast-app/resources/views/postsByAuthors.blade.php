<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Document</title>
         <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
    </head>
    <body class="antialiased">
        
            @extends('layouts.nav')
            @section('content')

            <!-- slider on our web site  -->
       

           

<div x-data="{ cartOpen: false , isOpen: false }" class="bg-white">
    <header>
        
        <div class="container mx-auto px-6 py-3">
            @foreach($posts as $post)  
            <div class="flex items-center justify-between">
            
                <div class="w-full text-gray-700 md:text-center text-2xl font-semibold">
                    All Posted By : <span> {{$post -> author -> name}}  </span>
                      
                </div>
                <svg class="animate-bounce w-6 h-6 ..."> </svg>
                <!-- @endforeach    -->
            </div>

            <div class="relative mt-6 max-w-lg mx-auto">
                <form method="GET" action="#">

                <input class="w-full border rounded-md pl-10 pr-4 py-2 focus:border-blue-500 focus:outline-none focus:shadow-outline" type="text"  name="search" placeholder="Search">
                </form> 
            </div>

        </div>
    </header>       
    </div> 

    <main class="my-8">
        <div class="container mx-auto px-6">
       
            <div class="mt-16">
                
                <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 mt-6">
                @foreach($posts as $post)
                    <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                        <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('{{$post ->link_photo}}')">
                        </div>
                    <div class="px-5 py-3">
                            <h3 class="text-gray-700 uppercase">{{$post->title}}</h3>
                            <span class="text-gray-500 mt-2">{{$post->discription}}</span> <br> <br>
                        <div class="border-double border-4 border-light-blue-500  ">
                            <a href="{{ route('postsByAuthors.show',['author' => $post] ) }}"> Posted By  : <span class="text-blue-900 mt-2">{{$post->author->name}}</a>
                            <span> At </span>
                            <span class="text-blue-500 mt-1 ">    {{$post -> created_at -> diffForHumans()}} </span> </span> 
                        </div>
                    </div>
                    
                </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
   

</div>


    </body>
</html>
@endsection