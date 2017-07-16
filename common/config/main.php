<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        
    ],
     'modules' => [
         'gridview' => [
          'class' => '\kartik\grid\Module',
          // see settings on http://demos.krajee.com/grid#module
      ],
      'datecontrol' => [
          'class' => '\kartik\datecontrol\Module',
          // see settings on http://demos.krajee.com/datecontrol#module
      ],
      ],
];
