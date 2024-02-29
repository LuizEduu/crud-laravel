<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Uid\Uuid;

class Products extends Model
{
    use HasFactory, HasUuids;

    protected static function booted()
    {
        static::creating(fn (Products $product) => $product->id = (string) Uuid::v4());
    }

    protected $fillable = [
        'name',
        'category',
        'quantity',
    ];

    public function uniqueIds(): array
    {
        return ['id'];
    }
}
