<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    use HasFactory;

    protected $table = 'unidade';

    protected $fillable = [
        'sigla',
        'nome',
    ];
    public function produto()
    {
        return $this->hasOne(Produto::class, 'unidade_id');
    }
}
