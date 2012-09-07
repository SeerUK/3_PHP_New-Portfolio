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
		<div id="errContainer"></div>
		<div id="loginContainer">
			<div class="bubble">
				<div class="wwell">
					<form method="POST">
						<legend>Login</legend>
						<div class="control-group">
							<label class="control-label" for="iptUsername">Username:</label>
							<div class="controls">
								<input type="text" id="iptUsername" name="iptUsername" placeholder="Username...">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputPassword">Password:</label>
							<div class="controls">
								<input type="password" id="iptPassword" name="iptPassword" placeholder="Password...">
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<label class="checkbox">
									<input type="checkbox"> Remember me
								</label>
								<button type="submit" class="btn">Sign in</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>