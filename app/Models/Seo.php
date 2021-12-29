<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Seo extends Model
{
    use HasFactory;

    protected $table = 'seos';

    protected $keyType = 'int';

    public $timestamps = false;

    protected $appends = ['image_url'];

    public function getImageUrlAttribute() {
        $image = $this->attributes['seo_image'] ?? null;

        if (!$image) return null;
        if (!Storage::disk('public')->exists($image)) return null;

        return asset('storage/' . $image, env('ENABLE_HTTPS'));

    }
}
