<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variant extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'title',
        'price',
        'position',
        'compare_at_price',
        'option_1',
        'option_2',
        'option_3',
        'inventory_quantity',
        'image_url',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected function casts(): array
    {
        return [
            'price' => 'double',
            'compare_at_price' => 'double',
            'position' => 'integer',
            'inventory_quantity' => 'integer',
        ];
    }

    /**
     * Auto-generate title from option_1, option_2, option_3.
     */
    protected static function booted(): void
    {
        $generateTitle = function (Variant $variant) {
            $options = array_filter([
                $variant->option_1,
                $variant->option_2,
                $variant->option_3,
            ]);
            $variant->title = implode(' / ', $options);
        };

        static::creating($generateTitle);
        static::updating($generateTitle);
    }

    /**
     * Get the product that owns the variant.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
