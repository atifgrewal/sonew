<?php

namespace App\Http\Requests;

use App\Models\SportsType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySportsTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('sports_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:sports_types,id',
        ];
    }
}
