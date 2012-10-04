<!DOCTYPE html>
<html lang="en">
	<head>
		{{include file='./RootHead.tpl'}}
	</head>
	<body>
		<div class="container">
		{{include file='./UserBar.tpl'}}
			<div id="errContainer"></div>
			<div class="content content-fixed">
				<div class="row-fluid">
					<div class="span3">
						<div class="phone-title hidden-desktop hidden-tablet">
							<h2>
								<blockquote>
									Elliot Wright<br />
									<small>
										<em>PHP Web Developer</em>
									</small>
								</blockquote>
							</h1>
						</div>
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
						<div class="clearfix hidden-phone">
							<blockquote class="pull-right">
								<p><strong>Elliot Wright</strong></p>
								<small>PHP Web Developer</small>
							</blockquote>
						</div>
					</div>
