<?php

namespace App\Http\Requests\API;

use App\Models\jobs;
use InfyOm\Generator\Request\APIRequest;

class UpdatejobsAPIRequest extends APIRequest
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
        $rules = jobs::$rules;
        $rules['<a'] = $rules['<a'].",".$this->route("job");$rules['name_ar'] = $rules['name_ar'].",".$this->route("job");
        return $rules;
    }
}
