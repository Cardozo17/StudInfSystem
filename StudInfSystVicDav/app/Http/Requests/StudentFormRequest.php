<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StudentFormRequest extends Request
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
            'document_id'=> array('required'/*, 'regex:#^[[V|E|v|e]\d\d\d\d\d\d\d\d]{0,9}#'*/),
            'name'=> 'required|min:3|max:45',
            'last_name'=>'required|min:3|max:45',
            'email' =>'email|max:45', 
            'home_address'=> 'required|max:140',
            'born_place'=>'max:45',
            'relationship_with_legal_representative'=>'max:45',
            'born_date'=>'date_format:Y-m-d'
        ];
    }
}
