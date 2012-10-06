<div class="userbar">
	<div class="userbar-inner">
		<div class="well well-dark well-small">
			{{if $objSession}}
				<a href="{{$smarty.const.ROOT}}Login/" class="navbtn pull-right">Sign Out</a>
				<a href="{{$smarty.const.ROOT}}Login/" class="navbtn navbtn-success pull-right">{{$objSession.strDisplayName}}</a>
			{{else}}
				<a href="{{$smarty.const.ROOT}}Login/" class="navbtn navbtn-success pull-right">Sign In</a>
			{{/if}}
			<div class="clearfix"></div>
		</div>
	</div>
</div>