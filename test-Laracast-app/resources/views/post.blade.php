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
                    {{$post -> category -> name}}
                   
                </div>
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
        <div class="md:flex md:items-center">
                <div class="w-full h-64 md:w-1/2 lg:h-96">
           
                    <img class="h-full w-full rounded-md object-cover max-w-lg mx-auto" src="{{$post -> category -> link_photo}}">
                </div>
                <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">
                    <h3 class="text-gray-700 uppercase text-lg">{{$post -> category -> name}}</h3>
                  
                    <hr class="my-3">
                     
                    <div class="mt-2">
                        <label class="text-gray-700 text-sm" for="count">Count:</label>
                        <div class="flex items-center mt-1">
                            <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </button>
                            <span class="text-gray-700 text-lg mx-2">20</span>
                            <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </button>
                        </div>
                    </div>
                    <div class="mt-3">
                        
                    </div>
                   
                </div>
            </div>
            <div class="mt-16">
                
                <h3 class="text-gray-600 text-2xl font-medium">More Products</h3>
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
                        <article>   
                                  @foreach($post -> comment as $comment)
                                  <p class="text-green-800"> {{$comment -> body}} </p>
                                  <p class="text-red-500"> By: {{$comment-> author ->username  }}</p>
                                  <p class="text-red-900">  At {{$comment-> created_at -> diffForHumans() }}</p>
                                </article>
                                @endforeach
                                    <div class="mt-5">
                                                <form method="POST" action="/posts/{{$post -> id}}/comment" > 
                                                    @csrf
                                                <label for=""> <input 
                                                type="text"
                                                class="w-full"
                                                name ="body"
                                                placeholder="You Can Write Comment Now">   </label>
                                                <button class="w-full mt-5 px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"> Post </button>
                                            </form>
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