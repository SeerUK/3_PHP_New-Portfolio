<?php /* Smarty version Smarty-3.1.11, created on 2012-09-06 20:28:21
         compiled from "modules\templates\Root\Root.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1146050490765a1f830-68631682%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7182726eb94eaedcc50b470ed495c6c6c3f7f276' => 
    array (
      0 => 'modules\\templates\\Root\\Root.tpl',
      1 => 1346960544,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1146050490765a1f830-68631682',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arrFeed' => 0,
    'entry' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50490765a97540_18379627',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50490765a97540_18379627')) {function content_50490765a97540_18379627($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('.\RootHeader.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>


<div class="span5 relative n100ph">
	<p class="lead">Thanks for stopping by! Why don't you take a look around?</p>
	<p>I like to work on a lot of things, if you want to see pretty much everything I'm working on (publically) at the moment, check out the 'Recent Activity' feed to the right!</p>
	<p>The major projects I'm working on at the moment you can find described in a bit more detail by checking out the box below, or looking at my <a href="?module=Root&amp;invoke=Portfolio">portfolio page</a>.</p>
	<div id="currentproj" class="well bottom">
		<img src="<?php echo @STATIC_ROOT;?>
images/projects/140_140_thnm.jpg" class="left img-polaroid" alt="" title="" style="margin-right: 10px;" />
		<p><strong>Top Hats &amp; Monocles</strong> (<abbr title="Top Hats &amp; Monocles">THNM</abbr>)</p>
		<p><abbr title="Top Hats &amp; Monocles">THNM</abbr> is a live game streaming website for multiple streamers to use to entertain viewers.</p>
		<button class="btn btn-success">View Project</button>
	</div>
</div>
<div class="span4">
	<div class="bubble">
		<div class="feed">
			<h1>Recent Activity</h1>
			<?php  $_smarty_tpl->tpl_vars['entry'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['entry']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrFeed']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['entry']->key => $_smarty_tpl->tpl_vars['entry']->value){
$_smarty_tpl->tpl_vars['entry']->_loop = true;
?>
				<span class="entry <?php echo $_smarty_tpl->tpl_vars['entry']->value['type'];?>
">
					<img src="<?php echo @STATIC_ROOT;?>
images/feed/<?php echo $_smarty_tpl->tpl_vars['entry']->value['type'];?>
.png" class="left imgFeedType" alt="<?php echo $_smarty_tpl->tpl_vars['entry']->value['type'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['entry']->value['type'];?>
" />
					<div><?php echo $_smarty_tpl->tpl_vars['entry']->value['content'];?>
</div>
					<div><?php echo $_smarty_tpl->tpl_vars['entry']->value['timestamp'];?>
</div>
				</span>
			<?php } ?>
		</div>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('.\RootFooter.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

<?php }} ?>