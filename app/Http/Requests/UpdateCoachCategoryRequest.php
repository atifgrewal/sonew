<?php

namespace App\Http\Requests;

use App\Models\CoachCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCoachCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('coach_category_edit');
    }

    public function rules()
    {
        return [
            'coach_category' => [
                'string',
                'nullable',
            ],
            'coachtype' => [
                'string',
                'nullable',
            ],
        ];
    }
}
