<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHistory extends Model
{
    use HasFactory;

    protected $table = 'user_history';

    protected $fillable = [
        'user_id',
        'type_row',
        'field_name',
        'field_description',
        'old_value',
        'new_value',
        'created_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function updatedByUser()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function timeRange()
    {
        return $this->belongsTo(TimeRange::class, 'new_value', 'id');
    }


}
