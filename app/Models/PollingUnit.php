<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollingUnit extends Model
{
    use HasFactory;

    protected $table = 'polling_unit';

    protected $primaryKey = 'uniqueid';

    /**
     * Get the results for polling unit results.
     */
    public function puresults()
    {
        return $this->hasMany('App\Models\PuResults','polling_unit_uniqueid');
    }
}
