<?php
/* For licensing terms, see /chamilo_license.txt */

$cidReset = true;

require_once '../inc/global.inc.php';

$tpl = new Template(get_lang('ResourceSequencing'));
$layout = $tpl->get_template('admin/resource_sequence.tpl');
$form = new FormValidator('');
$sessionList = SessionManager::get_sessions_list();

if (!empty($sessionList)) {
    //$sessionList[] = ['name' => get_lang('PleaseSelect'), 'id' => 0];
    $sessionList = array_column($sessionList, 'name', 'id');
}

$form->addHidden('sequence_type', 'session');
$form->addSelect(
    'sessions',
    get_lang('Sessions'),
    $sessionList,
    ['id' => 'item', 'multiple' => 'multiple']
);
$form->addButtonNext(get_lang('UseAsReference'), 'use_as_reference');
$form->addButtonCreate(get_lang('SetAsRequirementForSelected'), 'set_requirement');
$form->addButtonSave(get_lang('Save'), 'save_resource');

$tpl->assign('left_block', $form->returnForm());
$tpl->display($layout);
