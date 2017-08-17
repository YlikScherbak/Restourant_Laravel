<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GeneralReport extends Model
{
    protected $table = 'general_reports';

    protected $primaryKey = 'id';
    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = ['total_amount', 'discount_amount', 'work_shift_id'];

    public function workShift() {
        return $this->belongsTo('App\Model\WorkShift', 'work_shift_id', 'id');
    }

    public function waiterReports() {
        return $this->hasMany('App\Model\WaiterReport', 'general_report_id', 'id');
    }

}
