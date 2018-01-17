<?php
namespace Sunnydevbox\Boticajohn\Models;

use \Sunnydevbox\TWUser\Models\User as TWUserModel;
use \Sunnydevbox\TWCore\Repositories\TWMetaTrait;

class User extends TWUserModel
{
    use TWMetaTrait;

    protected $meta = [
        'first_name',
        'middle_name',
        'last_name',
        'phone',
        'address_1',
        'city',
        'state',
        'zipcode',
    ];
}