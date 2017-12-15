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

    <h1 class="text-primary mt-3 header mb-5">Edit Task</h1>

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
    {{--<div class="row">--}}
        <form action="{{ route('post.update' ,[ $taskUnderEdit -> id]) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <input type="text" class="form-control input-lg" name="updatedTaskName" value="{{ $taskUnderEdit->title }}">
            </div>
            <div class="form-group">
                <input type="submit"  class="btn btn-success" value="Save Changes">
                <a href="/post" class="btn btn-danger">Go Back</a>
            </div>



        </form>
    {{--</div>--}}




</div>
</body>
<script src="{{ asset('js/app.js')}}"></script>
</html>


