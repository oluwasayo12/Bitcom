<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuResults extends Model
{
    use HasFactory;

    protected $table = 'announced_pu_results';

    protected $primaryKey = 'result_id';
    

}
