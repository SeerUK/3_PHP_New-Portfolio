<?php /* Smarty version Smarty-3.1.11, created on 2012-08-29 06:44:52
         compiled from "C:\PDE\3_PHP_New-Portfolio\public_html\modules\templates\Root\RootHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10695503dba644e32a6-77669110%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85dfc10389d1b68ac605ecd9f4f3ddd03caaf0e2' => 
    array (
      0 => 'C:\\PDE\\3_PHP_New-Portfolio\\public_html\\modules\\templates\\Root\\RootHeader.tpl',
      1 => 1346221584,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10695503dba644e32a6-77669110',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'strPageTitle' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_503dba6454db00_87201293',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_503dba6454db00_87201293')) {function content_503dba6454db00_87201293($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['strPageTitle']->value;?>
 | <?php echo @TITLE;?>
</title>

        <!-- Include Typekit Fonts -->
        <script type="text/javascript" src="//use.typekit.net/dka5fzj.js"></script>
        <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

        <!-- Include Stylesheets -->
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
<?php }} ?>