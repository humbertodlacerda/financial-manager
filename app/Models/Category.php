<?php

namespace App\Models;

use App\Models\Expense;
use App\Models\Revenue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
    public function expense(): BelongsTo
    {
        return $this->belongsTo(Expense::class, 'category_id', 'id');
    }

    /**
     * Get the revenue that owns the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function revenue(): BelongsTo
    {
        return $this->belongsTo(Revenue::class, 'category_id', 'id');
    }
}