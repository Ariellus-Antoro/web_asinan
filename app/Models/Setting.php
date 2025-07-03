<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Setting extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'key', 
        'value'
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('default')
            ->singleFile(); 
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->width(400);
    }

    public static function fetch($key, $default = null)
    {
        return static::where('key', $key)->value('value') ?? $default;
    }

    public static function change($key, $value)
    {
        return static::updateOrCreate(['key' => $key], ['value' => $value]);
    }


    public static function imageUrl($key, $conversion = '')
    {
        $setting = static::where('key', $key)->first();
        return $setting?->getFirstMediaUrl('default', $conversion) ?? null;
    }
}
