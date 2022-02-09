<?php

/**
 * User: kholoudElkholy
 * Email: kholoudelkholy91@gmail.com
 */
namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    /**
     *
     * @var Model
     */
    protected $model = null;
    protected $resource = null;

    /**
     *
     * @param Model $model
     */
    protected function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @param Model $item
     * @param array $data
     * @return Model
     */
    public function update(Model $item, array $data)
    {
        $item->update($data);
        return $item;
    }

    /**
     * @param Model $item
     * @return Model
     */
    public function show(Model $item)
    {
        $item->get();
        return $item;
    }

    /**
     * @param Model $item
     * @return Model
     * @throws \Exception
     */
    public function destroy(Model $item)
    {
        $item->delete();
        return $item;
    }
    
    
    //===================================
//
//    public function get(): EloquentCollection
//    {
//        return Medal::query()->with('event')->get();
//    }
//
//    public function getById(Medal $medal): Medal
//    {
//        $medal->get();
//        return $medal;
//    }
//
//    public function create(Medal $medal, array $data): Medal
//    {
//        return $medal->create($data);
//
//    }
//
//    public function update(Medal $medal, array $data): Medal
//    {
//        $medal->update($data);
//        return  $medal;
//    }
//
//    public function delete(Medal $medal): Medal
//    {
//        $medal->delete();
//        return $medal;
//    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
   

   

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse|mixed
     */
//    public function show($id)
//    {
//        if ($item = $this->model->find($id)) {
////            return $item;
//            return [
//                'error' => true,
//                'msg' => trans('messages.' . $this->model . '.notFound', ['model' => class_basename(get_class(new $this->model))]),
//                'data' => $item
//            ];
//        }
//        return [
//            'error' => true,
//            'msg' => trans('messages.' . $this->model . '.notFound', ['model' => class_basename(get_class(new $this->model))]),
//            'data' => null
//        ];
//    }
    /**
     * @param Model $item
     * @return Model
     */

//    public function destroy($id)
//    {
//        if ($item = $this->model->find($id)) {
//            {
//                $item->delete();
//            }
//        }
//        return [
//            'error' => true,
//            'msg' => trans('messages.' . $this->model . '.notFound', ['model' => class_basename(get_class(new $this->model))])
//        ];
//
//    }
   
}