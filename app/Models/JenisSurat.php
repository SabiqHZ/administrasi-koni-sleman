<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model {
    protected $fillable = ['nama','deskripsi'];
    public function surats() { return $this->hasMany(Surats::class); }
}
