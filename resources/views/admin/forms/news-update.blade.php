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
                <a href="{{route('news.index')}}">See All News</a>
                <h1>Update Topic #{{$topic['id']}}</h1>

                <form method="post" action="{{route('news.update',$topic)}}" enctype="multipart/form-data">
                    {{method_field('put')}}
                    @csrf
                    <div class="form-group">
                        <label for="topicname">Name</label>
                        <input type="text" class="form-control" id="topicname" name="name" value="{{$topic['name']}}">
                    </div>
                    <div class="form-group">
                        <label for="newsdesc">Description</label>
                        <textarea class="form-control" id="newsdesc" rows="3" name="description">{{$topic['description']}}</textarea>
                        <script>
                            CKEDITOR.replace('newsdesc');
                        </script>
                    </div>
                    <div class="form-group">
                        <label for="selectcat">Example multiple select</label>
                        <select class="js-example-basic-multiple" name="select[]" multiple="multiple">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="custom-file">
                        <div>If your topic is with image, upload the file and let video field empty!</div>
                        <input type="file" class="" id="customFile" name="src">
                    </div>
                    <div class="form-group">
                        <div>If your topic is with video paste youtube video link with iframe here and let file field empty</div>
                        <input type="text" name="video" placeholder="link">
                    </div>
                    <button type="submit" class="btn btn-dark">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
