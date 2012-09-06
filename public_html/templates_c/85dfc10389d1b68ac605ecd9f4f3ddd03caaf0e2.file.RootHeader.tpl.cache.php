<?php /* Smarty version Smarty-3.1.11, created on 2012-09-06 20:28:21
         compiled from "C:\PDE\3_PHP_New-Portfolio\public_html\modules\templates\Root\RootHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3063750490765aa3a60-55810989%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85dfc10389d1b68ac605ecd9f4f3ddd03caaf0e2' => 
    array (
      0 => 'C:\\PDE\\3_PHP_New-Portfolio\\public_html\\modules\\templates\\Root\\RootHeader.tpl',
      1 => 1346914000,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3063750490765aa3a60-55810989',
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
  'unifunc' => 'content_50490765b090d0_91431192',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50490765b090d0_91431192')) {function content_50490765b090d0_91431192($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $_smarty_tpl->tpl_vars['strPageTitle']->value;?>
 | <?php echo @TITLE;?>
</title>

		<!-- Include Stylesheets -->
		<link rel="stylesheet" href="<?php echo @STATIC_ROOT;?>
css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo @STATIC_ROOT;?>
css/main.css" />

		<!-- Include JavaScript -->
		<script src="<?php echo @STATIC_ROOT;?>
js/jquery.min.js" type="text/javascript"></script>
		<script src="<?php echo @STATIC_ROOT;?>
js/bootstrap.js" type="text/javascript"></script>
		<script src="<?php echo @STATIC_ROOT;?>
js/modernizer.js" type="text/javascript"></script>
		<script src="<?php echo @STATIC_ROOT;?>
js/ewp.js" type="text/javascript"></script>

	</head>
	<body>
		<div id="errContainer">
			<div class="alert alert-error">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Error:</strong> There was a problem processing your login details.
			</div>
		</div>
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