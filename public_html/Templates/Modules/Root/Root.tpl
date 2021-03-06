{{include file='../../Base/RootHeader.tpl'}}

<div class="span9">
	<div class="content-row">
		<div class="content-col">
			<p class="lead serif"><em>Thanks for stopping by! Why don't you take a look around?</em></p>
			<p>
				I like to work on a lot of things, if you want to see pretty much everything I'm working on (publically) at the moment, check out the 'Recent Activity' feed
				<span>
					<span class="visible-desktop">to the right!</span>
					<span class="hidden-desktop">further down the page.</span>
				</span>
			</p>
			<p>The major projects I'm working on at the moment you can find described in a bit more detail by <span class="hidden-phone">checking out the box below, or </span>looking at my <a href="{{$smarty.const.ROOT}}Home/Portfolio/">portfolio page</a>.</p>
			<div class="mini-project hidden-phone well">
				<img src="{{$smarty.const.STATIC_ROOT}}images/projects/140_140_thnm.jpg" class="pull-left img-polaroid" alt="" title="" width="140" height="140" />
				<div class="desc">
					<p class="header"><strong>Top Hats &amp; Monocles</strong> (<abbr title="Top Hats &amp; Monocles">THNM</abbr>)</p>
					<p class="desc"><abbr title="Top Hats &amp; Monocles">THNM</abbr> is a live streaming website for multiple streamers to use to entertain viewers.</p>
					<p>The website is being redeveloped with better code and functionality in mind.</p>
				</div>
				<button class="btn btn-success btn-fancy btn-block">View Project</button>
			</div>
		</div>
		<div class="well well-container well-invisible well-mini hidden-desktop hidden-tablet"></div>
			<div class="content-col">
				<div class="bubble">
					{{include file='../../Handlers/Feed/Feed.tpl'}}
				</div>
			</div>
		</div>
	</div>
</div>

{{include file='../../Base/RootFooter.tpl'}}
