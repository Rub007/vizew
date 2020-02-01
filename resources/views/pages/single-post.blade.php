@extends('layouts.layout')
@section('content')


    <!-- ##### Pager Area Start ##### -->
    <div class="vizew-pager-area">
        <div class="vizew-pager-prev">
            <p>PREVIOUS ARTICLE</p>

            <!-- Single Feature Post -->
            <div class="single-feature-post video-post bg-img pager-article"
                 style="background-image: url(img/bg-img/15.jpg);">
                <!-- Post Content -->
                <div class="post-content">
                    <a href="#" class="post-cata cata-sm cata-success">Sports</a>
                    <a href="video-post.html" class="post-title">Searching for the 'angel' who held me on Westminster
                        Bridge</a>
                    <div class="post-meta d-flex">
                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 18</a>
                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 32</a>
                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 24</a>
                    </div>
                </div>
                <!-- Video Duration -->
                <span class="video-duration">11.13</span>
            </div>
        </div>

        <div class="vizew-pager-next">
            <p>NEXT ARTICLE</p>

            <!-- Single Feature Post -->
            <div class="single-feature-post video-post bg-img pager-article"
                 style="background-image: url(img/bg-img/14.jpg);">
                <!-- Post Content -->
                <div class="post-content">
                    <a href="#" class="post-cata cata-sm cata-business">Business</a>
                    <a href="video-post.html" class="post-title">Reunification of migrant toddlers, parents should be
                        completed Thursday</a>
                    <div class="post-meta d-flex">
                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 25</a>
                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 25</a>
                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 25</a>
                    </div>
                </div>
                <!-- Video Duration -->
                <span class="video-duration">06.59</span>
            </div>
        </div>
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
                                <a href="#" style="background-color: {{$topic['category']['color']}}"
                                   class="post-cata cata-sm cata-danger">{{$topic['category']['name']}}</a>
                                <a href="single-post.html" class="post-title mb-2">{{$topic['name']}}</a>
                                <div class="post-details-thumb mb-50">
                                    @if($topic['type'] == 'image')
                                        <img src="{{asset('images/'.$topic['src'])}}" alt="">
                                    @elseif($topic['type'] == 'video')
                                        <iframe width="100%" height="400" src="https://www.youtube.com/embed/{{$topic['src']}}"
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
                            <p>{{$topic['description']}}</p>


                            <!-- Post Author -->

                            <div class="related-post-area mt-5">
                                <!-- Section Title -->
                                <div class="section-heading style-2">
                                    <h4>Related Post</h4>
                                    <div class="line"></div>
                                </div>

                                <div class="row">

                                    <!-- Single Blog Post -->
                                    @foreach($relatedVideos as $relatedVideo)
                                    <div class="col-12 col-md-6">
                                        <div class="single-post-area mb-50">
                                            <!-- Post Thumbnail -->
                                            <div class="post-thumbnail">
                                                <iframe width="100%" height="400" src="https://www.youtube.com/embed/{{$relatedVideo['src']}}"
                                                        frameborder="0"
                                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                        allowfullscreen></iframe>
                                                <!-- Video Duration -->
                                                <span class="video-duration">05.03</span>
                                            </div>

                                            <!-- Post Content -->
                                            <div class="post-content">
                                                <a href="#" class="post-cata cata-sm cata-success" style="background-color: {{$relatedVideo['category']['color']}}">{{$relatedVideo['category']['name']}}</a>
                                                <a href="{{route('single.post',$relatedVideo)}}" class="post-title">{{$relatedVideo['name']}}</a>
                                                <div class="post-meta d-flex">
                                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i>
                                                        22</a>
                                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 16</a>
                                                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 15</a>
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
                                    <h4>Comment</h4>
                                    <div class="line"></div>
                                </div>

                                <ul>
                                    <!-- Single Comment Area -->
                                    <li class="single_comment_area">
                                        <!-- Comment Content -->
                                        <div class="comment-content d-flex">
                                            <!-- Comment Author -->
                                            <div class="comment-author">
                                                <img src="img/bg-img/31.jpg" alt="author">
                                            </div>
                                            <!-- Comment Meta -->
                                            <div class="comment-meta">
                                                <a href="#" class="comment-date">27 Aug 2019</a>
                                                <h6>Tomas Mandy</h6>
                                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                                                    consectetur, adipisci velit, sed quia non numquam eius</p>
                                                <div class="d-flex align-items-center">
                                                    <a href="#" class="like">like</a>
                                                    <a href="#" class="reply">Reply</a>
                                                </div>
                                            </div>
                                        </div>

                                        <ol class="children">
                                            <li class="single_comment_area">
                                                <!-- Comment Content -->
                                                <div class="comment-content d-flex">
                                                    <!-- Comment Author -->
                                                    <div class="comment-author">
                                                        <img src="img/bg-img/32.jpg" alt="author">
                                                    </div>
                                                    <!-- Comment Meta -->
                                                    <div class="comment-meta">
                                                        <a href="#" class="comment-date">27 Aug 2019</a>
                                                        <h6>Britney Millner</h6>
                                                        <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit
                                                            amet, consectetur, adipisci velit, sed quia non numquam
                                                            eius</p>
                                                        <div class="d-flex align-items-center">
                                                            <a href="#" class="like">like</a>
                                                            <a href="#" class="reply">Reply</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ol>
                                    </li>

                                    <!-- Single Comment Area -->
                                    <li class="single_comment_area">
                                        <!-- Comment Content -->
                                        <div class="comment-content d-flex">
                                            <!-- Comment Author -->
                                            <div class="comment-author">
                                                <img src="img/bg-img/33.jpg" alt="author">
                                            </div>
                                            <!-- Comment Meta -->
                                            <div class="comment-meta">
                                                <a href="#" class="comment-date">27 Aug 2019</a>
                                                <h6>Simon Downey</h6>
                                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                                                    consectetur, adipisci velit, sed quia non numquam eius</p>
                                                <div class="d-flex align-items-center">
                                                    <a href="#" class="like">like</a>
                                                    <a href="#" class="reply">Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <!-- Post A Comment Area -->
                            <div class="post-a-comment-area">

                                <!-- Section Title -->
                                <div class="section-heading style-2">
                                    <h4>Leave a reply</h4>
                                    <div class="line"></div>
                                </div>

                                <!-- Reply Form -->
                                <div class="contact-form-area">
                                    <form action="#" method="post">
                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <input type="text" class="form-control" id="name"
                                                       placeholder="Your Name*">
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <input type="email" class="form-control" id="email"
                                                       placeholder="Your Email*">
                                            </div>
                                            <div class="col-12">
                                                <textarea name="message" class="form-control" id="message"
                                                          placeholder="Message*"></textarea>
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
