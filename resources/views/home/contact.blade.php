@extends('home.app')

@section('title', 'Blog')

@push('stylesheets')
@endpush

@section('content')

    <section id="content">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <h4>We Would Love to Hear from You!</h4>

                    <form id="contactform" action="" method="post" role="form" class="contactForm">

                        <div id="sendmessage">Your message has been sent. Thank you!</div>
                        <div id="errormessage"></div>

                        <div class="row">
                            <div class="span4 field form-group">
                                <input type="text" name="name" placeholder="* Enter your full name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validation"></div>
                            </div>
                            <div class="span4 field form-group">
                                <input type="text" name="email" placeholder="* Enter your email address" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validation"></div>
                            </div>
                            <div class="span8 margintop10 field form-group">
                                <input type="text" name="subject" placeholder="Enter your subject" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validation"></div>
                            </div>
                            <div class="span8 margintop10 field form-group">
                                <textarea rows="12" name="message" class="input-block-level" placeholder="* Your message here..." data-rule="required" data-msg="Please write something"></textarea>
                                <div class="validation"></div>

                                <p>
                                    <button class="btn btn-color margintop10 pull-left" type="submit">Send message</button>
                                    <span class="pull-right margintop20">* Please fill all required form fields, thanks!</span>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>

@endsection
