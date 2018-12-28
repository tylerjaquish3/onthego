
@extends('layouts.error')


@section('content')
    <!-- page content -->
    <div class="col-md-12 col-xs-12">
        <div class="col-middle">
            <div class="text-center">
                <h1 class="error-number">404</h1>
                <h2>Uh oh. Page not found.</h2>
                <p>Try that again, and if still doesn't work, let us know.</p>
                <div class="mid_center">
                    <a href="/" class="btn btn-warning">Report this?</a>
                    <a href="/" class="btn btn-primary">Go Home</a>
                </div>
            </div>
        </div>
    </div>
    <img src="{{ asset('/images/Sparkle-error-boat.svg') }}" id="error-boat">
    <!-- /page content -->
@endsection