<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $table = 'characters';

    protected $primaryKey = 'id_character';

    public $incrementing = false;

    protected $keyType = 'int';

    public $timestamps = false;

    protected $fillable = [
        'id_character',
        'name',
        'real_name',
        'gender',
        'id_universe',
    ];

    public function universe()
    {
        return $this->belongsTo(Universe::class, 'id_universe', 'id_universe');
    }
}
