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

        if ($this->mode == 'basic') {
            $data = [
                'id' => $obj->id,
                'first_name' => $obj->getMeta('first_name'),
                'last_name' => $obj->getMeta('last_name'),
            ];
            
        } else if ($this->mode == 'complete'){

            $data = [
                'id'            => (int) $obj->id,
                'email'         => $obj->email,

                'date_joined'       => date('Y-m-d H:i:s', strtotime($obj->created_at)),
                'last_update'   => date('Y-m-d H:i:s', strtotime($obj->updated_at)),

                'status'        => $obj->status,
                'is_verified'   => ($obj->is_verified) ? strtotime($obj->is_verified) : false,
            ];
            
            if (method_exists(config('tw-user.api.users.model'),'getAllMeta')) {
                
                $metas = collect($obj->getAllMeta());
                
                foreach ($obj->metaFields() as $column_name) {
                    $data[$column_name] = $metas->get($column_name);
                }
            }
        }

        return $data;
    }

}