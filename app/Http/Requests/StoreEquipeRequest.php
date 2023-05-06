<?php

namespace App\Http\Requests;

use App\Models\Equipe;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEquipeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('equipe_create');
    }

    public function rules()
    {
        return [
            'nom' => [
                'string',
                'required',
            ],
            'nom_coach' => [
                'string',
                'required',
            ],
        ];
    }
}
