<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateUserRequest extends Request
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
            'role'          =>'required|not_in:0',
            'title'         =>'required|not_in:0',
            'name'          =>'required',
            'surname'       =>'required',
            'alt_cellphone' =>'required|not_in:0|digits:10',
            'alt_email'     =>'email',
            'province'      =>'required|not_in:0',
            'district'      =>'required|not_in:0',
            'position'      =>'required|not_in:0',
            'department'    =>'required|not_in:0',
        ];
    }
}
