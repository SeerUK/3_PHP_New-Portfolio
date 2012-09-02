{{include file='.\RootHeader.tpl'}}

<div id="container">
    <div class="row-fluid n100ph">
        <div class="span3">
            <div class="bubble">
                <ul id="primary-navigation">
                    <li><a class="active" href="#">Home</a></li>
                    <li><a href="#">Skills</a></li>
                    <li><a href="#">Portfolio</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <br />
            <blockquote class="pull-right">
                <p><strong>Elliot Wright</strong></p>
                <small>PHP Web Developer</small>
            </blockquote>
        </div>
        <div class="span5 relative n100ph">
            <p class="lead">Thanks for stopping by! Why don't you take a look around?</p>
            <p>I like to work on a lot of things, if you want to see pretty much everything I'm working on (publically) at the moment, check out the 'Recent Activity' feed to the right!</p>
            <p>The major projects I'm working on at the moment you can find described in a bit more detail by checking out the box below, or looking at my <a href="#">portfolio page</a>.</p>
            <div id="currentproj" class="well bottom">
                <img src="{{$smarty.const.STATIC_ROOT}}images/projects/140_140_thnm.jpg" class="left img-polaroid" alt="" title="" style="margin-right: 10px;" />
                <p><strong>Top Hats &amp; Monocles</strong> (<abbr title="Top Hats & Monocles">THNM</abbr>)</p>
                <p><abbr title="Top Hats & Monocles">THNM</abbr> is a live game streaming website for multiple streamers to use to entertain viewers.</p>
                <button class="btn btn-success">View Project</button>
            </div>
            <!--
            <div class="well ">
                <div class="progress progress-info">
                    <div class="bar" style="width: 80%"></div>
                </div>
                <span><strong>Busyness level: </strong>I'm actually pretty busy at the moment, argh!</span>
            </div>
            <!--<p class="lead">The most important thing I'm going to be saying will go in this bit of text here; for it shall stand out to the reader and draw their attention in.</p>
            <p>It shall be quickly followed by some other (probably irrelevant and boring) text here that the person reading shall then also read because they had read the previous paragraph.</p>
            <p>Of course in reality, I'll no doubt have projects I'm working on here, their screenshots (or a screenshot at least) with some nice looking buttons to check it out and the like. Having some nice buttons will look great here.</p>
            <p>I'm actually curious to see if anyone is reading this far, if they are they must <em>REALLY</em> have nothing else to do with their time other than waste it.</p>-->
        </div>
        <div class="span4">
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
        </div>
        <div class="clearfix"></div>
    </div>
</div>

{{include file='.\RootFooter.tpl'}}
