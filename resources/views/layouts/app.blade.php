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
    <h1 class="text-primary mt-3 header text-center mb-5">TO Do List</h1>
    <form method="POST" action="/post" class="mb-3">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-9">
                <input type="text" class="form-control " placeholder="Add todo" name="title">
            </div>
            <div class="col-md-3">
                <input type="submit" class="btn btn-primary btn-block" value="Add Task">
            </div>

        </div>
    </form>
    <ul>
        @if(count($posts) > 0)
            @foreach($posts as $post)
                <div class="d-flex flex-row m-2">
                    <input class="form-check-input" type="checkbox" value="">
                    <h4 class="d-inline pl-2">{{$post->title}}</h4>
                    {!! Form::open(['action' => ['PostController@destroy', $post->id], 'class' => 'ml-auto']) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::token()}}
                        {{Form::submit('delete', ['class' => 'btn btn-danger'])}}
                    {!! Form::close() !!}

                </div>
            @endforeach
        @else
        @endif

    </ul>
    <div class="row justify-content-center">
        {{ $posts->links('vendor.pagination.bootstrap-4') }}
    </div>


</div>
</body>
</html>