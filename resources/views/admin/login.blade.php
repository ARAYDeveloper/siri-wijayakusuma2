<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SIRI - Login</title>

	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}" >
	<link rel="stylesheet" type="text/css" href="{{asset('css/datepicker3.css')}}" >
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-table.css')}}" >
	<link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}" >
<!--[if lt IE 9]>
<script src="{{asset('js/html5shiv.js')}}"></script>
<script src="{{asset('js/respond.min.js')}}"></script>
<![endif]-->

</head>

<body>
	<div class=" col-sm-4 col-xs-offset-4">
		<h2>Sistem Informasi Rawat Inap</h2>
		<br>
	</div>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log IN</div>
				<div class="panel-body">
					<form role="form">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" type="email" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<a href="index.html" class="btn btn-primary">Login</a>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->



	<script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
	<script src="{{asset('js/bootstrap-table.js')}}"></script>
	<script>
        $('#calendar').datepicker({
        });

        !function ($) {
            $(document).on("click","ul.nav li.parent > a > span.icon", function(){
                $(this).find('em:first').toggleClass("glyphicon-minus");
            });
            $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
        }(window.jQuery);

        $(window).on('resize', function () {
            if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
        })
        $(window).on('resize', function () {
            if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
        })
	</script>
</body>

</html>
