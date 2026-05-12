<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Weight extends Model
{
    use HasFactory;
}
    protected $fillable = [
        'user_id',
        'recorded_date',
        'weight',
    ];

    /**
     * この体重記録に属するユーザーを取得
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }