<?php /* Smarty version Smarty-3.1.11, created on 2012-09-03 17:34:50
         compiled from "C:\PDE\3_PHP_New-Portfolio\public_html\modules\templates\Root\RootHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:106655044ea3a456989-70438688%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85dfc10389d1b68ac605ecd9f4f3ddd03caaf0e2' => 
    array (
      0 => 'C:\\PDE\\3_PHP_New-Portfolio\\public_html\\modules\\templates\\Root\\RootHeader.tpl',
      1 => 1346654719,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '106655044ea3a456989-70438688',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'strPageTitle' => 0,
    'arrPrimaryNavigation' => 0,
    'strPrimaryNavigationKey' => 0,
    'strPrimaryNavigationItem' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5044ea3a52b4d2_09940038',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5044ea3a52b4d2_09940038')) {function content_5044ea3a52b4d2_09940038($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['strPageTitle']->value;?>
 · <?php echo @TITLE;?>
</title>

        <!-- Include Typekit Fonts -->
        <script type="text/javascript" src="//use.typekit.net/dka5fzj.js"></script>
        <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

        <!-- Include Stylesheets -->
        <link rel="stylesheet" href="<?php echo @STATIC_ROOT;?>
css/bootstrap.css" />
        <link rel="stylesheet" href="<?php echo @STATIC_ROOT;?>
css/main.css" />
        <link rel="stylesheet" href="<?php echo @STATIC_ROOT;?>
css/dev.css" />

        <!-- Include JavaScript -->
        <script src="<?php echo @STATIC_ROOT;?>
js/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo @STATIC_ROOT;?>
js/modernizer.js" type="text/javascript"></script>
        <script src="<?php echo @STATIC_ROOT;?>
js/ewp.js" type="text/javascript"></script>

    </head>
    <body>
        <div id="container">
            <div class="row-fluid n100ph">
                <div class="span3">
                    <div class="bubble">
                        <nav>
                            <ul id="primary-navigation">
                                <?php  $_smarty_tpl->tpl_vars['strPrimaryNavigationItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['strPrimaryNavigationItem']->_loop = false;
 $_smarty_tpl->tpl_vars['strPrimaryNavigationKey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arrPrimaryNavigation']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['strPrimaryNavigationItem']->key => $_smarty_tpl->tpl_vars['strPrimaryNavigationItem']->value){
$_smarty_tpl->tpl_vars['strPrimaryNavigationItem']->_loop = true;
 $_smarty_tpl->tpl_vars['strPrimaryNavigationKey']->value = $_smarty_tpl->tpl_vars['strPrimaryNavigationItem']->key;
?>
                                    <li><a <?php if ($_smarty_tpl->tpl_vars['strPageTitle']->value==$_smarty_tpl->tpl_vars['strPrimaryNavigationKey']->value){?> class="active" <?php }?> href="<?php echo $_smarty_tpl->tpl_vars['strPrimaryNavigationItem']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['strPrimaryNavigationKey']->value;?>
</a></li>
                                <?php } ?>
                            </ul>
                        </nav>
                    </div>
                    <br />
                    <blockquote class="pull-right">
                        <p><strong>Elliot Wright</strong></p>
                        <small>PHP Web Developer</small>
                    </blockquote>
                </div>
<?php }} ?>