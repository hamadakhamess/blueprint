<?php
namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class RolesRepository{

    public function model()
    {
        return new Role();
    }


    public function get($relations=[],$columns=['*'])
    {
        return $this->model()->query()->with($relations)->select($columns)->orderBy('created_at', 'desc');
    }

    public function find($id)
    {
        return $this->model()->findorfail($id);
    }

    public function store($data){

        return $this->model()->create($data);

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

    public function updateProfile($data,$id){

        $update=$this->find($id);
        return $update;
    }
}
