<?php /* Smarty version Smarty-3.1.11, created on 2012-09-02 20:56:49
         compiled from "modules\templates\Root\Root.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32600503e522907e401-19882931%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7182726eb94eaedcc50b470ed495c6c6c3f7f276' => 
    array (
      0 => 'modules\\templates\\Root\\Root.tpl',
      1 => 1346619408,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32600503e522907e401-19882931',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_503e5229149b95_73726387',
  'variables' => 
  array (
    'arrFeed' => 0,
    'entry' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_503e5229149b95_73726387')) {function content_503e5229149b95_73726387($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('.\RootHeader.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="container">
    <div class="row-fluid">
        <div class="span3">
            <div class="bubble">
                <ul id="primary-navigation">
                    <li><a class="active" href="#">Home</a></li>
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
        <div class="span5">
            <p class="lead">The most important thing I'm going to be saying will go in this bit of text here; for it shall stand out to the reader and draw their attention in.</p>
            <p>It shall be quickly followed by some other (probably irrelevant and boring) text here that the person reading shall then also read because they had read the previous paragraph.</p>
            <p>Of course in reality, I'll no doubt have projects I'm working on here, their screenshots (or a screenshot at least) with some nice looking buttons to check it out and the like. Having some nice buttons will look great here.</p>
            <p>I'm actually curious to see if anyone is reading this far, if they are they must <em>REALLY</em> have nothing else to do with their time other than waste it.</p>
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
        <div class="clearfix"></div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('.\RootFooter.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>