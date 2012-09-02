<?php /* Smarty version Smarty-3.1.11, created on 2012-09-02 20:13:08
         compiled from "C:\PDE\3_PHP_New-Portfolio\public_html\modules\templates\Root\RootHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14513503e522916f461-00247689%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85dfc10389d1b68ac605ecd9f4f3ddd03caaf0e2' => 
    array (
      0 => 'C:\\PDE\\3_PHP_New-Portfolio\\public_html\\modules\\templates\\Root\\RootHeader.tpl',
      1 => 1346616785,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14513503e522916f461-00247689',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_503e5229206355_21708974',
  'variables' => 
  array (
    'strPageTitle' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_503e5229206355_21708974')) {function content_503e5229206355_21708974($_smarty_tpl) {?><!DOCTYPE html>
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
<?php }} ?>