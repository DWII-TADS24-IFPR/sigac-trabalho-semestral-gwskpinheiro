<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Declaracao extends Model
{
    use SoftDeletes;

    protected $table = 'declaracoes';
    
    protected $fillable = ['aluno_id', 'descricao', 'arquivo'];

    protected $dates = ['deleted_at'];

    public function aluno(): BelongsTo
    {
        return $this->belongsTo(Aluno::class);
    }
}
