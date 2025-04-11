<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'category_id', 'gender', 'email', 'tel', 'address', 'building', 'detail', 'created_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getGenderLabelAttribute(): string
    {
        return match ($this->gender) {
            1 => '男性',
            2 => '女性',
            3 => 'その他',
            default => '不明',
        };
    }
    public function getNameAttribute()
    {
        return $this->last_name . ' ' . $this->first_name;
    }


}
