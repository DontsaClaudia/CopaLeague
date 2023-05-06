<?php

namespace App\Http\Requests;

use App\Models\Joueur;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateJoueurRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('joueur_edit');
    }

    public function rules()
    {
        return [
            'equipe_id' => [
                'required',
                'integer',
            ],
            'nom_et_prenom' => [
                'string',
                'required',
            ],
            'date_de_naissance' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'age' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'dossard' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'poste' => [
                'string',
                'required',
            ],
            'email' => [
                'string',
                'required',
            ],
        ];
    }
}
