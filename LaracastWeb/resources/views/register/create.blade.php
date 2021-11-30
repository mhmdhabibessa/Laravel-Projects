<x-layout>

<div class="flex items-center justify-center  mt-10 bg-gray-100">
    <div class="px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg md:w-1/3 lg:w-1/3 sm:w-1/3">
        <div class="flex justify-center">
        </div>
        <h3 class="text-2xl font-bold text-center">Join us</h3>
        <form action="/register" method="POST">
            @csrf
            <div class="mt-4">
                <div>
                    <label class="block" for="Name" >Name<label>
                            <input type="text" placeholder="Name" 
                            name="name"
                            required
                            value ="{{old('name')}}" 
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                                @error('name') 
                                <p class="mt-4 text-red-500"> {{ $message}} </p>
                                @enderror
                </div>
                <div>
                    <label class="block" for="username" >Username<label>
                            <input type="text" placeholder="UserName"
                             required 
                             name="username"
                             value ="{{old('username')}}"
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                                @error('username') 
                                <p class="mt-4 text-red-500"> {{ $message}} </p>
                                @enderror
                </div>
                <div class="mt-4">
                    <label class="block" for="email">Email<label>
                            <input type="email" 
                            placeholder="Email"
                            name="email"
                            required
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                                @error('email') 
                                <p class="mt-4 text-red-500"> {{ $message}} </p>
                                @enderror
                </div>
                <div class="mt-4">
                    <label class="block" >Password<label>
                            <input type="password"
                            placeholder="Password"
                            required 
                            name="password"
                            
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                                @error('password') 
                                <p class="mt-4 text-red-500"> {{ $message}} </p>
                                @enderror
                </div>
                
                <div class="flex">
                    <button class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Create
                        Account</button>
                </div>
                <div class="mt-6 text-grey-dark">
                    Already have an account?
                    <a class="text-blue-600 hover:underline" href="/login">
                        Log in
                    </a>
                </div> 
            </div>
            @foreach($errors -> all() as $error)
            <li class="mt-4 text-red-500"> {{$error}} </li>
            @endforeach 
        </form>
    </div>
</div>

</x-layout>