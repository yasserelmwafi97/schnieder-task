<?php

namespace App\Http\Repositories;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BaseRepository implements RepositoryInterface
{
    //@var model
    protected $model;
    private   $returnedMessage=['error'=>'','data'=>''];
    public    $defaultLimit = 30;
    /*
     * BaseRepository constructor
     * assign any model to the protected var
     * */
    public function __construct(Model $model)
    {
        $this->model=$model;
    }

    /*
     * @param columns ,array with entities you want from a table
     * @param relations ,if you want get joined tables
     * @param appends ,if you want to show any data with the request
     * return message if [] else date
     * */
    public function getAll(array $columns=['*'],array $conditions=[],array $relations=[],array $hidden=[],array $appends=[],$limit=null)
    {
        $data=$this->model
            ->with($relations)
            ->where($conditions)
            ->limit($limit)
            ->get($columns)
            ->append($appends)
            ->makeHidden($hidden);
        return $data->count()>0?$data:[];
    }
    /*
       * @param model_id the model id that you want
       * @param columns ,array with entities you want from a table
       * @param relations ,if you want get joined tables
       * @param appends ,if you want to show any data with the request
       * return message if [] else date
       * */
    public function find($model_id,array $columns=['*'],array $relations=[],array $appends=[])
    {
        return $this->model->select($columns)->with($relations)->find($model_id);
    }

    public function create(array $request)
    {

        try {
            return  $this->returnedMessage['data']=$this->model->create($request)->fresh();
        }
        catch(\Exception $e)
        {
            $this->returnedMessage['error']=$e->getMessage();
        }
        return $this->returnedMessage;
    }

    public function update(array $request,$id)
    {
        try {
            $model = $this->model->find($id);
            return  $this->returnedMessage['data']= $model->update($request);
        }
        catch(\Exception $e)
        {
            return  $this->returnedMessage['error']=$e->getMessage();
        }
        return $this->returnedMessage;

    }

    public function delete($id)
    {
        try {
            $model = $this->model->find($id);
            $this->returnedMessage['data']= $model->delete();
        }
        catch(\Exception $e)
        {
            $this->returnedMessage['error']=$e->getMessage();
        }
        return $this->returnedMessage;
    }
}
