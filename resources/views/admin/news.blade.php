@extends('layouts.adminmenu')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div>
                @if(session()->has('message'))
                    <div>{{session('message')}}</div>
                    @endif
            </div>
            <!-- Archive Catagory & View Options -->
            <div class="archive-catagory-view mb-50 d-flex align-items-center justify-content-between">
                <!-- Catagory -->
                <div class="archive-catagory">
                    <h4> News </h4>
                </div>
            </div>
            <div>
                <a class="btn btn-secondary btn-lg mybutton {{$class['all']}}" href="{{route('news.index')}}">All</a>
                <a class="btn btn-secondary btn-lg mybutton {{$class['photo']}}" href="{{route('admin.news.photo')}}">Photo</a>
                <a class="btn btn-secondary btn-lg mybutton {{$class['video']}}" href="{{route('admin.news.video')}}">Video</a>
            </div>
            <a href="{{route('news.create')}}"><h2>Add News</h2></a>
            <!-- Single Post Area -->
            @foreach($topics as $topic)
            <div class="single-post-area style-2">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6">
                        <!-- Post Thumbnail -->
                        @if($topic['type'] == 'image')
                            <img src="{{asset('/images')}}/{{$topic['src']}}" alt="">
                        @endif
                        @if($topic['type'] == 'video')
{{--                            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$topic['src']}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}
                            <img src="/storage/previews/{{$topic['src'].'.jpg'}}" alt="">
                        @endif
                    </div>
                    <div class="col-12 col-md-6">
                        <!-- Post Content -->
                        <div class="post-content mt-0">
                            <a href="#" class="post-cata cata-sm cata-success" style="background-color: {{$topic['category']['color']}}">{{$topic['category']['name']}}</a>
                            <a href="single-post.html" class="post-title mb-2">{{$topic['name']}}</a>
                            <div class="post-meta d-flex align-items-center mb-2">
                                <a href="#" class="post-date">{{$topic['created_at']}}</a>
                            </div>
                            <div>
                                <th><a href="{{route('news.edit', $topic)}}">Edit</a></th>
                            </div>
                            <th>
                                <form action="{{route('news.destroy',$topic)}}" method="post">
                                    @csrf
                                    {{method_field('delete')}}
                                    <input type="submit" value="Delete">
                                </form>
                            </th>
                            <p class="mb-2">{{$topic['description']}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- Pagination -->
            <nav class="mt-50">
                <ul class="pagination justify-content-center">
                    {{$topics->links()}}
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
