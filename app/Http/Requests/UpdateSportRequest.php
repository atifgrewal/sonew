<?php

namespace App\Http\Requests;

use App\Models\Sport;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSportRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sport_edit');
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
