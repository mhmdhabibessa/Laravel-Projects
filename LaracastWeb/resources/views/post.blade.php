<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/vendor-lib.css" >    
    <link rel="stylesheet" href="/app.css" >    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <article>
        <h1>
            {{$post  -> title}}
        </h1>
            <p>
            By : <a href="/authors/{{$post -> author->username}}"> {{$post ->author ->name}}  </a>  in 
           
            <a href="/categories/{{$post ->category-> name}} ">   {{$post -> category ->name}}</a>

                </p>     
        <div>
            {{ $post -> body }}
        </div>

        <a href="/"> Go Back</a>
    </article>

</body>
</html>