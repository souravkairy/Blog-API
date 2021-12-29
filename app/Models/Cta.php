<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Cta extends Model
{
    use HasFactory;
    protected $table = 'ctas';
    public $timestamps = false;
    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        $image = $this->attributes['image'] ?? null;
        if (!$image) return null;
        if (!Storage::disk('public')->exists($image)) return null;
        return asset('storage/' . $image, env('ENABLE_HTTPS'));
    }
}
