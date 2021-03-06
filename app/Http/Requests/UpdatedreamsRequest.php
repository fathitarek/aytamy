<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\dreams;

class UpdatedreamsRequest extends FormRequest
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
        $rules = dreams::$rules;
        $rules['name_en'] = $rules['name_en'].",".$this->route("dream");$rules['name_ar'] = $rules['name_ar'].",".$this->route("dream");
        return $rules;
    }
}
