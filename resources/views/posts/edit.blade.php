@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <!-- page content -->
    <div class="page-title">
        <div class="title_left">
            <h1>posts</h1>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    @if( isset($post) )
                        <h2>Edit Post: {{ $post->title }}</h2>
                    @else
                        <h2>Create Post</h2>
                    @endif
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="col-md-12 col-sm-12">
                        <div class="x_panel">

                            @if( isset($post) )
                                {!! Form::model( $post, ['class' => 'form-horizontal form-label-left', 'route' => ['posts.update', $post->id], 'method' => 'put', 'role' => 'form'] ) !!}
                            @else
                                {!! Form::open( ['class' => 'form-horizontal form-label-left', 'route' => 'posts.store'] ) !!}
                            @endif

                            <div class="form-group">
                                <div class="col-sm-6 col-xs-12">
                                    {!! Form::text('title', null, ['required', 'class'=>'form-control col-xs-12', 'placeholder'=>'Title *', 'id' => 'title']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6 col-xs-12">
                                    {!! Form::select('category', $categories, $post->category_id, ['required', 'class'=>'form-control col-xs-12', 'id' => 'category', 'placeholder' => 'Category *']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="document-editor">
                                        <div class="document-editor__toolbar"></div>
                                        <div class="document-editor__editable-container">
                                            <div class="document-editor__editable">
                                                @if( isset($post) ){!! $post->content_html !!}@endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="{{ route('posts.index') }}" class="btn btn-warning">Cancel</a>
                                    {!! Form::button('Save as Draft', ['class' => 'btn btn-primary', 'id' => 'save-post']) !!}
                                    {!! Form::button('Publish', ['class' => 'btn btn-success', 'id' => 'publish-post']) !!}
                                </div>
                            </div>

                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script src='https://cdn.ckeditor.com/ckeditor5/11.2.0/decoupled-document/ckeditor.js'></script>

<script>

    var post = @json($post);

    var myEditor;
    DecoupledEditor.create(document.querySelector( '.document-editor__editable'), {
        cloudServices: {
            // tokenUrl: 'https://example.com/cs-token-endpoint',
            // uploadUrl: 'https://your-organization-id.cke-cs.com/easyimage/upload/'
        }
    })
    .then( editor => {
        const toolbarContainer = document.querySelector('.document-editor__toolbar');
        toolbarContainer.appendChild( editor.ui.view.toolbar.element );
        window.editor = editor;
        myEditor = editor; 
    })
    .catch( err => {
        console.error( err );
    });

    
    $('#save-post').on('click', function(e) {
        submitForm(0);
    });

    $('#publish-post').on('click', function(e) {
        submitForm(1);
    });

    // Send form to controller
    function submitForm(isActive)
    {
        requestType = 'POST';
        requestUrl = "{{ route('posts.store') }}";     

        if (post) {
            requestType = 'PATCH';
            requestUrl = "{{ route('posts.update', ['id' => ':id']) }}";
            requestUrl = requestUrl.replace(':id', post.id);
        }

        $.ajax({
            url: requestUrl,
            method: requestType,
            dataType: 'json',
            data: {
                title: $('#title').val(), 
                content_html: myEditor.getData(),
                category: $('#category').val(),
                is_active: isActive
            },
            success: function (data) {
                window.location = '/admin/dashboard';
            }
        });
    }

</script>
@endpush