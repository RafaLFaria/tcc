<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
    use HasFactory;

    protected $table = 'movimentacao';

    protected $fillable = [
        'quantidade',
        'data',
        'tipo',
        'id_usuario',
        'estoque_id',
        'valor',
    ];

    public function estoque()
    {
        return $this->belongsTo(Estoque::class, 'estoque_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
