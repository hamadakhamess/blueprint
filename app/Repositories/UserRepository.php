<?php
namespace App\Repositories;

use App\Models\User;

class UserRepository{

    public function model()
    {
        return new User();
    }


    public function get($relations=[],$columns=['*'])
    {
        return $this->model()->query()->with($relations)->select($columns)->orderBy('created_at', 'desc');
    }

    public function getUsers($relations=[],$columns=['*'])
    {
        return $this->model()->query()->select($columns)->orderBy('created_at', 'desc')->whereHas(
            'roles', function($q){
                $q->where('name', 'admin');
            }
        );
    }


    public function getDeliveries($relations=[],$columns=['*'])
    {
        return $this->model()->query()->with($relations)->select($columns)->orderBy('created_at', 'desc')->whereHas(
            'roles', function($q){
                $q->where('name', 'driver');
            }
        );
    }




    public function store($data){

        return $this->model()->create($data);

    }

    public function find($id)
    {
        return $this->model()->findorfail($id);
    }


    public function update($id,$data)
    {
        $row=$this->find($id);
        $row->update($data);
        return $row;

    }

    public function destroy($id)
    {
        $this->model()->findorfail($id)->delete();
    }


    public function all()
    {
        return  $this->model()->get();

    }


}
