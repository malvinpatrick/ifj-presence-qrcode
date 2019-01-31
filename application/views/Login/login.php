<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=0.8"/>
    <title>iFJ Presence</title>
    <!--BOOTSTRAP CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--POPPER-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!--BOOTSTRAP JAVA SCRIPT-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }
        .form-signin .checkbox {
            font-weight: 400;
        }
        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }
        .form-signin .form-control:focus {
            z-index: 2;
        }
        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
		@media screen and (max-width: 768px) {
			.navbar{
				background-color:rgb(233,233,233);
			}
		}

    </style>
</head>
<script>
    $(document).ready(function () {
        $('.carousel').carousel({
            interval: 2000
        });
    });
</script>
<body class="text-center">
    <div style="margin-bottom: 50px">
        <nav class="navbar navbar-dark bg-dark text-light navbar-expand-lg fixed-top">
            <a class="navbar-brand" href="#" style="width: 155px;padding: 0px">
                <img src="<?=base_url('asset/Image/logo.png')?>" width="150px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="lead">
                iFJ Presence
            </div>
        </nav>
    </div>

    <div class="container-fluid" style="padding: 2%;">
        <h1>Welcome to iFJ Presence</h1>
        <form class="form-signin" action="<?=site_url('Login/index')?>" method="post">
            <h1 class="h3 mb-3 font-weight-normal">Sign In</h1>
            <input name="username" type="text" id="inputEmail" class="form-control" placeholder="Username" value="" required autofocus>
            <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" value="" required>
            <input type="submit" name="signin" class="btn btn-lg btn-primary btn-block" value="Sign In">
            <p class="mt-5 mb-3 text-white" >&copy; PD iSTTS 2019</p>
        </form>
    </div>
</body>
</html>
