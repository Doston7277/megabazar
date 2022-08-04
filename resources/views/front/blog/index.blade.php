@extends('front.layout.layout')

@section('content')
            <!-- Begin Li's Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="{{ route('home') }}">{{ __('Admin.home') }}</a></li>
                            <li class="active">{{ __('Admin.blog') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="li-main-blog-page pt-60 pb-55">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row li-main-content">
                                @foreach($blogs as $blog)
                                <div class="col-lg-4 col-md-6">
                                    <div class="li-blog-single-item pb-25">
                                        <div class="li-blog-banner">
                                            <a href=""><img class="img-full" src="{{ asset($blog->blog_image) }}" alt=""></a>
                                        </div>
                                        <div class="li-blog-content">
                                            <div class="li-blog-details">
                                                <h3 class="li-blog-heading pt-25"><a href="blog/{{ $blog->blog_id }}">{{ $blog->blog_title[app()->getLocale()] }}</a></h3>
                                                <div class="li-blog-meta">
                                                    <a class="author" href="#"><i class="fa fa-user"></i>{{ $blog->user->user_last_name }}</a>
                                                    <a class="comment" href="#"><i class="fa fa-comment-o"></i> 3 comment</a>
                                                    <a class="post-time" href="#"><i class="fa fa-calendar"></i> {{ $blog->created_at->firmat('d F Y') }}</a>
                                                </div>
                                                <p>{{ $blog->blog_body[app()->getLocale()] }}</p>
                                                <a class="read-more" href="blog/{{ $blog->blog_id }}">Read More...</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="col-lg-12">
                                    <div class="li-paginatoin-area text-center pt-25">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <ul class="li-pagination-box">
                                                    <li>
                                                        <a href="{{ $blogs->appends(request()->input())->previousPageUrl()}}" class="Previous"><i class="fa fa-chevron-left"></i> {{ __('Admin.previous') }} </a>
                                                    </li>

                                                    <li><a href="#" class="active">{{ $blogs->appends(request()->input())->currentPage() }}</a></li>

                                                    <li>
                                                        <a href="{{ $blogs->appends(request()->input())->nextPageUrl() }}" class="Next"> {{ __('Admin.next') }} <i class="fa fa-chevron-right"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
