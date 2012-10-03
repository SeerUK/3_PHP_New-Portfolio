<!DOCTYPE html>
<html lang="en">
	<head>
		{{include file='./RootHead.tpl'}}
	</head>
	<body>
		{{include file='./UserBar.tpl'}}
		<div id="errContainer"></div>
		<div class="container-fixed">
			<div class="row-fluid n100ph">
				<div class="span3">
					<div class="bubble">
						<nav>
							<ul class="epic-list">
								{{foreach $arrPrimaryNavigation as $strPrimaryNavigationKey => $strPrimaryNavigationItem}}
									<li><a class="ellipsis {{if $strPageTitle == $strPrimaryNavigationKey}}active{{/if}}" href="{{$strPrimaryNavigationItem}}">{{$strPrimaryNavigationKey}}</a></li>
								{{/foreach}}
							</ul>
						</nav>
					</div>
					<br />
					{{include file='./SocialLinks.tpl'}}
					<div class="clearfix">
						<blockquote class="pull-right">
							<p><strong>Elliot Wright</strong></p>
							<small>PHP Web Developer</small>
						</blockquote>
					</div>
				</div>
