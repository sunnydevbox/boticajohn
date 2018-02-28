<?php

namespace Sunnydevbox\Boticajohn\Transformers;

// use Dingo\Api\Http\Request;
// use Dingo\Api\Transformer\Binding;
// use Dingo\Api\Contract\Transformer\Adapter;
use Sunnydevbox\TWUser\Transformers\RoleTransformer;
use Sunnydevbox\TWUser\Transformers\UserTransformer as ExtendUsertransformer;

class UserTransformer extends ExtendUsertransformer
{
    public function transform($obj)
    {
        if (app('request')->get('filter')) {
            return $obj->toArray();
        }

        $data = [
            'id'    => $obj->id,
        ];

        return $data;
    }

}