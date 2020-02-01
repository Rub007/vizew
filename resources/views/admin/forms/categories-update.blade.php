@extends('layouts.adminmenu')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{route('categories.index')}}">See All Categories</a>
                <h1>Update Category #{{$category['id']}}</h1>
                <form method="post" action="{{route('categories.update',$category)}}">
                    {{method_field('put')}}
                    @csrf
                    <div class="form-group">
                        <label for="categoryname">Name</label>
                        <input type="text" class="form-control" id="categoryname" name="name" value="{{$category['name']}}">
                    </div>
                    <div class="form-group">
                        <div>Add Category Color</div>
                        <input type="color" name="color" value="{{$category['color']}}">
                    </div>
                    <button type="submit" class="btn btn-dark">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
