<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WaiterReport extends Model
{
    protected $table = 'waiter_reports';

    protected $primaryKey = 'id';
    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'waiter', 'total_amount', 'discount_amount', 'general_report_id',
    ];

    public function generalReport() {
        return $this->belongsTo('App\Model\GeneralReport', 'general_report_id', 'id');
    }
}
