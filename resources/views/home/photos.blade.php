@extends('home.app')

@section('title', 'Photos')

@push('stylesheets')
@endpush

@section('content')

    <section id="content">
        <div class="container">
            <div class="row">
                <div class="span12">
            
                    <div class="clearfix"></div>
                    <div class="row">
                        <section id="projects">
                            <ul id="thumbs" class="grid cs-style-3 portfolio">

                                @foreach($photos as $photo)
                                    <li class="item-thumbs span3 design" data-id="id-0" data-type="web">
                                        <div class="item">
                                            <a href="img/dummies/works/{{ $photo->path }}" data-pretty="prettyPhoto[gallery1]" title="{{ $photo->caption }}">
                                                <img src="img/dummies/works/{{ $photo->path }}" alt="">
                                            </a>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </section>
                    </div>
                </div>
                <div id="pagination">
                    <span class="all">Page 1 of 3</span>
                    <span class="current">1</span>
                    <a href="#" class="inactive">2</a>
                    <a href="#" class="inactive">3</a>
                </div>
            </div>

        </div>
    </section>
@endsection

@push('scripts')
<script>



</script>
@endpush