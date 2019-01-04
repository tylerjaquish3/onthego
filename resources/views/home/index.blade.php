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
            <a href="#content" class="btn-get-started scrollto">Get Started</a>
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
                                <a href="#" class="author">By<br /> Admin</a>
                                <a href="#" class="date">10 Jun<br /> 2013</a>
                            </div>
                            <div class="post-entry">
                                <p>
                                Qui ut ceteros comprehensam. Cu eos sale sanctus eligendi, id ius elitr saperet, ocurreret pertinacia pri an. No mei nibh consectetuer, semper laoreet perfecto ad qui, est rebum nulla argumentum ei. Fierent adipisci iracundia est ei, usu timeam persius
                                ea. Usu ea justo malis, pri quando everti electram ei, ex homero omittam salutatus...
                                </p>
                                <a href="#" class="btn btn-color">Read more <i class="icon-angle-right"></i></a>
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
                <div class="span3">
                  <div class="item">
                    <figure>
                      <div><img src="img/dummies/works/1.jpg" alt=""></div>
                      <figcaption>
                        <h3>Portfolio name</h3>
                        <p>
                          <a href="img/dummies/works/big.png" data-pretty="prettyPhoto[gallery1]" title="Portfolio caption here"><i class="icon-zoom-in icon-circled icon-bglight icon-2x active"></i></a>
                          <a href="#"><i class="icon-file icon-circled icon-bglight icon-2x active"></i></a>
                        </p>
                      </figcaption>
                    </figure>
                  </div>
                </div>
                <div class="span3">
                  <div class="item">
                    <figure>
                      <div><img src="img/dummies/works/2.jpg" alt=""></div>
                      <figcaption>
                        <h3>Portfolio name</h3>
                        <p>
                          <a href="img/dummies/works/big.png" data-pretty="prettyPhoto[gallery1]" title="Portfolio caption here"><i class="icon-zoom-in icon-circled icon-bglight icon-2x active"></i></a>
                          <a href="#"><i class="icon-file icon-circled icon-bglight icon-2x active"></i></a>
                        </p>
                      </figcaption>
                    </figure>
                  </div>
                </div>
                <div class="span3">
                  <div class="item">
                    <figure>
                      <div><img src="img/dummies/works/3.jpg" alt=""></div>
                      <figcaption>
                        <h3>Portfolio name</h3>
                        <p>
                          <a href="img/dummies/works/big.png" data-pretty="prettyPhoto[gallery1]" title="Portfolio caption here"><i class="icon-zoom-in icon-circled icon-bglight icon-2x active"></i></a>
                          <a href="#"><i class="icon-file icon-circled icon-bglight icon-2x active"></i></a>
                        </p>
                      </figcaption>
                    </figure>
                  </div>
                </div>
                <div class="span3">
                  <div class="item">
                    <figure>
                      <div><img src="img/dummies/works/4.jpg" alt=""></div>
                      <figcaption>
                        <h3>Portfolio name</h3>
                        <p>
                          <a href="img/dummies/works/big.png" data-pretty="prettyPhoto[gallery1]" title="Portfolio caption here"><i class="icon-zoom-in icon-circled icon-bglight icon-2x active"></i></a>
                          <a href="#"><i class="icon-file icon-circled icon-bglight icon-2x active"></i></a>
                        </p>
                      </figcaption>
                    </figure>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
    </div>
</section>

@endsection
