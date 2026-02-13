<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Character;

class Universe extends Model
{
    protected $table = 'universes';

    protected $primaryKey = 'id_universe';

    public $incrementing = false;

    protected $keyType = 'int';

    public $timestamps = false;

    protected $fillable = [
        'id_universe',
        'universe',
        'company',
        'age',
    ];

    public function characters()
    {
        return $this->hasMany(Character::class, 'id_universe', 'id_universe');
    }
}
