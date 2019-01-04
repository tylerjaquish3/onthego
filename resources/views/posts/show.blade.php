@extends('home.app')

@section('title', 'Post')

@push('stylesheets')
@endpush

@section('content')

<section id="content">
    <div class="container">
        <div class="row">

            <div class="span4">
                <aside class="left-sidebar">
                    <div class="widget">
                        <h5 class="widgetheading">Recent posts</h5>

                        <ul class="cat">
                        	<li><i class="icon-angle-right"></i> <a href="#">Lorem ipsum dolor sit amet</a></li>
                        	<li><i class="icon-angle-right"></i> <a href="#">Ancillae senserit scribentur ea vel</a></li>
                        	<li><i class="icon-angle-right"></i> <a href="#">Persius nostrum eleifend ad has</a></li>
                        	<li><i class="icon-angle-right"></i> <a href="#">Facilis mediocrem urbanitas ad sed</a></li>
                        	<li><i class="icon-angle-right"></i> <a href="#">Eripuit veritus docendi cum ut</a></li>
                        </ul>
                    </div>
                </aside>
            </div>
            <div class="span8">

                <article class="single">
                    <div class="row">
                        <div class="span8">
                            <div class="post-image">
                                <div class="post-heading">
                                    <h3>{{ $post->title }}</h3>
                                </div>
                                <img src="img/dummies/blog/img1.jpg" alt="" />
                            </div>
                            <div class="meta-post">
                                <a href="#" class="author">By<br /> {{ $post->creator->name }}</a>
                                <a href="#" class="date">{{ date('M j', strtotime($post->updated_at)) }}<br />{{ date('Y', strtotime($post->updated_at)) }}</a>
                            </div>
                            {!! $post->content_html !!}
                        </div>
                    </div>
                </article>

                <!-- author info -->
                <div class="about-author span8">
                    <a href="#" class="thumbnail align-left"><img src="img/avatar.png" alt="" /></a>
                    <h5><strong><a href="#">We Would Love to Hear from You!</a></strong></h5>
                    <p>Leave a comment below, or <a href="/contact">contact us here</a>.</p>
                </div>

                <div class="comment-area">

                    <h4>{{ count($post->comments) }} Comments</h4>

                    @foreach ($post->comments as $comment)
                    <div class="media">
                        <div class="media-body">
                            <div class="media-content">
                                <h6><span>{{ date('M j, Y', strtotime($comment->created_at)) }}</span> {{ $comment->user_name }}</h6>
                                <p>{{ $comment->comment_text }} </p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="marginbot30"></div>
                    <h4>Leave your comment</h4>

                    <div class="row">
                        <div class="span8">
                            <input type="text" id="user_name" placeholder="* Enter your full name" />
                        </div>
                        <div class="span8 margintop10">
                            <p><textarea id="comment_text" rows="12" class="input-block-level" placeholder="*Your comment here"></textarea></p>
                            <p><button class="btn btn-color margintop10" id="save_comment">Submit Comment</button></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>

    var post = @json($post);

    $('#save_comment').on('click', function(e) {
        $.ajax({
            url: '/comment',
            type: 'POST',
            dataType: 'json',
            data: {
                user_name: $('#user_name').val(), 
                comment_text: $('#comment_text').val(),
                post_id: post.id,
                _token: '{{ csrf_token() }}'
            },
            success: function (data) {
                alert('saved');
            }
        });
    });

</script>
@endpush