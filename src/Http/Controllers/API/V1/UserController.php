<?php

namespace Sunnydevbox\Recoveryhub\Http\Controllers\API\V1;

// use Dingo\Api\Http\Request;
// use Sunnydevbox\TWCore\Http\Controllers\APIBaseController;
// use Sunnydevbox\TWUser\Transformers\PermissionTransformer;
// use Sunnydevbox\TWUser\Transformers\RoleTransformer;
// use JWTAuth;
// use Tymon\JWTAuth\Exceptions\JWTException;
// use Illuminate\Support\Facades\Input;

use Sunnydevbox\TWUser\Http\Controllers\API\V1\UserController as ExtendUserController;

class UserController extends ExtendUserController
{
	public function __construct(
		\Sunnydevbox\Recoveryhub\Repositories\User\UserRepository $repository, 
		\Sunnydevbox\TWUser\Validators\UserValidator $validator,
		\Sunnydevbox\Recoveryhub\Transformers\UserTransformer $transformer
	) {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->transformer = $transformer;
	}
}