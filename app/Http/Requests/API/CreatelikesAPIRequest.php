<?php

namespace App\Http\Requests\API;

use App\Models\likes;
use InfyOm\Generator\Request\APIRequest;

class CreatelikesAPIRequest extends APIRequest
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
        return likes::$rules;
    }
}
