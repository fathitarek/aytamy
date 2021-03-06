<?php

namespace App\Http\Requests\API;

use App\Models\countries;
use InfyOm\Generator\Request\APIRequest;

class UpdatecountriesAPIRequest extends APIRequest
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
