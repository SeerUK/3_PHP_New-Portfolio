{{include file='.\RootHeader.tpl'}}

<div class="span5 relative n100ph">
	<p class="lead serif nitalic">Thanks for stopping by! Why don't you take a look around?</p>
	<p>I like to work on a lot of things, if you want to see pretty much everything I'm working on (publically) at the moment, check out the 'Recent Activity' feed to the right!</p>
	<p>The major projects I'm working on at the moment you can find described in a bit more detail by checking out the box below, or looking at my <a href="{{$smarty.const.ROOT}}Home/Portfolio/">portfolio page</a>.</p>
	<div id="currentproj" class="well bottom">
		<img src="{{$smarty.const.STATIC_ROOT}}images/projects/140_140_thnm.jpg" class="left img-polaroid" alt="" title="" style="margin-right: 10px;" />
		<p><strong>Top Hats &amp; Monocles</strong> (<abbr title="Top Hats &amp; Monocles">THNM</abbr>)</p>
		<p><abbr title="Top Hats &amp; Monocles">THNM</abbr> is a live game streaming website for multiple streamers to use to entertain viewers.</p>
		<button class="btn btn-success">View Project</button>
	</div>
</div>
<div class="span4">
	<div class="bubble">
		<div class="feed">
			<h1>Recent Activity</h1>
			{{foreach $arrFeed as $entry}}
				<span class="entry {{$entry.type}}">
					<img src="{{$smarty.const.STATIC_ROOT}}images/feed/{{$entry.type}}.png" class="left imgFeedType" alt="{{$entry.type}}" title="{{$entry.type}}" />
					<div class="title">{{$entry.content}}</div>
					<div>{{$entry.timestamp}}</div>
				</span>
			{{/foreach}}
		</div>
	</div>
</div>

{{include file='.\RootFooter.tpl'}}
