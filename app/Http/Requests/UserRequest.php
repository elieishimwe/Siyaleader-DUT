<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'         =>'required',
            'surname'      =>'required',
            'province'     =>'required|not_in:0',
            'district'     =>'required|not_in:0',
            'position'     =>'required|not_in:0',
            'department'   =>'required|not_in:0',
            'Cell1'        =>'required|not_in:0|digits:10|unique:users,email',
            'Email'        =>'email|unique:users,username'

        ];
    }
}
