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
						<div class="mainbar">
							<div class="bubble flip">
								<nav>
									<ul class="epic-list navigation navigation-primary">
										<li class="header visible-phone">
											<a href="#">
												Navigation
												<button type="button" class="pull-right">
													<i class="icon-chevron-down"></i>
												</button>
											</a>
										</li>
										{{foreach $arrPrimaryNavigation as $strPrimaryNavigationKey => $strPrimaryNavigationItem}}
											<li class="hidden-phone">
												<a class="ellipsis {{if $strPageTitle == $strPrimaryNavigationKey}}active{{/if}}" href="{{$strPrimaryNavigationItem}}">
													{{$strPrimaryNavigationKey}}
												</a>
											</li>
										{{/foreach}}
									</ul>
								</nav>
							</div>
							<br />
							{{include file='./SocialLinks.tpl'}}
							<div class="brand flip">
								<blockquote>
									<p><strong>Elliot Wright</strong></p>
									<small>PHP Web Developer</small>
								</blockquote>
							</div>
						</div>
					</div>
