<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;

class SalesHistory extends Model
{
    protected $table = 'sales_history';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'employee_id',
        'vehicle_model_id',
        'vehicle_brand_id',
        'created_at',
        'updated_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
