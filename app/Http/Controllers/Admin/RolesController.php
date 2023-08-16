<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RolesRequest;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use App\Repositories\RolesRepository;
use App\Repositories\UserRepository;

use Yajra\DataTables\Facades\DataTables;
use function PHPUnit\Framework\isEmpty;

class RolesController extends Controller
{

    private $repository;
    public function __construct(RolesRepository $repository)
    {
        $this->repository=$repository;
    }


    public function index()
    {
        return view('admin.roles.index');
    }



    public function data()
    {
        $model = $this->repository->get();
        return DataTables::eloquent($model)
            ->addIndexColumn()
            ->addColumn('actions', function($row){
                return view('admin._includes._actions',['model'=>$row,'id'=>$row->id]);
            })
            ->addColumn('created_at', function ($row) {
                return $row->created_at?->format('Y-m-d');
            })
            ->rawColumns(['actions'])
            ->toJson();
    }
    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(RolesRequest $request)
    {
        $data = $request->only('name');
        $data['guard_name']='web';
        $role= $this->repository->store($data);
        $role->givePermissionTo($request->permissions);
        return  redirect()->route('admin.roles.index');

    }


    public function edit($id)
    {
        $one=$this->repository->find($id);
        $users = $this->repository->get();

        return view('admin.roles.edit',compact('one','users'));
    }

    public function update($id,RolesRequest $request)
    {
        $data = $request->except('name',);
        $role=$this->repository->update($id,$data);
        if (count($request->permissions)>0){
            $role->syncPermissions($request->permissions);
        }

        return  redirect()->route('admin.roles.index');
    }

    public function show($id)
    {

        $one=$this->repository->find($id);

        return view('admin.users.show',compact('one'));
    }


    public function destroy($id)
    {
        $this->repository->destroy($id);
        return redirect()->route('admin.users.index')->with('success', 'Data deleted Successfully');

    }

}









