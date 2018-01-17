<?php

namespace Sunnydevbox\Recoveryhub\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use JWTAuth;

use Dingo\Api\Http\Request;

//use Illuminate\Http\Request;

/**
 * Class UserEventCriteria.
 *
 * @package namespace App\Criteria;
 */
class UserEventCriteria implements CriteriaInterface
{
    protected $request;

    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $user = JWTAuth::parseToken()->authenticate();
        //var_dump($this->request->all());
        $dateRange = $this->request->get(config('repository.criteria.params.dateRange', 'dateRange'), null);


        // DATE RANGE
        if ($dateRange) {
            $dateRanges = explode('|', $dateRange);


            if (isset($dateRanges[0])) {
                $operator = '>=';
                $valueOperator = explode(':', $dateRanges[0]);
                $column = $valueOperator[0];
                $value = $valueOperator[1];

                if (isset($valueOperator[2]) && strlen($valueOperator[2]) > 0) {
                    $operator = $valueOperator[2];
                }

                $model = $model->where($column, $operator, $value);
            }


            if (isset($dateRanges[1])) {
                $operator = '<=';
                $valueOperator = explode(':', $dateRanges[1]);
                $column = $valueOperator[0];
                $value = $valueOperator[1];

                if (isset($valueOperator[2]) && strlen($valueOperator[2]) > 0) {
                    $operator = $valueOperator[2];
                }

                $model = $model->where($column, $operator, $value);
            }
        }

        




        $model = $model
                    ->where('assignable_id','=', $user->id )
                    ->where('assignable_type', '=', config('tw-user.api.users.model'))
                    ;
        //dd($model->toSql());
        return $model;
    }

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}
