<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class InventionRequest extends BaseRequest
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

            'code' => 'required|unique:inventions',
            'due_date' => 'nullable',
            'from_user_id' => 'required|exists:users,id',
            'to_user_id' => 'nullable|exists:users,id',
        ];
    }
}
