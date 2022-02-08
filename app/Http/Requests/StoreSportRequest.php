<?php

namespace App\Http\Requests;

use App\Models\Sport;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSportRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sport_create');
    }

    public function rules()
    {
        return [
            'sport' => [
                'string',
                'nullable',
            ],
        ];
    }
}
