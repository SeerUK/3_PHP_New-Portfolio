{{include file='.\RootHeader.tpl'}}

<div class="bubble">
    <div class="feed">
        <h1>Recent Activity</h1>
        {{foreach $arrFeed as $entry}}
            <span class="entry {{$entry.type}}">
                <img src="{{$smarty.const.STATIC_ROOT}}images/feed/{{$entry.type}}.png" class="left imgFeedType" alt="{{$entry.type}}" title="{{$entry.type}}" />
                <div>{{$entry.content}}</div>
                <div>{{$entry.timestamp}}</div>
            </span>
        {{/foreach}}
    </div>
</div>

{{include file='.\RootFooter.tpl'}}
