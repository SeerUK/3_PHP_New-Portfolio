{{include file='../LongHeader.tpl'}}

<div class="span9">
	{{foreach $arrBlogEntries as $arrBlogEntry}}
	<div class="bubble">
		<div class="well well-white">
			<!-- {{$arrBlogEntry.strBlogTitle}} - Header Section -->
			<div class="page-header">
				<div class="date serif">
					<div class="m"><em>{{$arrBlogEntry.date.month|truncate:3:''}}</em></div>
					<div class="d"><em>{{$arrBlogEntry.date.mday}}</em></div>
				</div>
				<p class="serif"><em>{{$arrBlogEntry.strBlogTitle}} <small>/ {{$arrBlogEntry.strBlogSubtitle}}</small></em></p>
			</div>
			<!-- {{$arrBlogEntry.strBlogTitle}} - Content Section -->
			<div class="story-content">
				{{$arrBlogEntry.strContent}}
			</div>
		</div>
	</div>
	{{/foreach}}

	<div class="pagination pull-right">
		<ul>
			<li><a href="#">Prev</a></li>
			<li class="disabled"><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">Next</a></li>
		</ul>
	</div>
	<div class="clearfix"></div>
</div>

{{include file='../LongFooter.tpl'}}
