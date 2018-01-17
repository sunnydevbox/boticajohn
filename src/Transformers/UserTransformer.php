<?php

namespace Sunnydevbox\Boticajohn\Transformers;

// use Dingo\Api\Http\Request;
// use Dingo\Api\Transformer\Binding;
// use Dingo\Api\Contract\Transformer\Adapter;

use Sunnydevbox\TWUser\Transformers\RoleTransformer;
use Sunnydevbox\TWUser\Transformers\UserTransformer as ExtendUsertransformer;

class UserTransformer extends ExtendUsertransformer
{
     /**
     * Include user profile data by default
     */
    protected $defaultIncludes =   [ 'roles'];

    protected $mode = 'complete'; // 'basic', 'complete'

    public function setMode(String $mode)
    {
        $this->mode = $mode;
    }

    public function transform($obj)
    {
        if ($this->mode == 'basic') {
            $data = [
                'id' => $obj->id,
            ];
        } else if ($this->mode == 'complete'){

            $data = [
                'id'            => (int) $obj->id,
                'email'         => $obj->email,
                'events'        => $obj->events,

                'date_joined'       => date('Y-m-d H:i:s', strtotime($obj->created_at)),
                'last_update'   => date('Y-m-d H:i:s', strtotime($obj->updated_at)),

                'status'        => $obj->status,
                'is_verified'   => ($obj->is_verified) ? strtotime($obj->is_verified) : false,
            ];
            
            if (method_exists($obj,'getAllMeta')) {
                
                $metas = collect($obj->getAllMeta());
                
                foreach ($obj->metaFields() as $column_name) {
                    $data[$column_name] = $metas->get($column_name);
                }
            }
        }

        return $data;
    }

    public function includeRoles($model)
    {
        if ($model->roles) {
            return $this->collection($model->roles, new RoleTransformer());
        } else {
            return null;
        }
    }

    public function includeMeta($model) 
    {
        $data = collect([]);
        
        if (method_exists($model,'getAllMeta')) {
            foreach ($model->getAllMeta() as $k => $v) {

                //$data->put($k, $v);
            }
        }
        
        return $data;
    }
}