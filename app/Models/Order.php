<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Uid\Uuid;

class Order extends Model
{
    use HasFactory, HasUuids;

    protected static function booted()
    {
        static::creating(fn (Order $order) => $order->id = (string) Uuid::v4());
    }

    protected $fillable = [
        'user_id',
        'product_id',
        'canceled_at'
    ];

    public function uniqueIds(): array
    {
        return ['id'];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
