<?php
namespace Sunnydevbox\NewsDeeply\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class BranchValidator extends LaravelValidator
{
	protected $rules = [
        ValidatorInterface::RULE_CREATE => [
        	// 'wp_id' 	=> 'required',
         //    'title'  	=> 'required',

            /** etc... */
        ],
        ValidatorInterface::RULE_UPDATE => [
            // 'wp_id' 	=> 'required',
            // 'title'  	=> 'required',

            /** etc... */
        ]
   ];
}