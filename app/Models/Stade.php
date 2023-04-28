<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stade extends Model  {

use SoftDeletes, HasFactory;

public $table = 'stades';

protected $dates = [
'created_at',
    'updated_at',
    'deleted_at',
];

protected $fillable = [
'match_1_id',
    'nom',
    'lieu',
    'created_at',
    'updated_at',
    'deleted_at',
];

protected function serializeDate(DateTimeInterface $date)
{




return $date->format('Y-m-d H:i:s');

}
public function match_1()
{




return $this->belongsTo(Matchs::class, 'match_1_id');

}

}
