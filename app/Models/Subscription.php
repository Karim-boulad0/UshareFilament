<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['cycle_id', 'deleted_at', 'bundle_id', 'user_id', 'phone_number', 'verification_code', 'note', 'is_approve', 'is_karim', 'is_paid'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function bundle()
    {
        return $this->belongsTo(Bundle::class);
    }
    public function cycle()
    {
        return $this->belongsTo(Cycle::class);
    }
    public function getPriceAttribute()
    {
        return $this->bundle->price;
    }
    public function CycleBundle()
    {
        return $this->belongsTo(CycleBundle::class);
    }
    public static function boot()
    {
        parent::boot();
        static::created(function ($subscription) {
            $bundle = CycleBundle::where('bundle_id', $subscription->bundle_id)->first();
            if ($bundle->stock <= 0) {
                Subscription::find($subscription->id)->delete();
                return redirect()->back()->with('success', 'Subscription creation failed due to insufficient bundle stock.');
            } else {
                $subscription->is_approve == 1 &&
                    $bundle->update([
                        'stock' => $bundle->stock - 1,
                    ]);
            }
        });
        static::updated(function ($subscription) {
            $bundle = CycleBundle::where('bundle_id', $subscription->bundle_id)->first();
            if ($bundle->stock <= 0) {
                Subscription::find($subscription->id)->delete();
                return redirect()->back()->with('success', 'Subscription creation failed due to insufficient bundle stock.');
            } else {
                // Check if the is_approve column changed from 0 to 1
                if ($subscription->is_approve == 1 && $subscription->getOriginal('is_approve') == 0) {
                    $bundle->update([
                        'stock' => $bundle->stock - 1,
                    ]);
                }
                // Check if the is_approve column changed from 1 to 0
                if ($subscription->is_approve == 0 && $subscription->getOriginal('is_approve') == 1) {
                    $bundle->update([
                        'stock' => $bundle->stock + 1,
                    ]);
                }
            }
        });
        static::deleting(function ($subscription) {
            $bundle = CycleBundle::where('bundle_id', $subscription->bundle_id)->first();
            // Check if the is_approve column is 1 at the time of deletion
            if ($subscription->is_approve == 1) {
                $bundle->update([
                    'stock' => $bundle->stock + 1,
                ]);
            }
        });
    }
}
