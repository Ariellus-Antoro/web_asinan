<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Berita extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use HasSlug;

    protected $fillable=[
        'title',
        'slug',
        'content',
        'category_id',
        'user_id',
        'published_at',

    ];

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->width(400);
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('default')
            ->singleFile(); 
    }


    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function imageUrl($conversionName = '')
    {
        return $this->getFirstMedia()?->getUrl($conversionName); 
    }
    public function createdAt()
    {
        return $this->created_at->format('d M Y');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}

