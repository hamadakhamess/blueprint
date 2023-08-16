<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    private $repository;
    public function __construct(UserRepository $repository)
    {
        $this->repository=$repository;
    }


    public function index()
    {
        return view('admin.users.index');
    }



    public function data()
    {
        $model = $this->repository->getUsers();
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
        $roles=Role::all();
        return view('admin.users.create',compact('roles'));
    }

    public function store(UserRequest $request)
    {
        $data = $request->except('password_confirmation','image','role');
        $data['password']=bcrypt($request->password);

        $user= $this->repository->store($data);

        $user->assignRole([$request->role,'admin']);

        return  redirect()->route('admin.users.index');

    }


    public function edit($id)
    {
        $one=$this->repository->find($id);
        $users = $this->repository->all();
        $roles=Role::all();
        return view('admin.users.update',compact('one','users','roles'));
    }

    public function update($id,UserRequest $request)
    {
        $data = $request->except('password','password_confirmation','image','role');

        if($request->password){
            $data['password']=bcrypt($request->password);
        }

        $user=$this->repository->update($id,$data);

        $user->assignRole($request->role);
        // FacadesAlert::success('SuccessAlert',__('site.updated_successfully'));
        return  redirect()->route('admin.users.index');
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









