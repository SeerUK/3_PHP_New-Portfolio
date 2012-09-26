<div class="userbar">
	{{if $objSession}}
	<div class="userbar-inner">
		<div class="well well-small well-dark">
			<div class="btn-group pull-right inline-right">
				<button class="btn btn-small">Sign Out</button>
			</div>
			<div class="btn-group pull-right inline-right">
				<button class="btn btn-success btn-small">{{$objSession.strDisplayName}}</button>
				<button class="btn btn-success btn-small dropdown-toggle" data-toggle="dropdown">
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu">
					<li><a href="#">My Account</a></li>
				</ul>
			</div>

			<div class="btn-group pull-left inline-left">
				<button class="btn btn-success btn-small">Admin Panel</button>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	{{/if}}
</div>