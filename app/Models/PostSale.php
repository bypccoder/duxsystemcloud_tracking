<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostSale extends Model
{
    use HasFactory;

    protected $table = 'post_sale';

    protected $fillable = [
        'document',
        'business_name',
        'titular_cellphone',
        'receiving_person',
        'address',
        'reference',
        'equipment_type',
        'model_text',
        'survey_text',
        'time_ranges_id',
        'record_type',
        'management_type_id',
        'warehouse_state_type_id',
        'new_serial',
        'change_date',
        'sale_date',
        'pickup_date',
        'support_date',
        'survey_date',
        'survey_id',
        'model_id',
        'equipment_id',
        'serial',
        'email_customer',
        'result1_backs_id',
        'result2_backs_id',
        'diary_date',
        'diary_time',
        'delivery_date',
        'delivery_time',
        'motorized_id',
        'observation',
        'created_by',
        'updated_by'
    ];

    public function history()
    {
        return $this->hasMany(PostSaleHistory::class);
    }
}
