
<div class="flex justify-center items-center  mx-auto bg-gray-100">
    <form action="{{url('store_category')}}" method="post" class="w-full md:w-3/4 lg:w-3/6 p-4">

    @csrf
    
    
      
      <div class="p-3">
        <input class="block appearance-none placeholder-gray-500 placeholder-opacity-100 border border-light-blue-400 rounded-md w-full py-3 px-4 text-gray-700 leading-5 focus:outline-none focus:ring-2 focus:ring-light-blue-300" name="name" type="text" placeholder="Name" required>
      </div>
      
      <div class="p-3">
        <input class="block appearance-none placeholder-gray-500 placeholder-opacity-100 border border-light-blue-400 rounded-md w-full py-3 px-4 text-gray-700 leading-5 focus:outline-none focus:ring-2 focus:ring-light-blue-300" name="link_photo" type="text" placeholder="image" required>
      </div>
    
      <div class="p-3 pt-4">
      <button class="w-full bg-blue-900 hover:bg-red-500 text-white font-bold py-3 px-4 rounded text-2xl">
      Crate Category
      </button>
      </div>
    </form>
</div>

<div class="container">
@yield('content')
</div>