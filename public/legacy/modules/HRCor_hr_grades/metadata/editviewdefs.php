<?php
$module_name = 'HRCor_hr_grades';
$viewdefs [$module_name] = 
array (
  'EditView' => 
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
            'name' => 'base_salary',
            'label' => 'LBL_BASE_SALARY',
          ),
          1 => 
          array (
            'name' => 'commission_rate',
            'label' => 'LBL_COMMISSION_RATE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'kpi_salary',
            'label' => 'LBL_KPI_SALARY',
          ),
          1 => 
          array (
            'name' => 'si_rate',
            'label' => 'LBL_SI_RATE',
          ),
        ),
        2 => 
        array (
          0 => 'description',
        ),
      ),
    ),
  ),
);
