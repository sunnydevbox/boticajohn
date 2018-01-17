<?php
namespace Sunnydevbox\Boticajohn\Models;

use \Sunnydevbox\TWUser\Models\User as TWUserModel;
use \Sunnydevbox\TWCore\Repositories\TWMetaTrait;
use \Sunnydevbox\TWEvents\Traits\EventTrait;

class User extends TWUserModel
{

    use TWMetaTrait;
    use EventTrait;

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