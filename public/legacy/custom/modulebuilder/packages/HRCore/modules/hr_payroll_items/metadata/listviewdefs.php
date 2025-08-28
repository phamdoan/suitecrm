<?php
$module_name = 'HRCor_hr_payroll_items';
$listViewDefs [$module_name] = 
array (
  'EMPLOYEE_ID' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_EMPLOYEE_ID',
    'id' => 'USER_ID_C',
    'link' => true,
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
  'HR_GRADE_ID' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_HR_GRADE_ID',
    'id' => 'HRCOR_HR_GRADES_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'BASE_SALARY' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_BASE_SALARY',
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
