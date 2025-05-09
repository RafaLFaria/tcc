<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produto';

    protected $fillable = [
        'nome',
        'descricao',
        'cod_barras',
        'unidade_id',
    ];

    public function estoque()
    {
        return $this->hasOne(Estoque::class, 'produto_id');
    }

    public function compras()
    {
        return $this->hasMany(Compra::class, 'produto_id');
    }
    public function unidade()
    {
        return $this->belongsTo(Unidade::class, 'unidade_id');
    }

}
