<?php
namespace Sunnydevbox\Recoveryhub\Repositories\User;

use Sunnydevbox\TWUser\Repositories\User\UserRepository as ExtendUserRepository;

class UserRepository extends ExtendUserRepository 
{
    protected $fieldSearchable = [
        'email'
    ];
}