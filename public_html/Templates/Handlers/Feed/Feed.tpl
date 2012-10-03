<ul class="epic-list">
	<li class="header">Recent Activity</li>
	{{foreach $feed as $feedItem}}
		<li class="ellipsis">
			<span class="pull-left sprite sprite-{{$feedItem.type}}" title="{{$feedItem.type}}"></span>
			<p class="ellipsis">
				{{if isset($feedItem.owner.url) }}
					<a href="{{$feedItem.owner.url}}" target="_blank">{{$feedItem.owner.name}}</a>
				{{else}}}
					{{$feedItem.owner.name}}
				{{/if}}
				{{$feedItem.content.message}} <a href="{{$feedItem.content.url}}" target="_blank">{{$feedItem.content.subject}}</a>
			</p>
			<p>{{$feedItem.timestamp}}</p>
		</li>
	{{/foreach}}
</ul>