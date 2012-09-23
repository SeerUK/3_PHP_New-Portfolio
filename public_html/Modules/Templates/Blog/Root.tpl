{{include file='../LongHeader.tpl'}}

<div class="span9">
	{{foreach $arrBlogEntries as $arrBlogEntry}}
	<div class="blog-entry">
		<div class="bubble">
			<div class="wwell" style="padding-top: 0; padding-bottom: 10px;">
				<!-- {{$arrBlogEntry.strBlogTitle}} - Header Section -->
				<div class="page-header" style="margin-bottom: 10px;">
					<div class="blog-date pull-right serif">
						<div class="m">{{$arrBlogEntry.date.month|truncate:3:''}}</div>
						<div class="d">{{$arrBlogEntry.date.mday}}</div>
					</div>
					<h3 class="serif nnormal"><i>{{$arrBlogEntry.strBlogTitle}} <small>/ {{$arrBlogEntry.strBlogSubtitle}}</small></i></h3>
				</div>
				<!-- {{$arrBlogEntry.strBlogTitle}} - Content Section -->
				<div>
					{{$arrBlogEntry.strContent}}
				</div>
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
