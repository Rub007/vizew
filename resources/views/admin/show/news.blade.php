@extends('layouts.adminmenu')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- Archive Catagory & View Options -->
                <div class="archive-catagory-view mb-50 d-flex align-items-center justify-content-between">
                    <!-- Catagory -->
                    <div class="archive-catagory">
                        <h4> News </h4>
                    </div>
                </div>
                <a href="{{route('news.create')}}">Add News</a>
                <!-- Single Post Area -->
                <div class="single-post-area style-2">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-6">
                            <!-- Post Thumbnail -->
                            <div class="post-thumbnail">
                                @if($topic['type'] == 'image')
                                    <img src="{{asset('images')}}/{{$topic['src']}}" alt="">
                                @endif
                                @if($topic['type'] == 'video')
                                        <iframe width="100%" height="400" src="https://www.youtube.com/embed/{{$topic['src']}}"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                    @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <!-- Post Content -->
                            <div class="post-content mt-0">
                                @foreach($topic['category'] as $category)
                                    <a href="#" class="post-cata cata-sm cata-success" style="background-color:{{$category['color']}}">{{$category['name']}}</a>
                                @endforeach
                                <a href="#" class="post-title mb-2">{{$topic['name']}}</a>
                                <div class="post-meta d-flex align-items-center mb-2">
                                    <a href="#" class="post-date">{{$topic['created_at']}}</a>
                                </div>
                                    <div>{!!$topic['description'] !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
