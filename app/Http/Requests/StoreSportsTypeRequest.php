<?php

namespace App\Http\Requests;

use App\Models\SportsType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSportsTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sports_type_create');
    }

    public function rules()
    {
        return [
            'sports_type' => [
                'string',
                'nullable',
            ],
        ];
    }
}
