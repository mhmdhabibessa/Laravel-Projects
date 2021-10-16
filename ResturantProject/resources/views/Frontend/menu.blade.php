@extends('layouts.app')

@section('content')

    

            <!-- sections with 4 meals -->
            
<div class="bg-white">
  
    <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
   
        <h2 class="sr-only">Products</h2>

        

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



    

                    <!-- menu button -->

 
        
               
            
               
            
        



@endsection


