<?php
$module_name = 'HRCor_hr_grades';
$listViewDefs [$module_name] = 
array (
  'BASE_SALARY' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_BASE_SALARY',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'KPI_SALARY' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_KPI_SALARY',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'COMMISSION_RATE' => 
  array (
    'type' => 'decimal',
    'default' => true,
    'label' => 'LBL_COMMISSION_RATE',
    'width' => '10%',
  ),
  'SI_RATE' => 
  array (
    'type' => 'decimal',
    'default' => true,
    'label' => 'LBL_SI_RATE',
    'width' => '10%',
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'CREATED_BY_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CREATED',
    'id' => 'CREATED_BY',
    'width' => '10%',
    'default' => true,
  ),
);
