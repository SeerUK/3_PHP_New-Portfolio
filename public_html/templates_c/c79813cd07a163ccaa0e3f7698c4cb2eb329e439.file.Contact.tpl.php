<?php /* Smarty version Smarty-3.1.11, created on 2012-09-03 18:09:10
         compiled from "modules\templates\Root\Contact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:93835044ebd8b22444-92128587%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c79813cd07a163ccaa0e3f7698c4cb2eb329e439' => 
    array (
      0 => 'modules\\templates\\Root\\Contact.tpl',
      1 => 1346695749,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '93835044ebd8b22444-92128587',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5044ebd8b81522_75989382',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5044ebd8b81522_75989382')) {function content_5044ebd8b81522_75989382($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('.\RootHeader.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="span9">
    <p class="lead">Wanting to get in touch?</p>
    <p>Just use the form below or contact me via the other contact details shown on this page!</p>
    <div class="fluid-row">
        <div class="well">
            <div class="span5">
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-user"></i></span>
                    <input type="text" placeholder="Your name..." />
                </div>
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-envelope"></i></span>
                    <input type="text" placeholder="Your email address..." />
                </div>
                <br />
                <div>
                    <strong>Alternate Contact Details</strong><br />
                    <abbr title="Phone">P:</abbr> +44 1484 321853<br />
                    <abbr title="Mobile">M:</abbr> +44 7413 773704<br />
                    <abbr title="Email">E:</abbr> wright.elliot@gmail.com
                </div>
            </div>
            <div class="span7">
                <textarea style="margin: 0px 0px 9px; width: 401px; height: 229px;" placeholder="Your message..."></textarea>
            </div>
            <input type="submit" class="btn btn-success pull-right" value="Send" />
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('.\RootFooter.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>