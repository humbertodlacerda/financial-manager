<?php

namespace App\Models;

use App\Models\Expense;
use App\Models\Revenue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'description'
    ];

    /**
     * Get the expense that owns the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function expense(): HasMany
    {
        return $this->hasMany(Expense::class, 'category_id', 'id');
    }

    /**
     * Get the revenue that owns the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function revenue(): HasMany
    {
        return $this->hasMany(Revenue::class, 'category_id', 'id');
    }
}
