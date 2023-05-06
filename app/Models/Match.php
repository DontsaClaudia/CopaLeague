<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Match extends Model  {

use SoftDeletes, HasFactory;

public $table = 'matches';

protected $dates = [
'date_et_heure',
    'created_at',
    'updated_at',
    'deleted_at',
];

protected $fillable = [
'equipe_1_id',
    'equipe_2_id',
    'resultat_1',
    'resultat_2',
    'date_et_heure',
    'stade_id',
    'created_at',
    'updated_at',
    'deleted_at',
];

protected function serializeDate(DateTimeInterface $date)
{
    



return $date->format('Y-m-d H:i:s');
    
}
public function equipe_1()
{
    



return $this->belongsTo(Equipe::class, 'equipe_1_id');
    
}
public function equipe_2()
{
    



return $this->belongsTo(Equipe::class, 'equipe_2_id');
    
}
public function getDateEtHeureAttribute($value)
{
    



return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    
}
public function setDateEtHeureAttribute($value)
{
    



$this->attributes['date_et_heure'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    
}
public function stade()
{
    



return $this->belongsTo(Stade::class, 'stade_id');
    
}

}