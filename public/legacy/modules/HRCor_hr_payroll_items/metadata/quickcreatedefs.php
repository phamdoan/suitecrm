<?php
$module_name = 'HRCor_hr_payroll_items';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'employee_id',
            'studio' => 'visible',
            'label' => 'LBL_EMPLOYEE_ID',
          ),
          1 => 
          array (
            'name' => 'hr_grade_id',
            'studio' => 'visible',
            'label' => 'LBL_HR_GRADE_ID',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'payroll_period_id',
            'studio' => 'visible',
            'label' => 'LBL_PAYROLL_PERIOD_ID',
          ),
          1 => 
          array (
            'name' => 'sales_amount',
            'label' => 'LBL_SALES_AMOUNT',
          ),
        ),
      ),
    ),
  ),
);
