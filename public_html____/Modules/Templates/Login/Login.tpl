<!DOCTYPE html>
<html>
	<head>
		{{include file='../Root/RootHead.tpl'}}
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
						<legend class="serif nnormal"><i>Login <small>/ Administrative Access</small></i></legend>
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