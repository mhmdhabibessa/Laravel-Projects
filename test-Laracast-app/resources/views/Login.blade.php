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
            <body class="font-mono bg-gray-400">
		<!-- This is an example component -->
        <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    />
<div class="bg-blue-200 flex">
  <div class="flex-col flex ml-auto mr-auto items-center w-full lg:w-2/3 md:w-3/5">
    <h1 class="font-bold text-2xl my-10 text-white"> Login </h1>
 <form method="post" action="/SessionLogin" class="mt-2 flex flex-col lg:w-1/2 w-8/12">
     @csrf
          <div class="flex flex-wrap items-stretch w-full mb-4 relative h-15 bg-white items-center rounded mb-6 pr-10">
            <div class="flex -mr-px justify-center w-15 p-4">
              <span
                class="flex items-center leading-normal bg-white px-3 border-0 rounded rounded-r-none text-2xl text-gray-600"
              >
                <i class="fas fa-user-circle"></i>
              </span>
            </div>
            <input
              type="email"
              class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border-0 h-10 border-grey-light rounded rounded-l-none px-3 self-center relative  font-roboto text-xl outline-none"
              placeholder="email"
              name="email"
            />
           
          </div>
          @error('email')
            <p class="text-red-500 text-xs mt-1">  {{$message}} </p> 
            @enderror
          <div class="flex flex-wrap items-stretch w-full relative h-15 bg-white items-center rounded mb-4">
          <div class="flex -mr-px justify-center w-15 p-4">
              <span
                class="flex items-center leading-normal bg-white px-3 border-0 rounded rounded-r-none text-2xl text-gray-600"
              >
                <i class="fas fa-user-circle"></i>
              </span>
            </div>
            <input
              type="password"
              class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border-0 h-10 border-grey-light rounded rounded-l-none px-3 self-center relative  font-roboto text-xl outline-none"
              placeholder="password"
              name="password"
            />
            
          </div>
          @error('password')
            <p class="text-red-500 text-xs mt-1">  {{$message}} </p> 
            @enderror
          <button
          href="/"
            class="bg-blue-400 py-4 text-center px-17 md:px-12 md:py-4 text-white rounded leading-tight text-xl md:text-base font-sans mt-4 mb-20"
          >
            Login
        </button>
        </form>
</div>















</div>



    </body>
</html>
@endsection