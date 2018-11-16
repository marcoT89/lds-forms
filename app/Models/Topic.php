<?php

namespace App\Models;

use App\Traits\Filterable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use Filterable;

    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

    protected $casts = [
        'date'         => 'date:Y-m-d',
        'created_at'   => 'datetime',
        'updated_at'   => 'datetime',
        'invited_at'   => 'datetime',
        'confirmed_at' => 'datetime',
    ];

    public function speaker()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeWithoutDate(Builder $builder)
    {
        return $builder->whereNull('date');
    }

    public function scopeFuture(Builder $builder, $afterDate = null)
    {
        $afterDate = $afterDate ?? now();

        return $builder->whereDate('date', '>', now());
    }

    public function setInvitedAtAttribute($value)
    {
        if (is_bool($value)) {
            $this->attributes['invited_at'] = $value ? now() : null;
        }
    }

    public function setConfirmedAtAttribute($value)
    {
        if (is_bool($value)) {
            $this->attributes['confirmed_at'] = $value ? now() : null;
        }
    }
}
