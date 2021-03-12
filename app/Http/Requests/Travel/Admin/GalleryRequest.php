<?php

namespace App\Http\Requests\Travel\Admin;

use Illuminate\Foundation\Http\FormRequest;

///untuk menangani form request 
class GalleryRequest extends FormRequest
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
            //
            'travel_pacages_id' => 'required|integer|exists:travel_pacages,id',
            'image' => 'required|image'
        ];
    }
}
