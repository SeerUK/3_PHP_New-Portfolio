<!DOCTYPE html>
<html>
	<head>
		<title>{{$strPageTitle}} | {{$smarty.const.TITLE}}</title>

		<!-- Include Stylesheets -->
		<link rel="stylesheet" href="{{$smarty.const.STATIC_ROOT}}css/bootstrap.css" />
		<link rel="stylesheet" href="{{$smarty.const.STATIC_ROOT}}css/main.css" />

		<!-- Include JavaScript -->
		<script src="{{$smarty.const.STATIC_ROOT}}js/jquery.min.js" type="text/javascript"></script>
		<script src="{{$smarty.const.STATIC_ROOT}}js/bootstrap.js" type="text/javascript"></script>
		<script src="{{$smarty.const.STATIC_ROOT}}js/modernizer.js" type="text/javascript"></script>
		<script src="{{$smarty.const.STATIC_ROOT}}js/ewp.js" type="text/javascript"></script>

	</head>
	<body>
		<div id="errContainer">
			{{foreach $arrHTMLErrors as $arrHTMLError}}
				<div class="alert alert-{{$arrHTMLError.type}}">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong class="ncapitalize">{{$arrHTMLError.type}}:</strong> {{$arrHTMLError.message}}
				</div>
			{{/foreach}}
		</div>
		<div id="loginContainer">
			<div class="bubble">
				<div class="wwell">
					<form method="POST" class="nmargin">
						<legend>Login <small>/ Administrative Access</small></legend>
						<div class="control-group">
							<div class="controls">
								<input type="text" id="iptUsername" name="iptUsername" placeholder="Username...">
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<input type="password" id="iptPassword" name="iptPassword" placeholder="Password...">
								<label class="checkbox">
									<input type="checkbox" name="iptRemember"> Remember me
								</label>
							</div>
						</div>
						<br />
						<div class="control-group nmargin">
							<div class="controls">
								<button type="submit" class="btn btn-success btn-large btn-block">Sign in</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>