<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome'];

    protected $dates = ['deleted_at'];

    public function documentos(): HasMany
    {
        return $this->hasMany(Documento::class);
    }
}
