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
                    <!-- View Options -->
                    <div class="view-options">
                        <a href="archive-grid.html"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                        <a href="archive-list.html" class="active"><i class="fa fa-list-ul" aria-hidden="true"></i></a>
                    </div>
                </div>

                <!-- Single Post Area -->
                <div class="single-post-area style-2">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-6">
                            <!-- Post Thumbnail -->
                            <div class="post-thumbnail">
                                <img src="img/bg-img/21.jpg" alt="">

                                <!-- Video Duration -->
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <!-- Post Content -->
                            <div class="post-content mt-0">
                                <a href="#" class="post-cata cata-sm cata-success">Sports</a>
                                <a href="single-post.html" class="post-title mb-2">May fights on after Johnson savages
                                    Brexit approach</a>
                                <div class="post-meta d-flex align-items-center mb-2">
                                    <a href="#" class="post-author">By Jane</a>
                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                    <a href="#" class="post-date">Sep 08, 2018</a>
                                </div>
                                <p class="mb-2">Quisque mollis tristique ante. Proin ligula eros, varius id tristique
                                    sit amet, rutrum non ligula.</p>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Pagination -->
                <nav class="mt-50">
                    <ul class="pagination justify-content-center">
                        <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection
