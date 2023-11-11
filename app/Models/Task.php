<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;protected $table = 'tasks';

    protected $fillable = [
        'post_sale_id',
        'start',
        'arrival',
        'motorized_status_id',
        'audio',
        'files',
        'token',
        'observation',
        'created_by'
    ];

}
