<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostSaleHistory extends Model
{
    use HasFactory;

    protected $table = 'post_sale_history';

    protected $fillable = [
        'post_sale_id',
        'type_row',
        'field_name',
        'field_description',
        'old_value',
        'new_value',
        'created_by'
    ];

    public function updatedByUser()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
