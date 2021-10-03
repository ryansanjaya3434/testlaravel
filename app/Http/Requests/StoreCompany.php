<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompany extends FormRequest
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
                'nama' => 'required',
                'email' => 'required',
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2024',
                'website' => 'required',
                'alamat' => 'required',
            //
        ];
    }
}
