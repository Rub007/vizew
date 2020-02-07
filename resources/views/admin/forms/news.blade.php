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
                <form method="post" action="{{route('news.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="topicname">Name</label>
                        <input type="text" class="form-control" id="topicname" name="name">
                    </div>
                    <div class="form-group">
                        <label for="newsdesc">Description</label>
                        <textarea class="form-control" id="newsdesc" rows="3" name="description"></textarea>
                        <script >
                            CKEDITOR.replace( 'newsdesc' );
                        </script>
                    </div>
                    <div class="form-group custom-select2">
                        <label for="selectcat">Select categories</label>
                        <select class="js-example-basic-multiple" name="select[]" multiple="multiple">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="custom-file">
                        <div>If your topic is with image, upload the file and let video field empty!</div>
                        <input type="file" class="" id="customFile" name="file">
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
