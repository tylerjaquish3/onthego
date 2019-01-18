<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>On the Go | Admin</title>
    <link href="../css/full_sparkle.css" rel="stylesheet">

</head>

<body id="login_screen">
    <div id="loginPage">

        <form id="loginForm"  method="POST" action="">
            <div id="login_bumper">
                <h5 class="title">On the Go Admin</h5>
                <div class="login-fields">
                    <input type="text" name="myusername" class="block_input" placeholder="email" required autofocus>
                    <input type="password" name="mypassword" id="mypassword" class="block_input" placeholder="password" required/>

                    <div class="text--right">
                        <a href="/" class="btn btn-primary">Go Home</a>
                        <button type="submit" class="btn btn-success pull-right">LOG IN</button>
                    </div>
                </div>
            </div>
        </form>


    </div>

    <script src="/js/full_sparkle.js"></script>
    <script src="/js/icheck.min.js"></script>

    <script type="text/javascript">

        $('#loginForm').submit(function (e) {
            e.preventDefault();

            var formData = $('#loginForm').serialize();
            $.ajax({
                url: '/includes/checkLogin.php',
                type: "POST",
                data: formData,
                async: false,
                dataType: 'json',
                complete: function (response) {
                    data = $.parseJSON(response.responseText);
                    if (data.type == 'error') {
                        $('#mypassword').val('');
                        $('#error-message').show();
                    } else if (data.type == 'success') {
                        window.location.replace("/admin/index.php");
                    }
                }
            })
        });

    </script>

</body>
</html>