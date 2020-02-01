@extends('layouts.layout')
@section('content')
    <!-- ##### Hero Area Start ##### -->
    <section class="hero--area section-padding-80">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-12 col-md-7 col-lg-12">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="post-1" role="tabpanel" aria-labelledby="post-1-tab">
                            <!-- Single Feature Post -->
                            <div class="single-feature-post video-post bg-img"
                                 style="background-image:url('/storage/previews/{{$singleVideo['src'].'.jpg'}}')">
                                <!-- Play Button -->
                                <a href="{{route('single.post',$singleVideo)}}" class="btn play-btn"><i
                                        class="fa fa-play" aria-hidden="true"></i></a>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <a style="background-color: {{$singleVideo->category['color']}}" class="post-cata"
                                       href="#">{{$singleVideo->category['name']}}</a>
                                    <a href="{{route('single.post',$singleVideo)}}"
                                       class="post-title">{{$singleVideo['name']}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Trending Posts Area Start ##### -->
    <section class="trending-posts-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h4>Trending Videos</h4>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
            <div class="row">
            @foreach($trendingVideos as $trendingVideo)
                <!-- Single Blog Post -->
                    <div class="col-12 col-md-4">
                        <div class="single-post-area mb-80">
                            <!-- Post Thumbnail -->
                            <div class="post-thumbnail">
                                <img src="/storage/previews/{{$trendingVideo['src'].'.jpg'}}" alt="">
                            </div>
                            <!-- Post Content -->
                            <div class="post-content">
                                <a href="#" style="background-color: {{$trendingVideo['category']['color']}}"
                                   class="post-cata cata-sm cata-success">{{$trendingVideo['category']['name']}}</a>
                                <a href="{{route('single.post',$trendingVideo)}}"
                                   class="post-title">{{$trendingVideo['name']}}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- ##### Trending Posts Area End ##### -->

    <!-- ##### Vizew Post Area Start ##### -->
    <section class="vizew-post-area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="all-posts-area">
                        <!-- Section Heading -->
                        <div class="section-heading style-2">
                            <h4>Featured Videos</h4>
                            <div class="line"></div>
                        </div>
                        <!-- Featured Post Slides -->
                        <div class="featured-post-slides owl-carousel mb-30">
                            <!-- Single Feature Post -->
                            @foreach($featuredVideos as $featuredVideo)
                                <div class="single-feature-post video-post bg-img"
                                     style="background-image: url('/storage/previews/{{$featuredVideo['src'].'.jpg'}}')">
                                    <!-- Play Button -->
                                    <a href="{{route('single.post',$featuredVideo)}}" class="btn play-btn"><i
                                            class="fa fa-play" aria-hidden="true"></i></a>

                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <a href="#" class="post-cata my-category"
                                           style="background-color: {{$featuredVideo['category']['color']}}">{{$featuredVideo['category']['name']}}</a>
                                        <a href="{{route('single.post',$featuredVideo)}}"
                                           class="post-title">{{$featuredVideo['name']}}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        @foreach($popularCategories as $category)
                            <div class="col-12 col-lg-6">
                                <!-- Section Heading -->
                                <div class="section-heading style-2">
                                    <h4>{{$category['name']}} Videos</h4>
                                    <div class="line"></div>
                                </div>

                                <!-- Business Video Slides -->
                                <div class="business-video-slides owl-carousel mb-50">
                                @foreach($category['news'] as $topic)
                                    <!-- Single Blog Post -->
                                        <div class="single-post-area my-area single-feature-post video-post"
                                             style="background-image: url('/storage/previews/{{$topic['src'].'.jpg'}}')">
                                            <a href="{{route('single.post',$topic)}}" class="btn play-btn"><i
                                                    class="fa fa-play" aria-hidden="true"></i></a>
                                            <!-- Post Thumbnail -->
                                        {{--                                            <div class="post-thumbnail">--}}
                                        {{--                                                <img src='/storage/previews/{{$topic['src'].'.jpg'}}' alt="">--}}
                                        {{--                                            </div>--}}

                                        <!-- Post Content -->
                                            <div class="post-content">
                                                <a href="#" style="background-color: {{$category['color']}}"
                                                   class="post-cata cata-sm cata-primary">{{$category['name']}}</a>
                                                <a href="{{route('single.post',$topic)}}"
                                                   class="post-title my-title">{{$topic['name']}}</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="section-heading style-2">
                        <h4>News You May Like</h4>
                        <div class="line"></div>
                    </div>
                @foreach($randomNews as $randomTopic)
                    <!-- Single Post Area -->
                        <div class="single-post-area mb-30">
                            <div class="row align-items-center">
                                <div class="col-12 col-lg-6">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        @if($randomTopic['type'] == 'video')
                                            <img src="/storage/previews/{{$randomTopic['src'].'.jpg'}}">
                                        @endif
                                        @if($randomTopic['type'] == 'image')
                                            <img
                                                src="{{asset('images/'.$randomTopic['src'])}}">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <!-- Post Content -->
                                    <div class="post-content mt-0">
                                        <a href="#" class="post-cata cata-sm cata-success"
                                           style="background-color:{{$randomTopic['category']['color']}}">{{$randomTopic['category']['name']}}</a>
                                        <a href="{{route('single.post',$randomTopic)}}"
                                           class="post-title mb-2">{{$randomTopic['name']}}</a>
                                        <div class="post-meta d-flex align-items-center mb-2">
                                            <a href="#" class="post-date">{{$randomTopic['created_at']}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
                <!-- Section Heading -->
                </div>
                <div class="col-12 col-md-5 col-lg-4">
                    <div class="sidebar-area">
                        <!-- ***** Single Widget ***** -->
                        <div class="single-widget followers-widget mb-50">
                            <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span
                                    class="counter">198</span><span>Fan</span></a>
                            <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span
                                    class="counter">220</span><span>Followers</span></a>
                            <a href="#" class="google"><i class="fa fa-google" aria-hidden="true"></i><span
                                    class="counter">140</span><span>Subscribe</span></a>
                        </div>
                        <!-- ***** Single Widget ***** -->
                        <div class="single-widget latest-video-widget mb-50">
                            <!-- Section Heading -->
                            <div class="section-heading style-2 mb-30">
                                <h4>Latest Videos</h4>
                                <div class="line"></div>
                            </div>

                            <!-- Single Blog Post -->
                            <div class="single-post-area mb-30">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="/storage/previews/{{$singleVideo['src'].'.jpg'}}" alt="">
                                </div>

                                <!-- Post Content -->
                                <div class="post-content">
                                    <a href="#" class="post-cata cata-sm cata-success"
                                       style="background-color: {{$singleVideo['category']['name']}}">{{$singleVideo['category']['name']}}</a>
                                    <a href="{{route('single.post',$singleVideo)}}"
                                       class="post-title">{{$singleVideo['name']}}</a>
                                </div>
                            </div>

                            <!-- Single Blog Post -->
                            @foreach($latestVideos as $video)
                                <div class="single-blog-post d-flex">
                                    <div class="post-thumbnail">
                                        <img src="/storage/previews/{{$video['src'].'.jpg'}}" alt="">
                                    </div>
                                    <div class="post-content">
                                        <a href="{{route('single.post',$video)}}"
                                           class="post-title">{{$video['name']}}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- ***** Single Widget ***** -->
                        <div class="single-widget newsletter-widget mb-50">
                            <!-- Section Heading -->
                            <div class="section-heading style-2 mb-30">
                                <h4>Newsletter</h4>
                                <div class="line"></div>
                            </div>
                            <p>Subscribe our newsletter gor get notification about new updates, information discount,
                                etc.</p>
                            <!-- Newsletter Form -->
                            <div class="newsletter-form">
                                <form action="#" method="post">
                                    <input type="email" name="nl-email" class="form-control mb-15" id="emailnl"
                                           placeholder="Enter your email">
                                    <button type="submit" class="btn vizew-btn w-100">Subscribe</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ##### Vizew Psot Area End ##### -->
@endsection
