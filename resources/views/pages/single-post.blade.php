@extends('layouts.layout')
@section('content')


    <!-- ##### Pager Area Start ##### -->
    <div class="vizew-pager-area">
        @if($previous)
            <div class="vizew-pager-prev">
                <p>PREVIOUS ARTICLE</p>

                <!-- Single Feature Post -->
                <div class="single-feature-post video-post bg-img pager-article"
                     style="background-image: url('/storage/previews/{{$previous['src'].'.jpg'}}');">
                    <a href="{{route('single.post',$previous)}}" class="btn play-btn"><i class="fa fa-play" aria-hidden="true"></i></a>
                    <!-- Post Content -->
                    <div class="post-content">
                        @foreach($previous['category'] as $category)
                            <a href="#" class="post-cata cata-sm cata-success">{{$category['name']}}</a>
                        @endforeach
                        <a href="{{route('single.post',$previous)}}" class="post-title">{{$previous['name']}}</a>
                    </div>
                </div>
            </div>
        @endif
        @if($next)
                <div class="vizew-pager-next">
                    <p>NEXT ARTICLE</p>
                    <!-- Single Feature Post -->
                    <div class="single-feature-post video-post bg-img pager-article"
                         style="background-image: url('/storage/previews/{{$next['src'].'.jpg'}}');">
                        <a href="{{route('single.post',$next)}}" class="btn play-btn"><i class="fa fa-play" aria-hidden="true"></i></a>

                        <!-- Post Content -->
                        <div class="post-content">
                        @foreach($next['category'] as $category)
                                <a href="#" class="post-cata cata-sm cata-business">{{$category['name']}}</a>
                            @endforeach
                            <a href="{{route('single.post',$next)}}" class="post-title">{{$next['name']}}</a>
                        </div>
                        <!-- Video Duration -->
                    </div>
                </div>
        @endif
    </div>
    <!-- ##### Pager Area End ##### -->

    <!-- ##### Post Details Area Start ##### -->
    <section class="post-details-area mb-80">
        <div class="container">
            <div class="row">
                <div class="col-12">

                </div>
            </div>

            <div class="row justify-content-center">
                <!-- Post Details Content Area -->
                <div class="col-12 col-lg-8 col-xl-7">
                    <div class="post-details-content">
                        <!-- Blog Content -->
                        <div class="blog-content">

                            <!-- Post Content -->
                            <div class="post-content mt-0">
                                <a href="#" style="background-color: {{$category['color']}}"
                                   class="post-cata cata-sm cata-danger">{{$category['name']}}</a>
                                <a href="single-post.html" class="post-title mb-2">{{$topic['name']}}</a>
                                <div class="post-details-thumb mb-50">
                                    @if($topic['type'] == 'image')
                                        <img src="{{asset('images/'.$topic['src'])}}" alt="">
                                    @elseif($topic['type'] == 'video')single_comment_area
                                    <iframe width="100%" height="400"
                                            src="https://www.youtube.com/embed/{{$topic['src']}}"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                    @endif
                                </div>
                                <div class="d-flex justify-content-between mb-30">
                                    <div class="post-meta d-flex align-items-center">
                                        <a href="#" class="post-date">{{$topic['created_at']}}</a>
                                    </div>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 32</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 42</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 7</a>
                                    </div>
                                </div>
                            </div>
                            <div>{!!$topic['description'] !!}</div>
                            <!-- Post Author -->
                            <div class="related-post-area mt-5">
                                <!-- Section Title -->
                                <div class="section-heading style-2">
                                    <h4>Related Post</h4>
                                    <div class="line"></div>
                                </div>

                                <div class="row">

                                    <!-- Single Blog Post -->
                                    @foreach($relateds as $related)
                                        <div class="col-12 col-md-6">
                                            <div class="single-post-area mb-50">
                                                <!-- Post Thumbnail -->
                                                <div class="post-thumbnail">
                                                    <iframe width="100%" height="400"
                                                            src="https://www.youtube.com/embed/{{$related['src']}}"
                                                            frameborder="0"
                                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                            allowfullscreen></iframe>
                                                    <!-- Video Duration -->
                                                    <span class="video-duration">05.03</span>
                                                </div>

                                                <!-- Post Content -->
                                                <div class="post-content">
                                                    <a href="#" class="post-cata cata-sm cata-success"
                                                       style="background-color: {{$category['color']}}">{{$category['name']}}</a>
                                                    <a href="{{route('single.post',$related)}}"
                                                       class="post-title">{{$related['name']}}</a>
                                                    <div class="post-meta d-flex">
                                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>
                                                            22</a>
                                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 16</a>
                                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                                            15</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Comment Area Start -->
                            <div class="comment_area clearfix mb-50">

                                <!-- Section Title -->
                                <div class="section-heading style-2">
                                    <h4>Comments</h4>
                                    <div class="line"></div>
                                </div>

                                <ul>
                                    <!-- Single Comment Area -->
                                    @foreach($topic['comments'] as $comment)
                                        <li class="single_comment_area">
                                            <!-- Comment Content -->
                                            <div class="comment-content d-flex">
                                                <!-- Comment Meta -->
                                                <div class="comment-meta">
                                                    <a href="#" class="comment-date">{{$comment['created_at']}}</a>
                                                    <h6>{{$comment['name']}}</h6>
                                                    <h6>{{$comment['email']}}</h6>
                                                    <p>{{$comment['message']}}</p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Post A Comment Area -->
                            <div class="post-a-comment-area">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                            @endif

                            <!-- Section Title -->
                                <div class="section-heading style-2">
                                    <h4>Leave a Comment</h4>
                                    <div class="line"></div>
                                </div>

                                <!-- Reply Form -->
                                <div class="contact-form-area">
                                    <form action="{{route('add.comment',$topic)}}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <input type="text" class="form-control" id="name"
                                                       placeholder="Your Name" name="name">
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <input type="email" class="form-control" id="email"
                                                       placeholder="Your Email" name="email">
                                            </div>
                                            <div class="col-12">
                                                <textarea name="message" class="form-control" id="message"
                                                          placeholder="Message"></textarea>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn vizew-btn mt-30" type="submit">Submit Comment
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Sidebar Widget -->
                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="sidebar-area">

                        <!-- ***** Single Widget ***** -->
                        <div class="single-widget share-post-widget mb-50">
                            <p>Share This Post</p>
                            <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
                            <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
                            <a href="#" class="google"><i class="fa fa-google" aria-hidden="true"></i> Google+</a>
                        </div>

                        <!-- ***** Single Widget ***** -->


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Post Details Area End ##### -->
@endsection
