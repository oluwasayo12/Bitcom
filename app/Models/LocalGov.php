<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalGov extends Model
{
    use HasFactory;

    protected $table = 'lga';

    protected $primaryKey = 'uniqueid';

    /**
     * Get the results for polling units.
     */
    public function pollingunit()
    {
        return $this->hasMany('App\Models\PollingUnit','lga_id');
    }
    
}
