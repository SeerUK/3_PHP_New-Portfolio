<div class="userbar">
	{{if $objSession}}
	<div class="userbar-inner">
		<div class="well well-dark well-small">
			<button type="button" class="navbtn pull-right">Sign Out</button>
			<button type="button" class="navbtn navbtn-success pull-right">{{$objSession.strDisplayName}}</button>
			<button type="button" class="navbtn navbtn-danger pull-left">Admin Panel</button>
			<div class="clearfix"></div>
		</div>
	</div>
	{{else}}
	<div class="userbar-inner">
		<div class="well well-dark well-small">
			<a href="{{$smarty.const.ROOT}}Login/" class="navbtn navbtn-success pull-right">Sign In</a>
			<div class="clearfix"></div>
		</div>
	</div>
	{{/if}}
</div>