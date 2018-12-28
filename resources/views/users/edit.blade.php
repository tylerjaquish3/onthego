@extends('app')

@section('title', 'Edit User')

@push('stylesheets')
@endpush

@section('content')
    <!-- page content -->
    <div class="page-title">
        <div class="title_left">
            <h1>Users</h1>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit User: {{ $user->name }}</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="col-xs-12">
                        <div class="x_panel">

                            {!! Form::model( $user, ['class' => 'form-horizontal form-label-left', 'action' => ['UserController@update', $user->id], 'method' => 'put', 'role' => 'form'] ) !!}

                                <div class="form-group">
                                    {!! Form::label('role_id', 'Role', array('class' => 'control-label col-sm-3 col-xs-12')) !!}
                                    <div class="col-sm-6 col-xs-12">
                                        {!! Form::select('role_id', array(2 => 'View', 1 => 'Admin' ), null, array('class' => 'form-control')) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('negative_margin_email', 'Negative Margin Emails', array('class' => 'control-label col-sm-3 col-xs-12')) !!}
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="switch">
                                            {!! Form::checkbox('negative_margin_email', 1, $user->negative_margin_email, ['class' => 'js-switch']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('error_email', 'Error Emails', array('class' => 'control-label col-sm-3 col-xs-12')) !!}
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="switch">
                                            {!! Form::checkbox('error_email', 1, $user->error_email,  ['class' => 'js-switch']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('trending_products_email', 'Trending Product Emails', array('class' => 'control-label col-sm-3 col-xs-12')) !!}
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="switch">
                                            {!! Form::checkbox('trending_products_email', 1, $user->trending_products_email,  ['class' => 'js-switch']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="ln_solid"></div>

                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <a href="/users" class="btn btn-warning">Cancel</a>
                                        {!! Form::button('Save', ['type' => 'submit', 'class' => 'btn btn-success', 'id' => 'save-user']) !!}
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
    <script src="{{ asset('js/ui/switchery.min.js') }}"></script>
    <script src="{{ asset("js/select2.full.min.js") }}"></script>

    <script>
        // Select2 for statuses
        $("#role_id").select2({
            minimumResultsForSearch: -1
        });
    </script>
@endpush