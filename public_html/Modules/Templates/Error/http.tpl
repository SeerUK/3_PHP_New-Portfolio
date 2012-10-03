<!DOCTYPE HTML>
<html lang="en-GB">
<head>
	{{include file='../RootHead.tpl'}}
</head>
<body>
	<div class="container-http">
		<div class="bubble">
			<div class="well">
				<div class="row-fluid">
					<div class="span2">
						<div class="well well-danger well-container pagination-centered">
							<p class="massive">!</p>
						</div>
						<div class="well well-small well-white well-container">
							<a target="_blank" href="mailto:webmaster@unknown-degree.net?subject=HTTP Error: {{$errorString}}" title="Email Webmaster" class="">
								<span class="sprite sprite-mail" style="margin: auto;"></span>
							</a>
						</div>
					</div>
					<div class="span10">
						<div class="well well-white well-container">
							<h1>{{$errorString}} <small>{{$errorSubString}}</small></h1>
							{{$errorMessage}}
							<a href="{{$smarty.const.ROOT}}" class="btn btn-fancy pull-right">Homepage</a>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	{{include file='../JavaScript.tpl'}}
</body>
</html>