<?php

return [
    'tables'    => [
        'branches'  => 'branches',
    ],

    'models'	=> [
    	'branch'	=> 'Sunnydevbox\\Boticajohn\\Models\\Branch',
    ],

    'controllers'	=> [
    	'brach'		=> 'Sunnydevbox\\Boticajohn\\Http\\Controllers\\API\V1\\BranchController',
    ],
];