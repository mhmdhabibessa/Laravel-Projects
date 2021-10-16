@extends('layouts.app')

@section('content')

    

            <!-- sections with 4 meals -->

<div class="flex justify-center items-center  mx-auto bg-gray-100">
    <form action="{{url('store')}}" method="post" class="w-full md:w-3/4 lg:w-3/6 p-4">

    @csrf
    
    
      
      <div class="p-3">
        <input class="block appearance-none placeholder-gray-500 placeholder-opacity-100 border border-light-blue-400 rounded-md w-full py-3 px-4 text-gray-700 leading-5 focus:outline-none focus:ring-2 focus:ring-light-blue-300" name="name" type="text" placeholder="Name" required>
      </div>
      <div class="p-3">
        <input class="block appearance-none placeholder-gray-500 placeholder-opacity-100 border border-light-blue-400 rounded-md w-full py-3 px-4 text-gray-700 leading-5 focus:outline-none focus:ring-2 focus:ring-light-blue-300"  name="price" type="number" placeholder="price" required>
      </div>
      <div class="p-3">
        <input class="block appearance-none placeholder-gray-500 placeholder-opacity-100 border border-light-blue-400 rounded-md w-full py-3 px-4 text-gray-700 leading-5 focus:outline-none focus:ring-2 focus:ring-light-blue-300" name="image" type="text" placeholder="image" required>
      </div>
      <div class="p-3">
        <textarea class="resize-none border rounded-md block appearance-none placeholder-gray-500 placeholder-opacity-100 border border-light-blue-400 rounded-md w-full py-3 px-4 text-gray-700 leading-5 focus:outline-none focus:ring-2 focus:ring-light-blue-300 h-56" name="description" placeholder="Description" required></textarea>
      </div>
      <div class="p-3 pt-4">
      <button class="w-full bg-yellow-900 hover:bg-red-500 text-white font-bold py-3 px-4 rounded text-2xl">
      Send
      </button>
      </div>
    </form>
</div>

      <!-- <a href="#" class="group">
        <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
          <img src="https://images.immediate.co.uk/production/volatile/sites/30/2020/08/chorizo-mozarella-gnocchi-bake-cropped-9ab73a3.jpg" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="w-full h-full object-center object-cover group-hover:opacity-75">
        </div>
        <h3 class="mt-4 text-sm text-gray-700">
          Earthen Bottle
        </h3>
        <p class="mt-1 text-lg font-medium text-gray-900">
          $48
        </p>
      </a> -->
      
     
     

      <!-- More products... -->
    </div>
  </div>
</div>

                    <!-- menu button -->

 
        
               
            
               
            
        



@endsection


