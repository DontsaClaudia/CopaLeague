<?php

namespace App\Http\Requests;

use App\Models\Match;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMatchRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('match_edit');
    }

    public function rules()
    {
        return [
            'equipe_1_id' => [
                'required',
                'integer',
            ],
            'equipe_2_id' => [
                'required',
                'integer',
            ],
            'resultat_1' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'resultat_2' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'date_de_matchs' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'carton_rouge' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'carton_jaune' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'stade_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
