<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Aluno extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'matricula',
        'email',
        'data_nascimento',
        'cpf'
    ];

    protected $casts = [
        'data_nascimento' => 'date',
    ];

    protected $dates = ['deleted_at'];

    public function documentos(): HasMany
    {
        return $this->hasMany(Documento::class);
    }

    public function comprovantes(): HasMany
    {
        return $this->hasMany(Comprovante::class);
    }

    public function declaracoes(): HasMany
    {
        return $this->hasMany(Declaracao::class);
    }

    public function turmas(): BelongsToMany
    {
        return $this->belongsToMany(Turma::class);
    }
}
