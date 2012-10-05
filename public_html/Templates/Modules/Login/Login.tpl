<!DOCTYPE html>
<html>
	<head>
		{{include file='../../Base/RootHead.tpl'}}
	</head>
	<body>
		<div class="content-error">
			{{foreach $arrHTMLErrors as $arrHTMLError}}
				<div class="alert alert-{{$arrHTMLError.type}}">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong class="capitalize">{{$arrHTMLError.type}}:</strong> {{$arrHTMLError.message}}
				</div>
			{{/foreach}}
		</div>
		<div class="content-login">
			<div class="bubble">
				<div class="well well-white">
					<form method="POST">
						<legend class="serif"><em>Sign In <small>/ Restricted Access</small></em></legend>
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
								<input type="submit" class="btn btn-success btn-fancy btn-block" value="Sign In" />
								<a href="{{$smarty.const.ROOT}}" class="btn btn-block btn-fancy">Back</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		{{include '../../Base/JavaScript.tpl'}}
	</body>
</html>