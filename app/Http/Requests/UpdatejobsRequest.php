<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\jobs;

class UpdatejobsRequest extends FormRequest
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
