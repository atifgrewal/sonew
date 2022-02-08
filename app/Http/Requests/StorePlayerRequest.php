<?php

namespace App\Http\Requests;

use App\Models\Player;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePlayerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('player_create');
    }

    public function rules()
    {
        return [
            'dob' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'adress_line_1' => [
                'string',
                'nullable',
            ],
            'address_line_2' => [
                'string',
                'nullable',
            ],
            'city' => [
                'string',
                'nullable',
            ],
            'disability_type' => [
                'string',
                'nullable',
            ],
        ];
    }
}
