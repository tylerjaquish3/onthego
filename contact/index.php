<?php

$currentPage = 'Contact';
include('../includes/app.php');

?>

<section id="content">
    <div class="container">
        <div class="row form-row">
            <div class="col-xs-12 col-md-8">
                <h4>We Would Love to Hear from You!</h4>

                <form id="contactform" role="form" class="contactForm">

                    <div id="confirmation" style="display: none;"></div>
                    <input type="hidden" name="action" value="send-message">

                    <div class="row form-row">
                        <div class="col-xs-12 col-md-6 field form-group">
                            <input type="text" name="name" class="form-control" placeholder="* Enter your full name" />
                            <div class="validation"></div>
                        </div>
                        <div class="col-xs-12 col-md-6 field form-group">
                            <input type="text" name="email" class="form-control" placeholder="* Enter your email address" />
                            <div class="validation"></div>
                        </div>
                        <div class="col-xs-12 field form-group">
                            <input type="text" name="subject" class="form-control" placeholder="Enter your subject" />
                            <div class="validation"></div>
                        </div>
                        <div class="col-xs-12 field form-group">
                            <textarea rows="12" name="message" class="input-block-level form-control" placeholder="* Your message here..."></textarea>
                            <div class="validation"></div>

                            <p>
                                <span class="pull-right margintop10">* Please fill all required form fields, thanks!</span>
                                <a class="btn btn-color margintop10 pull-left" id="send_btn">Send message</a>
                                
                            </p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xs-12 col-md-4">
                <img src="/img/cute-people.jpg">
            </div>
        </div>
    </div>
</section>

<?php include('../includes/footer.php'); ?>

<script type="text/javascript">

    $('#send_btn').click(function (e) {
        e.preventDefault();
        var formData = $('#contactform').serialize();
        $.ajax({
            url: '../includes/handleForm.php',
            type: "POST",
            data: formData,
            dataType: 'json',
            complete: function (response) {
                $("#contactform input[type!='hidden']").each(function(){
                    $(this).val('');
                });
                
                $('#confirmation').html(response.responseText);
                $('#confirmation').show();
            }
        })
    });

</script>



