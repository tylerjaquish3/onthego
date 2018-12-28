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
                      <h3><a href="#">Example single post title here</a></h3>
                    </div>
                    <img src="img/dummies/blog/img1.jpg" alt="" />
                  </div>
                  <div class="meta-post">
                    <a href="#" class="author">By<br /> Admin</a>
                    <a href="#" class="date">10 Jun<br /> 2013</a>
                  </div>
                  <p>
                    Qui ut ceteros comprehensam. Cu eos sale sanctus eligendi, id ius elitr saperet, ocurreret pertinacia pri an. No mei nibh consectetuer, semper laoreet perfecto ad qui, est rebum nulla argumentum ei. Fierent adipisci iracundia est ei, usu timeam persius
                    ea. Usu ea justo malis, pri quando everti electram ei, ex homero omittam salutatus sed. Dicam appetere ne qui, no has scripta appellantur. Mazim alienum appellantur eu cum, cu ullum officiis pro, pri at eius erat accusamus. Eos id
                    hinc fierent indoctum, ad accusam consetetur voluptatibus sit. His at quod impedit. Eu zril quando perfecto mel, sed eu eros debet.
                  </p>
                  <blockquote>
                    Lorem ipsum dolor sit amet, ei quod constituto qui. Summo labores expetendis ad quo, lorem luptatum et vis. No qui vidisse signiferumque...
                  </blockquote>
                  <p>
                    Fierent adipisci iracundia est ei, usu timeam persius ea. Usu ea justo malis, pri quando everti electram ei, ex homero omittam salutatus sed. Dicam appetere ne qui, no has scripta appellantur. Mazim alienum appellantur eu cum, cu ullum officiis pro, pri
                    at eius erat accusamus.
                  </p>
                  <div>
                    <ul class="meta-bottom">
                      <li><i class="icon-folder-open"></i><a href="#"> Blog</a></li>
                      <li><i class="icon-tags"></i> <a href="#">Web design</a>, <a href="#">Tutorial</a></li>
                    </ul>
                  </div>


                </div>
              </div>
            </article>

            <!-- author info -->
            <div class="about-author">
              <a href="#" class="thumbnail align-left"><img src="img/avatar.png" alt="" /></a>
              <h5><strong><a href="#">John doe</a></strong></h5>
              <p>
                Qui ut ceteros comprehensam. Cu eos sale sanctus eligendi, id ius elitr saperet, ocurreret pertinacia pri an. No mei nibh consectetuer, semper ad qui, est rebum nulla argumentum ei.
              </p>
            </div>

            <div class="comment-area">

              <h4>4 Comments</h4>
              <div class="media">
                <a href="#" class="thumbnail pull-left"><img src="img/avatar.png" alt="" /></a>
                <div class="media-body">
                  <div class="media-content">
                    <h6><span>March 12, 2013</span> Karen medisson</h6>
                    <p>
                      Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </p>

                    <a href="#" class="align-right">Reply</a>
                  </div>
                </div>
              </div>
              <div class="media">
                <a href="#" class="thumbnail pull-left"><img src="img/avatar.png" alt="" /></a>
                <div class="media-body">
                  <div class="media-content">
                    <h6><span>March 12, 2013</span> Smith sanderson</h6>
                    <p>
                      Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </p>

                    <a href="#" class="align-right">Reply</a>
                  </div>
                  <div class="media">
                    <a href="#" class="thumbnail pull-left"><img src="img/avatar.png" alt="" /></a>
                    <div class="media-body">
                      <div class="media-content">
                        <h6><span>March 12, 2013</span> Thomas guttenberg</h6>
                        <p>
                          Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </p>

                        <a href="#" class="align-right">Reply</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="media">
                <a href="#" class="thumbnail pull-left"><img src="img/avatar.png" alt="" /></a>
                <div class="media-body">
                  <div class="media-content">
                    <h6><span>March 12, 2013</span> Vicky lumora</h6>
                    <p>
                      Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </p>

                    <a href="#" class="align-right">Reply</a>
                  </div>
                </div>
              </div>

              <div class="marginbot30"></div>
              <h4>Leave your comment</h4>

              <form id="commentform" action="#" method="post" name="comment-form">
                <div class="row">
                  <div class="span4">
                    <input type="text" placeholder="* Enter your full name" />
                  </div>
                  <div class="span4">
                    <input type="text" placeholder="* Enter your email address" />
                  </div>
                  <div class="span8 margintop10">
                    <input type="text" placeholder="Enter your website" />
                  </div>
                  <div class="span8 margintop10">
                    <p>
                      <textarea rows="12" class="input-block-level" placeholder="*Your comment here"></textarea>
                    </p>
                    <p>
                      <button class="btn btn-color margintop10" type="submit">Submit comment</button>
                    </p>
                  </div>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </section>

@endsection