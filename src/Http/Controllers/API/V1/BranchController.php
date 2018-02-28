<?php

namespace Sunnydevbox\Boticajohn\Http\Controllers\API\V1;

use Sunnydevbox\TWCore\Http\Controllers\APIBaseController;

class BranchController extends APIBaseController
{
	public function __construct(
		\Sunnydevbox\Boticajohn\Repositories\Branch\BranchRepository $repository, 
		\Sunnydevbox\Boticajohn\Validators\BranchValidator $validator,
		\Sunnydevbox\Boticajohn\Transformers\BranchTransformer $transformer
	) {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->transformer = $transformer;
	}
}