<?php
/* Smarty version 4.5.3, created on 2025-08-16 04:24:50
  from '/Applications/MAMP/htdocs/suitecrm/public/legacy/modules/ModuleBuilder/tpls/assistantJavascript.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68a0081229c827_57807231',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '59300a4926a0a0e3c93a38ae20f0075520715ee4' => 
    array (
      0 => '/Applications/MAMP/htdocs/suitecrm/public/legacy/modules/ModuleBuilder/tpls/assistantJavascript.tpl',
      1 => 1738223969,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68a0081229c827_57807231 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>

if(typeof(Assistant)!="undefined" && Assistant.mbAssistant){
	//Assistant.mbAssistant.render(document.body);

<?php if ($_smarty_tpl->tpl_vars['userPref']->value) {?>
	Assistant.processUserPref("<?php echo $_smarty_tpl->tpl_vars['userPref']->value;?>
");
<?php }
if ((isset($_smarty_tpl->tpl_vars['assistant']->value['key'])) && (isset($_smarty_tpl->tpl_vars['assistant']->value['group']))) {?>
	Assistant.mbAssistant.setBody(SUGAR.language.get('ModuleBuilder','assistantHelp').<?php echo $_smarty_tpl->tpl_vars['assistant']->value['group'];?>
.<?php echo $_smarty_tpl->tpl_vars['assistant']->value['key'];?>
);
<?php }?>

	if(Assistant.mbAssistant.visible){
		Assistant.mbAssistant.show();
		}
}

<?php echo '</script'; ?>
><?php }
}
