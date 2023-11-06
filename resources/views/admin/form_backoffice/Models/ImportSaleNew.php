<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportSaleNew extends Model
{
    use HasFactory;

    protected $table = 'import_sale_new';

    protected $fillable = [
        'name',
        'total_rows',
        'erros_rows',
        'success_rows',
        'url_success_rows',
        'url_errors_rows',
        'created_by',
        'updated_by'
    ];
}
