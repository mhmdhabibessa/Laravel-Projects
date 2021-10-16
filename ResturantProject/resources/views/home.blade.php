@extends('layouts.app')

@section('content')
<div class="container">
    
<div class="relative bg-white overflow-hidden">
  <div class="max-w-7xl mx-auto">
    <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
      <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
        <polygon points="50,0 100,0 50,100 0,100" />
      </svg>

      <div>
        <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
          
              
            
        <div class="absolute z-10 top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
        
        
        </div>
      </div>

      <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
        <div class="sm:text-center lg:text-left">
          <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
            <span class="block xl:inline">Data to enrich your</span>
            <span class="block text-yellow-600 xl:inline">online business</span>
          </h1>
          <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
            Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.
          </p>
          <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
            <div class="rounded-md shadow">
              <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-yellow-900 hover:bg-red-800 md:py-4 md:text-lg md:px-10">
                Get started
              </a>
            </div>
            <div class="mt-3 sm:mt-0 sm:ml-3">
              <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 md:py-4 md:text-lg md:px-10">
                Live demo
              </a>
            </div>
          </div>
        </div>
      </main>
        </div>
  </div>
  <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
    <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="https://images.squarespace-cdn.com/content/v1/5d3e304ad610b90001e45bde/1610659557734-WC3B8DGG3UZ0K4SWB9VN/43381604_thaihut_hero.jpg?format=1000w" alt="">
  </div>
</div>
 

</div>
            <!-- sections with 4 meals -->


<div class="bg-gray-100 ">
  <div class="max-w-8xl mx-auto  px-5 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto  py-16 sm:py-24 lg:py-32 lg:max-w-none">
      <h2 class="text-2xl font-extrabold text-gray-900">sections with 4 meals</h2>
        
      <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
        @foreach($products as $products)  
        <a  class="group">
          
          <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
            <img src="{{$products -> image}}"  alt="{{$products -> name}}" class="w-full h-full object-center object-cover group-hover:opacity-75">
          </div>
          <h3 class="mt-1 text-lg font-medium text-gray-900">
            
          {{$products -> name}}
          </h3>
          <p class="mt-2 text-lg text-gray-800">
          {{$products -> price}} $
          </p>
          <p class="mt-1 text-lg font-medium text-gray-900">
          {{$products -> description}}
          </p>
        </a>
        @endforeach        
         </div>
        
        
        
      </div>
    </div>
  </div>

  <!-- menu button -->

   <div class=" text-center ">
            <a href="/menu" class="inline-flex  px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-yellow-700 hover:bg-red-900">   Menu ...</a>
    </div>
</div>
  
    <!-- contact us -->
<div class="container mx-auto px-4 lg:pt-24 lg:pb-64"> 
    <div class="flex flex-wrap text-center justify-center">
        <div class="w-full lg:2-6/12 px-4">
            <a href="/contact_us" class="text-4xl non-underline font-semeblod text white" > contact Us</a>
            <p class="text-lg leading-relaxed mt-4 mb-4" >   You Can contact Us to ask any questions and talk about out website #Resturant Task# </p>
        </div>
        
    </div>    
</div>
<!-- ------------------------------ -->

 
        
               
            
               
            
        
    <!-- footer we extend it from the app  -->






@endsection


