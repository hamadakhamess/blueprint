<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RolesRequest extends FormRequest
{

    public function rules()
    {
        if(request()->method() == 'PUT'){
            return $this->updateRequest() ;
        }
        else{
            return $this->storeRequest() ;
        }
        // return request()->method() === 'POST' ? $this->storeRequest() : $this->updateRequest();
    }

    public function storeRequest()
    {
        return [
            'name' =>'required',
            'permissions' =>'required',


        ];
    }

    public function updateRequest()
    {
        return [
            'name' =>'required',

        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'name.required' => __('validation.required'),


        ];
    }
}

//     'phone' => 'required|unique:cvs|digits:10|numeric',
//     'job_id' => 'required|exists:' . Job::getTableName() . ',id',


