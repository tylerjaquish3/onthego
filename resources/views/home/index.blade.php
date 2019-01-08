@extends('home.app')

@section('title', 'Blog')

@push('stylesheets')
@endpush

@section('content')

<!-- section intro -->
<section id="intro">
    <div class="intro-content">
        <h2>Welcome!</h2>
        <h3>On the Go with Justin and Oksana</h3>
        <div>
            <a href="#content" class="btn-get-started scrollto">Start Reading</a>
        </div>
    </div>
</section>
<!-- /section intro -->

<section id="content">
    <div class="container">
        <div class="row">
            <div class="span4">
                <aside class="left-sidebar">

                    <div class="widget">
                        <h5 class="widgetheading">Recent posts</h5>
                        <ul class="cat">
                            @foreach ($recentPosts as $recentPost)
                                <li><i class="icon-angle-right"></i> <a href="{{ $recentPost->id }}">{{ $recentPost->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="widget">
                        <h5 class="widgetheading">Categories</h5>
                        <ul class="cat">
                            @foreach ($categories as $category)
                                <li><i class="icon-angle-right"></i> <a href="#">{{ $category->name }}</a><span> ({{ $category->categoryCount }})</span></li>
                                
                            @endforeach
                        </ul>
                    </div>

                </aside>
            </div>

            <div class="span8">

                @foreach($posts as $post)
                <article>
                    <div class="row">
                        <div class="span8">
                            <div class="post-image">
                                <div class="post-heading">
                                    <h3><a href="/blog/{{ $post->id }}">{{ $post->title }}</a></h3>
                                </div>

                                <img src="img/dummies/blog/img1.jpg" alt="" />
                            </div>
                            <div class="meta-post">
                                <a href="#" class="author">By<br /> {{ $post->creator->name }}</a>
                                <a href="#" class="date">{{ date('j M', strtotime($post->updated_at)) }}<br />{{ date('Y', strtotime($post->updated_at)) }}</a>
                                <br /><br /><p>Category: {{ $post->category->name }}</p>
                            </div>
                            <div class="post-entry">
                                <p>
                                {!! substr($post->content_html, 0, 335) !!}...
                                </p>
                                <a href="/blog/{{ $post->id }}" class="btn btn-color">Read more <i class="icon-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </article>
                @endforeach

                <div id="pagination">
                    <span class="all">Page 1 of 3</span>
                    <span class="current">1</span>
                    <a href="#" class="inactive">2</a>
                    <a href="#" class="inactive">3</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="works">
    <div class="container">
        <div class="row">
            <div class="span12">
                <h3>Photos</h3>
                <div class="row">

                    <div class="grid cs-style-3">

                        @foreach($photos as $photo)
                            <div class="span3">
                                <div class="item">
                                    <a href="img/dummies/works/{{ $photo->path }}" data-pretty="prettyPhoto[gallery1]" title="{{ $photo->caption }}">
                                        <img src="img/dummies/works/{{ $photo->path }}" alt="">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
