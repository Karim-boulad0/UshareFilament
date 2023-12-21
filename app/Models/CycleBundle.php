<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CycleBundle extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['cycle_id', 'deleted_at', 'bundle_id', 'stock'];

    public function cycle()
    {
        return $this->belongsTo(Cycle::class);
    }

    public function bundle()
    {
        return $this->belongsTo(Bundle::class);
    }
    public function Subscription()
    {
        return $this->belongsToMany(Subscription::class);
    }
}
