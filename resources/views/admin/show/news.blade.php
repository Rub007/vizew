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
                                    <video src="{{asset('videos')}}/{{$topic['src']}}"></video>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <!-- Post Content -->
                            <div class="post-content mt-0">
                                <a href="#" class="post-cata cata-sm cata-success">{{$topic['category']['name']}}</a>
                                <a href="single-post.html" class="post-title mb-2">{{$topic['name']}}</a>
                                <div class="post-meta d-flex align-items-center mb-2">
                                    <a href="#" class="post-date">{{$topic['created_at']}}</a>
                                </div>
                                <p class="mb-2">{{$topic['description']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
