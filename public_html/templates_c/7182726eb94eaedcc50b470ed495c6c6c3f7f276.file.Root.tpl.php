<?php /* Smarty version Smarty-3.1.11, created on 2012-08-30 06:27:20
         compiled from "modules\templates\Root\Root.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32600503e522907e401-19882931%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7182726eb94eaedcc50b470ed495c6c6c3f7f276' => 
    array (
      0 => 'modules\\templates\\Root\\Root.tpl',
      1 => 1346308039,
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

<?php echo $_smarty_tpl->getSubTemplate ('.\RootFooter.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>