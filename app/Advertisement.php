<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Advertisement extends Model
{
    protected $table = 'advertisements';
    protected $fillable = ['title', 'image_file', 'type', 'start_date', 'expired_date', 'status', 'user_id', 'count'];

    public function getStartDateAttribute()
    {
        return Carbon::parse($this->attributes['start_date'], 'CST')->setTimezone('Asia/Kathmandu');
    }

    public function getExpiredDateAttribute()
    {
        return Carbon::parse($this->attributes['expired_date'], 'CST')->setTimezone('Asia/Kathmandu');
    }
}

