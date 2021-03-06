<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\countries;

class UpdatecountriesRequest extends FormRequest
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
        $rules = countries::$rules;
        $rules['name_en'] = $rules['name_en'].",".$this->route("country");$rules['name_ar'] = $rules['name_ar'].",".$this->route("country");
        return $rules;
    }
}
