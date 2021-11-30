<x-layout>
    <x-setting heading="Edit Post :{{$posts -> title}} ">
        <form method="POST" action="/admin/posts/{{$posts -> id  }}/edit" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <x-form.input name="title"  :value="old('title', $posts -> title )" />
            <x-form.input name="excerpt" required :value="old('excerpt',$posts -> excerpt )" />
            <x-form.input name="body" required  :value="old('body',$posts -> body )"  />

            <div class="flex  mt-6 ">
              <div class="flex-1">
            <x-form.input name="thumbnail" :value="old('thumbnail', $posts -> thumbnail )" type="file" required />
            </div>

                <img src="{{asset('storage/app/thumbnail/' .$posts -> thumbnail)}}" class="rounded-xl ml-6" alt="image" width="100" >
            </div>
              

                <select name="category_id" id="category_id" required>
                    @foreach (\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category"/>
            <x-form.button name="Update" > </x-form.button>

       
        </form>
    </x-setting>
</x-layout>
