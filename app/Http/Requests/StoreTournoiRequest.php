<?php

namespace App\Http\Requests;

use App\Models\Tournoi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTournoiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tournoi_create');
    }

    public function rules()
    {
        return [
            'nom_tournois' => [
                'string',
                'required',
            ],
            'nombre_d_equipes' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'date_de_debut' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'date_de_fin' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
