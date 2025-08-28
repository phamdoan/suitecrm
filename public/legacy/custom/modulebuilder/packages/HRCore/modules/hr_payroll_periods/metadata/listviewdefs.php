<?php
$module_name = 'HRCor_hr_payroll_periods';
$listViewDefs [$module_name] = 
array (
  'PERIOD_START' => 
  array (
    'type' => 'date',
    'label' => 'LBL_PERIOD_START',
    'width' => '10%',
    'default' => true,
  ),
  'PERIOD_END' => 
  array (
    'type' => 'date',
    'label' => 'LBL_PERIOD_END',
    'width' => '10%',
    'default' => true,
  ),
  'STATUS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
);
