<?php /*%%SmartyHeaderCode:169250444d6acf4f29-77992216%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7182726eb94eaedcc50b470ed495c6c6c3f7f276' => 
    array (
      0 => 'modules\\templates\\Root\\Root.tpl',
      1 => 1346653986,
      2 => 'file',
    ),
    '85dfc10389d1b68ac605ecd9f4f3ddd03caaf0e2' => 
    array (
      0 => 'C:\\PDE\\3_PHP_New-Portfolio\\public_html\\modules\\templates\\Root\\RootHeader.tpl',
      1 => 1346654719,
      2 => 'file',
    ),
    'e02bfdb69245e6c3fbe08a8ac9807d54295dafd8' => 
    array (
      0 => 'C:\\PDE\\3_PHP_New-Portfolio\\public_html\\modules\\templates\\Root\\RootFooter.tpl',
      1 => 1346653962,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '169250444d6acf4f29-77992216',
  'cache_lifetime' => 3600,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50445200a83a76_33587226',
  'variables' => 
  array (
    'arrFeed' => 0,
    'entry' => 0,
  ),
  'has_nocache_code' => false,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50445200a83a76_33587226')) {function content_50445200a83a76_33587226($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
    <head>
        <title>Portfolio · Elliot Wright</title>

        <!-- Include Typekit Fonts -->
        <script type="text/javascript" src="//use.typekit.net/dka5fzj.js"></script>
        <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

        <!-- Include Stylesheets -->
        <link rel="stylesheet" href="//ewp.pde.com/static/css/bootstrap.css" />
        <link rel="stylesheet" href="//ewp.pde.com/static/css/main.css" />
        <link rel="stylesheet" href="//ewp.pde.com/static/css/dev.css" />

        <!-- Include JavaScript -->
        <script src="//ewp.pde.com/static/js/jquery.min.js" type="text/javascript"></script>
        <script src="//ewp.pde.com/static/js/modernizer.js" type="text/javascript"></script>
        <script src="//ewp.pde.com/static/js/ewp.js" type="text/javascript"></script>

    </head>
    <body>
        <div id="container">
            <div class="row-fluid n100ph">
                <div class="span3">
                    <div class="bubble">
                        <nav>
                            <ul id="primary-navigation">
                                                                    <li><a  href="?module=root&invoke=root">Home</a></li>
                                                                    <li><a  href="?module=root&invoke=skills">Skills</a></li>
                                                                    <li><a  class="active"  href="?module=root&invoke=portfolio">Portfolio</a></li>
                                                                    <li><a  href="?module=root&invoke=contact">Contact</a></li>
                                                            </ul>
                        </nav>
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
        <img src="//ewp.pde.com/static/images/projects/140_140_thnm.jpg" class="left img-polaroid" alt="" title="" style="margin-right: 10px;" />
        <p><strong>Top Hats &amp; Monocles</strong> (<abbr title="Top Hats & Monocles">THNM</abbr>)</p>
        <p><abbr title="Top Hats & Monocles">THNM</abbr> is a live game streaming website for multiple streamers to use to entertain viewers.</p>
        <button class="btn btn-success">View Project</button>
    </div>
</div>
<div class="span4">
    <div class="bubble">
        <div class="feed">
            <h1>Recent Activity</h1>
            

<style type="text/css">

.err {
	margin:-16px -10px 0 -10px; 
	padding: 0px 10px 10px 10px; 
	font-family: Cambria,'PT Sans',Arial,Helvetica,sans-serif;
	color:white;
	background-color: #c33;
	}

.err a {
	color: black;
	}

</style>

<div class="err">

<br />
<font size='1'><table class='xdebug-error xe-notice' dir='ltr' border='1' cellspacing='0' cellpadding='1'>
<tr><th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> Notice: Undefined index: arrFeed in C:\PDE\3_PHP_New-Portfolio\public_html\templates_c\7182726eb94eaedcc50b470ed495c6c6c3f7f276.file.Root.tpl.cache.php on line <i>48</i></th></tr>
<tr><th align='left' bgcolor='#e9b96e' colspan='5'>Call Stack</th></tr>
<tr><th align='center' bgcolor='#eeeeec'>#</th><th align='left' bgcolor='#eeeeec'>Time</th><th align='left' bgcolor='#eeeeec'>Memory</th><th align='left' bgcolor='#eeeeec'>Function</th><th align='left' bgcolor='#eeeeec'>Location</th></tr>
<tr><td bgcolor='#eeeeec' align='center'>1</td><td bgcolor='#eeeeec' align='center'>0.0008</td><td bgcolor='#eeeeec' align='right'>330480</td><td bgcolor='#eeeeec'>{main}(  )</td><td title='C:\PDE\3_PHP_New-Portfolio\public_html\index.php' bgcolor='#eeeeec'>..\index.php<b>:</b>0</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>2</td><td bgcolor='#eeeeec' align='center'>0.0016</td><td bgcolor='#eeeeec' align='right'>345040</td><td bgcolor='#eeeeec'>require_once( <font color='#00bb00'>'C:\PDE\3_PHP_New-Portfolio\public_html\init.php'</font> )</td><td title='C:\PDE\3_PHP_New-Portfolio\public_html\index.php' bgcolor='#eeeeec'>..\index.php<b>:</b>15</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>3</td><td bgcolor='#eeeeec' align='center'>0.0572</td><td bgcolor='#eeeeec' align='right'>3061240</td><td bgcolor='#eeeeec'>TemplateHandler->__construct(  )</td><td title='C:\PDE\3_PHP_New-Portfolio\public_html\init.php' bgcolor='#eeeeec'>..\init.php<b>:</b>70</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>4</td><td bgcolor='#eeeeec' align='center'>0.0572</td><td bgcolor='#eeeeec' align='right'>3061240</td><td bgcolor='#eeeeec'>TemplateHandler->ValidateURI(  )</td><td title='C:\PDE\3_PHP_New-Portfolio\public_html\handlers\template.handler.php' bgcolor='#eeeeec'>..\template.handler.php<b>:</b>36</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>5</td><td bgcolor='#eeeeec' align='center'>0.0587</td><td bgcolor='#eeeeec' align='right'>3086152</td><td bgcolor='#eeeeec'>TemplateReq->__construct(  )</td><td title='C:\PDE\3_PHP_New-Portfolio\public_html\handlers\template.handler.php' bgcolor='#eeeeec'>..\template.handler.php<b>:</b>91</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>6</td><td bgcolor='#eeeeec' align='center'>0.0589</td><td bgcolor='#eeeeec' align='right'>3093232</td><td bgcolor='#eeeeec'>RootUI->Portfolio(  )</td><td title='C:\PDE\3_PHP_New-Portfolio\public_html\handlers\template.handler.php' bgcolor='#eeeeec'>..\template.handler.php<b>:</b>148</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>7</td><td bgcolor='#eeeeec' align='center'>0.0589</td><td bgcolor='#eeeeec' align='right'>3095008</td><td bgcolor='#eeeeec'>Smarty_Internal_TemplateBase->display(  )</td><td title='C:\PDE\3_PHP_New-Portfolio\public_html\modules\Root.module.class.php' bgcolor='#eeeeec'>..\Root.module.class.php<b>:</b>60</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>8</td><td bgcolor='#eeeeec' align='center'>0.0589</td><td bgcolor='#eeeeec' align='right'>3095136</td><td bgcolor='#eeeeec'>Smarty_Internal_TemplateBase->fetch(  )</td><td title='C:\PDE\3_PHP_New-Portfolio\public_html\handlers\template.libs\sysplugins\smarty_internal_templatebase.php' bgcolor='#eeeeec'>..\smarty_internal_templatebase.php<b>:</b>374</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>9</td><td bgcolor='#eeeeec' align='center'>0.1315</td><td bgcolor='#eeeeec' align='right'>5797480</td><td bgcolor='#eeeeec'>content_50444d6add73a3_11454081(  )</td><td title='C:\PDE\3_PHP_New-Portfolio\public_html\handlers\template.libs\sysplugins\smarty_internal_templatebase.php' bgcolor='#eeeeec'>..\smarty_internal_templatebase.php<b>:</b>180</td></tr>
</table></font>
</div>

<style type="text/css">

.err {
	margin:-16px -10px 0 -10px; 
	padding: 0px 10px 10px 10px; 
	font-family: Cambria,'PT Sans',Arial,Helvetica,sans-serif;
	color:white;
	background-color: #c33;
	}

.err a {
	color: black;
	}

</style>

<div class="err">

<br />
<font size='1'><table class='xdebug-error xe-notice' dir='ltr' border='1' cellspacing='0' cellpadding='1'>
<tr><th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> Notice: Trying to get property of non-object in C:\PDE\3_PHP_New-Portfolio\public_html\templates_c\7182726eb94eaedcc50b470ed495c6c6c3f7f276.file.Root.tpl.cache.php on line <i>48</i></th></tr>
<tr><th align='left' bgcolor='#e9b96e' colspan='5'>Call Stack</th></tr>
<tr><th align='center' bgcolor='#eeeeec'>#</th><th align='left' bgcolor='#eeeeec'>Time</th><th align='left' bgcolor='#eeeeec'>Memory</th><th align='left' bgcolor='#eeeeec'>Function</th><th align='left' bgcolor='#eeeeec'>Location</th></tr>
<tr><td bgcolor='#eeeeec' align='center'>1</td><td bgcolor='#eeeeec' align='center'>0.0008</td><td bgcolor='#eeeeec' align='right'>330480</td><td bgcolor='#eeeeec'>{main}(  )</td><td title='C:\PDE\3_PHP_New-Portfolio\public_html\index.php' bgcolor='#eeeeec'>..\index.php<b>:</b>0</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>2</td><td bgcolor='#eeeeec' align='center'>0.0016</td><td bgcolor='#eeeeec' align='right'>345040</td><td bgcolor='#eeeeec'>require_once( <font color='#00bb00'>'C:\PDE\3_PHP_New-Portfolio\public_html\init.php'</font> )</td><td title='C:\PDE\3_PHP_New-Portfolio\public_html\index.php' bgcolor='#eeeeec'>..\index.php<b>:</b>15</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>3</td><td bgcolor='#eeeeec' align='center'>0.0572</td><td bgcolor='#eeeeec' align='right'>3061240</td><td bgcolor='#eeeeec'>TemplateHandler->__construct(  )</td><td title='C:\PDE\3_PHP_New-Portfolio\public_html\init.php' bgcolor='#eeeeec'>..\init.php<b>:</b>70</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>4</td><td bgcolor='#eeeeec' align='center'>0.0572</td><td bgcolor='#eeeeec' align='right'>3061240</td><td bgcolor='#eeeeec'>TemplateHandler->ValidateURI(  )</td><td title='C:\PDE\3_PHP_New-Portfolio\public_html\handlers\template.handler.php' bgcolor='#eeeeec'>..\template.handler.php<b>:</b>36</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>5</td><td bgcolor='#eeeeec' align='center'>0.0587</td><td bgcolor='#eeeeec' align='right'>3086152</td><td bgcolor='#eeeeec'>TemplateReq->__construct(  )</td><td title='C:\PDE\3_PHP_New-Portfolio\public_html\handlers\template.handler.php' bgcolor='#eeeeec'>..\template.handler.php<b>:</b>91</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>6</td><td bgcolor='#eeeeec' align='center'>0.0589</td><td bgcolor='#eeeeec' align='right'>3093232</td><td bgcolor='#eeeeec'>RootUI->Portfolio(  )</td><td title='C:\PDE\3_PHP_New-Portfolio\public_html\handlers\template.handler.php' bgcolor='#eeeeec'>..\template.handler.php<b>:</b>148</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>7</td><td bgcolor='#eeeeec' align='center'>0.0589</td><td bgcolor='#eeeeec' align='right'>3095008</td><td bgcolor='#eeeeec'>Smarty_Internal_TemplateBase->display(  )</td><td title='C:\PDE\3_PHP_New-Portfolio\public_html\modules\Root.module.class.php' bgcolor='#eeeeec'>..\Root.module.class.php<b>:</b>60</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>8</td><td bgcolor='#eeeeec' align='center'>0.0589</td><td bgcolor='#eeeeec' align='right'>3095136</td><td bgcolor='#eeeeec'>Smarty_Internal_TemplateBase->fetch(  )</td><td title='C:\PDE\3_PHP_New-Portfolio\public_html\handlers\template.libs\sysplugins\smarty_internal_templatebase.php' bgcolor='#eeeeec'>..\smarty_internal_templatebase.php<b>:</b>374</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>9</td><td bgcolor='#eeeeec' align='center'>0.1315</td><td bgcolor='#eeeeec' align='right'>5797480</td><td bgcolor='#eeeeec'>content_50444d6add73a3_11454081(  )</td><td title='C:\PDE\3_PHP_New-Portfolio\public_html\handlers\template.libs\sysplugins\smarty_internal_templatebase.php' bgcolor='#eeeeec'>..\smarty_internal_templatebase.php<b>:</b>180</td></tr>
</table></font>
</div>        </div>
    </div>
</div>

                <div class="clearfix"></div>
            </div>
        </div>
    </body>
</html>

<?php }} ?>