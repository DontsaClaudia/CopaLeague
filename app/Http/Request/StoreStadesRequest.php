<?php

namespace App\Http\Requests;

use App\Models\Stade;
use Illuminate\Support\Facades\Gate;
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
            'match_1_id' => [
                'required',
                'integer',
            ],
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
