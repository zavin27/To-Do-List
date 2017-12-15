<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>To Do List </title>
</head>
<body>
<div class="container">

    <h1 class="text-primary mt-3 header text-center mb-5">TO Do List</h1>

    {{--Display Error Messages--}}

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Error:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif

    {{-- Display Success Messages --}}

    @if(Session::has('success'))
        <div class="alert alert-success">
            <strong>Success:</strong>
            {{ Session::get('success') }}
        </div>

    @endif

    <form method="POST" action="/post" class="mb-3">
        {{ csrf_field() }}

        <div class="row">
            <div class="col-md-9">
                <input type="text" class="form-control " placeholder="Add a new task" name="NewTaskName">
            </div>

            <div class="col-md-3">
                <input type="submit" class="btn btn-primary btn-block" value="Add Task">
            </div>

        </div>
    </form>

    {{--Display Stored Tasks--}}

    <ul>
        @if(count($posts) > 0)
            @foreach($posts as $post)
                <div class="d-flex flex-row m-2">
                    {{--<form action="{{ route('post.update', [$post->id]) }} " method="POST">--}}
                        {{--{{ csrf_field() }}--}}
                        {{--{{ method_field('PUT') }}--}}
                        {{--<input type="checkbox" name="checkbox" value="{{  $post->checkbox ? '1': '0' }}"--}}
                               {{--{{  $post->checkbox ? 'checked' : '' }} onChange="this.form.submit()"--}}
                               {{--class="form-check-input">--}}

                    {{--</form>--}}

                    <a href="{{ route('post.edit', [ $post->id ]) }}" class="d-inline pl-2 mr-auto text-capitalize font-weight-bold"
                       style="text-decoration: none ; color: black">{{$post->title}}</a>

                    {{--Edit Button--}}
                    <a href="{{ route('post.edit', [ $post->id ]) }}"
                       class="btn btn-info pull-right mr-2 js-show">Edit</a>


                    {{--Hidden Form--}}
                    {{--<form action="{{ route('post.update', [$post->id]) }} " method="POST"  id="EditForm" class="js-edit hidden">--}}
                    {{--{{ csrf_field() }}--}}
                    {{--{{ method_field('PUT') }}--}}
                    {{--<input type="text" value="{{ $post->id }}" class="form-control">--}}
                    {{--<input type="submit" onClick="showTextWithButton();" class="btn btn-success" value="Save">--}}
                    {{--</form>--}}


                    {{--Delete Button--}}
                    {!! Form::open(['action' => ['PostController@destroy', $post->id], 'class' => 'pull-right']) !!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::token()}}
                    {{Form::submit('delete', ['class' => 'btn btn-danger'])}}
                    {!! Form::close() !!}

                </div>
            @endforeach

        @endif

    </ul>


    {{--Display Pagination--}}

    <div class="row justify-content-center">
        {{ $posts->links('vendor.pagination.bootstrap-4') }}
    </div>


</div>
</body>
<script src="{{ asset('js/app.js')}}"></script>
</html>