<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Revenue extends Model
{
    use HasFactory;

    protected $table = 'revenues';
    protected $filable = [
        'date',
        'description',
        'value'
    ];

    /**
     * Get all of the user for the Expense
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user(): HasMany
    {
        return $this->hasMany(User::class, 'user_id', 'id');
    }
}
