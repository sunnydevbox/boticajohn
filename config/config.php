<?php

return [
    'tables'    => [
        'branches'  => 'branches',
    ],

    'models'	=> [
    	'branch'	=> 'Sunnydevbox\\Boticajohn\\Models\\Branch',
    ],

    'controllers'	=> [
    	'branch'		=> 'Sunnydevbox\\Boticajohn\\Http\\Controllers\\API\V1\\BranchController',
    ],
];