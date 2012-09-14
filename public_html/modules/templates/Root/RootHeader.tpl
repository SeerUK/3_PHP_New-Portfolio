<!DOCTYPE html>
<html lang="en">
	<head>
		{{include file='.\RootHead.tpl'}}
	</head>
	<body>
		<div id="errContainer"></div>
		<div id="fixedContainer">
			<div class="row-fluid n100ph">
				<div class="span3">
					<div class="bubble">
						<nav>
							<ul id="primary-navigation">
								{{foreach $arrPrimaryNavigation as $strPrimaryNavigationKey => $strPrimaryNavigationItem}}
									<li><a {{if $strPageTitle == $strPrimaryNavigationKey}} class="active" {{/if}} href="{{$strPrimaryNavigationItem}}">{{$strPrimaryNavigationKey}}</a></li>
								{{/foreach}}
							</ul>
						</nav>
					</div>
					<br />
					<blockquote class="pull-right">
						<p><strong>Elliot Wright</strong></p>
						<small>PHP Web Developer</small>
					</blockquote>
				</div>
