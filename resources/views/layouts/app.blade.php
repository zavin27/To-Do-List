<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1 class="text-primary mt-3 header text-center ">TO Do List</h1>
    <form method="POST" action="/post">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Add todo" name="title">
        </div>
    </form>
    <ul>
        @if(count($posts) > 0)
            @foreach($posts as $post)
                <div class="d-flex flex-row m-2">
                    <input class="form-check-input" type="checkbox" value="">
                    <h4 class="d-inline">{{$post->title}}</h4>
                    {{--<a class="btn btn-danger ml-auto" href="/" method="DELETE">Delete</a>--}}
                    {!! Form::open(['action' => ['PostController@destroy', $post->id], 'class' => 'ml-auto']) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::token()}}
                        {{Form::submit('delete', ['class' => 'btn btn-danger'])}}
                    {!! Form::close() !!}
                    {{--<form action="" method="POST" class="ml-auto">--}}
                        {{--{{ method_field('DELETE') }}--}}
                        {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                        {{--<button type="submit" class="btn btn-danger">Delete</button>--}}
                    {{--</form>--}}
                    {{--'method' => 'POST'--}}
                </div>
            @endforeach
        @else
        @endif

    </ul>
    {{ $posts->links() }}
</div>
</body>
</html>