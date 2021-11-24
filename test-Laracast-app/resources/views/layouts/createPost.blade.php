
<div class="flex justify-center items-center  mx-auto bg-gray-100">
    <form action="{{url('store_post')}}" method="post" class="w-full md:w-3/4 lg:w-3/6 p-4">

    @csrf
    
    
      
      <div class="p-3">   
        <input class="block appearance-none placeholder-gray-500 placeholder-opacity-100 border border-light-blue-400 rounded-md w-full py-3 px-4 text-gray-700 leading-5 focus:outline-none focus:ring-2 focus:ring-light-blue-300" name="title" type="text" placeholder="title" required>
      </div>
      <div class="p-3">
        <input class="block appearance-none placeholder-gray-500 placeholder-opacity-100 border border-light-blue-400 rounded-md w-full py-3 px-4 text-gray-700 leading-5 focus:outline-none focus:ring-2 focus:ring-light-blue-300" name="discription" type="text" placeholder="discription" required>
      </div>
      <div class="p-3">
        <input class="block appearance-none placeholder-gray-500 placeholder-opacity-100 border border-light-blue-400 rounded-md w-full py-3 px-4 text-gray-700 leading-5 focus:outline-none focus:ring-2 focus:ring-light-blue-300" name="link_photo" type="text" placeholder="link_photo" required>
      </div>
      <div class="p-3">
        <input class="block appearance-none placeholder-gray-500 placeholder-opacity-100 border border-light-blue-400 rounded-md w-full py-3 px-4 text-gray-700 leading-5 focus:outline-none focus:ring-2 focus:ring-light-blue-300" name="category_id" type="number" placeholder="category_id" required>
      </div>
      <div class="p-3">
        <input class="block appearance-none placeholder-gray-500 placeholder-opacity-100 border border-light-blue-400 rounded-md w-full py-3 px-4 text-gray-700 leading-5 focus:outline-none focus:ring-2 focus:ring-light-blue-300" name="user_id" type="number" placeholder="user_id" required>
      </div>
      
      <!-- <div class="p-3">
          <label for=""> store on :</label>
          <select name="" id=""> 
              @foreach($category as $category) 
               <option class="block appearance-none placeholder-gray-500 placeholder-opacity-100 border border-light-blue-400 rounded-md w-full py-3 px-4 text-gray-700 leading-5 focus:outline-none focus:ring-2 focus:ring-light-blue-300" name="category_id" type="option" placeholder="category_id" required value=""> {{$category ->name }}</option>
        
              @endforeach
            </select>
    </div> -->
    
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