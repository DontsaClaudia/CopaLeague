<?php

namespace App\Http\Requests;

use App\Models\Stade;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStadeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('stade_create');
    }

    public function rules()
    {
        return [
            'nom' => [
                'string',
                'required',
            ],
            'lieu' => [
                'string',
                'required',
            ],
        ];
    }
}
