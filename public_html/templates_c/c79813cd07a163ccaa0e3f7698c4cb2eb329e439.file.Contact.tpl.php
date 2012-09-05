<?php /* Smarty version Smarty-3.1.11, created on 2012-09-04 19:59:24
         compiled from "modules\templates\Root\Contact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:93835044ebd8b22444-92128587%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c79813cd07a163ccaa0e3f7698c4cb2eb329e439' => 
    array (
      0 => 'modules\\templates\\Root\\Contact.tpl',
      1 => 1346788763,
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
    <form method="POST">
        <div id="cntContact">
            <div class="row-fluid">
                <div class="span4">
                    <div  class="bubble">
                        <p class="header">Your information</p>
                        <div class="wwell">
                            <input type="text" placeholder="Name" />
                            <input type="text" placeholder="E-Mail Address" />
                            <input type="text" placeholder="Subject" />
                        </div>
                    </div>
                    <div class="headers">
                        <div class="bubble">
                            <div class="wwell">
                                <address>
                                    <strong>Alternate Contact Details:</strong><br />
                                    <abbr title="Phone">P:</abbr> +44 1484 321853<br />
                                    <abbr title="Mobile">M:</abbr> +44 7413 773704<br />
                                    <abbr title="E-Mail">E:</abbr> wright.elliot@gmail.com
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="span8">
                    <div class="bubble">
                        <p class="header">Your message</p>
                        <div class="wwell">
                            <textarea placeholder=" ..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <input type="submit" class="btn btn-success pull-right" value="Send Message" />
        <div class="clearfix"></div>
    </form>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('.\RootFooter.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>