<!DOCTYPE html>
<html>
	<head>
		{{include file='../RootHead.tpl'}}
	</head>
	<body>
		<div class="container-error">
			{{foreach $arrHTMLErrors as $arrHTMLError}}
				<div class="alert alert-{{$arrHTMLError.type}}">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong class="capitalize">{{$arrHTMLError.type}}:</strong> {{$arrHTMLError.message}}
				</div>
			{{/foreach}}
		</div>
		<div class="container-login">
			<div class="bubble">
				<div class="well well-white">
					<form method="POST">
						<legend class="serif"><em>Login <small>/ Administrative Access</small></em></legend>
						<div class="control-group">
							<div class="controls">
								<input type="text" id="iptUsername" name="iptUsername" placeholder="Username...">
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<input type="password" id="iptPassword" name="iptPassword" placeholder="Password...">
								<label class="checkbox">
									<input type="checkbox" name="iptRemember" checked> Remember me
								</label>
							</div>
						</div>
						<br />
						<div class="control-group">
							<div class="controls">
								<button type="submit" class="btn btn-success btn-fancy btn-block">Sign in</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>