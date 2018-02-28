<?php

namespace Sunnydevbox\Boticajohn\Transformers;

use League\Fractal\TransformerAbstract;

class BranchTransformer extends TransformerAbstract
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