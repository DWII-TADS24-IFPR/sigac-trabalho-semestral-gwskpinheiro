<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Nivel extends Model
{
    use SoftDeletes;

    protected $table = 'niveis';

    protected $fillable = ['nome'];

    protected $dates = ['deleted_at'];

    public function turmas(): HasMany
    {
        return $this->hasMany(Turma::class);
    }
}