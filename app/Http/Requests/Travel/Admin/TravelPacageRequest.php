<?php

namespace App\Http\Requests\Travel\Admin;

use Illuminate\Foundation\Http\FormRequest;

///untuk menangani form request 
class TravelPacageRequest extends FormRequest
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
            'title' => 'required|max:255',
            'location' => 'required|max:255',
            'about' => 'required',
            'featured_events' => 'required|max:255',
            'leagueges' => 'required|max:255',
            'food' => 'required|max:255',
            'departure_date' => 'required|date',
            'duration' => 'required|max:255',
            'type' => 'required|max:255',
            'price' => 'required|integer'
        ];
    }
}
