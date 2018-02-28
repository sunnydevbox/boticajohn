
<?php
namespace Sunnydevbox\Boticajohn\Repositories\User;

use Sunnydevbox\TWUser\Repositories\User\UserRepository as ExtendUserRepository;
use Sunnydevbox\TWCore\Repositories\TWBaseRepository;

class BranchRepository extends TWBaseRepository
{
    // protected $fieldSearchable = [
    //     'email'
    // ];



    public function model()
    {
    	return config('boticajohn.models.branch');
    }
}