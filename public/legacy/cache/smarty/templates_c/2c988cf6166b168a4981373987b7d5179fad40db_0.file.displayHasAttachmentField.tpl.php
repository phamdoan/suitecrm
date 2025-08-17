<?php
/* Smarty version 4.5.3, created on 2025-08-14 13:36:21
  from '/Applications/MAMP/htdocs/suitecrm/public/legacy/modules/Emails/templates/displayHasAttachmentField.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_689de6550bc179_62609949',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c988cf6166b168a4981373987b7d5179fad40db' => 
    array (
      0 => '/Applications/MAMP/htdocs/suitecrm/public/legacy/modules/Emails/templates/displayHasAttachmentField.tpl',
      1 => 1738223969,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_689de6550bc179_62609949 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Applications/MAMP/htdocs/suitecrm/public/legacy/include/Smarty/plugins/function.sugar_getimagepath.php','function'=>'smarty_function_sugar_getimagepath',),));
?>

<div class="email-has-attachement">
    <?php if (!empty($_smarty_tpl->tpl_vars['bean']->value)) {?>
        <?php if (!empty($_smarty_tpl->tpl_vars['bean']->value['has_attachment'])) {?>
            <div class="email-has-attachment"><span class="glyphicon"><img src="<?php echo smarty_function_sugar_getimagepath(array('directory'=>'','file_name'=>'attachment-indicator','file_extension'=>"svg",'file'=>'attachment-indicator.svg'),$_smarty_tpl);?>
"/></span></div>
        <?php }?>

    <?php }?>
</div>
<?php }
}
