

@extends ('layout')

@section('content')

  @foreach ($posts as  $post) 

        <article>   

        <h1>
            <a href="/post/{{$post ->id}}"> {{$post -> title}} </a>

          
        </h1>

        <p>
            By : <a href="/authors/{{$post -> author->username}}"> {{$post ->author ->name}}  </a> in <a href="/categories/{{$post ->category->name}} ">  {{$post -> category ->name}}</a>

                </p>  
            <div> 

               {{ $post -> body }}
               
            </div>


        </article>

        @endforeach
    
@endsection