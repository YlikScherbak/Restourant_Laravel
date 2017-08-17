<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $primaryKey = 'id';
    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'active', 'total_amount', 'discount_amount', 'creation_date',
        'closed_date', 'discount_id', 'user_id', 'work_shift_id'
    ];

    public function user() {
        return $this->belongsTo('App\Model\User');
    }

    public function details() {
        return $this->hasMany('App\Model\OrderDetails', 'order_id', 'id');
    }

    public function discount() {
        return $this->belongsTo('App\Model\Discount');
    }

    public function table() {
        return $this->hasOne(Table::class);
    }

    public function workShift() {
        return $this->belongsTo(WorkShift::class, 'work_shift_id', 'id');
    }

    public function setAmountWithDiscount($price) {
        $this->discount_amount = $this->discount_amount + ($price * ($this->discount->percentage / 100));
        $this->total_amount = $this->total_amount + ($price - ($price * ($this->discount->percentage / 100)));
    }

    public function recount() {
        $discAmount = $this->total_amount * ($this->discount->percentage / 100);
        $this->discount_amount = $discAmount;
        $this->total_amount = $this->total_amount - $discAmount;
    }

    public function setAmountWhenDelete($price) {
        $this->discount_amount = $this->discount_amount - ($price * ($this->discount->percentage / 100));
        $this->total_amount = $this->total_amount - ($price - ($price * ($this->discount->percentage / 100)));
    }


}
