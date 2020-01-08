<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'to_date',
        'from_date',
        'type',
        'reason',
        'status',
        'user_id',
        'assigned_id',
    ];
    // request reave relation
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // manager relation
    public function boss()
    {
        return $this->belongsTo(User::class,'assigned_id');
    }


}
