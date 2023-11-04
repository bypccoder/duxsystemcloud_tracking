<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportSaleNew extends Model
{
    use HasFactory;

    protected $table = 'import_sale_new';

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
        'new_serial',
        'change_date',
        'sale_date',
        'pickup_date',
        'support_date',
        'survey_date',
        'email_customer',
        'observation',
        'created_by',
        'updated_by'
    ];
}
