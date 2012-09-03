<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{$strPageTitle}} � {{$smarty.const.TITLE}}</title>

        <!-- Include Typekit Fonts -->
        <script type="text/javascript" src="//use.typekit.net/dka5fzj.js"></script>
        <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

        <!-- Include Stylesheets -->
        <link rel="stylesheet" href="{{$smarty.const.STATIC_ROOT}}css/bootstrap.css" />
        <link rel="stylesheet" href="{{$smarty.const.STATIC_ROOT}}css/main.css" />
        <link rel="stylesheet" href="{{$smarty.const.STATIC_ROOT}}css/dev.css" />

        <!-- Include JavaScript -->
        <script src="{{$smarty.const.STATIC_ROOT}}js/jquery.min.js" type="text/javascript"></script>
        <script src="{{$smarty.const.STATIC_ROOT}}js/modernizer.js" type="text/javascript"></script>
        <script src="{{$smarty.const.STATIC_ROOT}}js/ewp.js" type="text/javascript"></script>

    </head>
    <body>
        <div id="container">
            <div class="row-fluid n100ph">
                <div class="span3">
                    <div class="bubble">
                        <nav>
                            <ul id="primary-navigation">
                                {{foreach $arrPrimaryNavigation as $strPrimaryNavigationKey => $strPrimaryNavigationItem}}
                                    <li><a {{if $strPageTitle == $strPrimaryNavigationKey}} class="active" {{/if}} href="{{$strPrimaryNavigationItem}}">{{$strPrimaryNavigationKey}}</a></li>
                                {{/foreach}}
                            </ul>
                        </nav>
                    </div>
                    <br />
                    <blockquote class="pull-right">
                        <p><strong>Elliot Wright</strong></p>
                        <small>PHP Web Developer</small>
                    </blockquote>
                </div>
