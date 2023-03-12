<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasFactory, HasSlug ;
    protected $fillable = ['name', 'slug', 'description', 'status'];
    protected $hidden = ['status'];

    protected $casts = [
        'status' => 'boolean', 
        
    ];



    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->singleFile();

            $this->addMediaCollection('image_icon')
            ->singleFile();
    }


   
    public function scopeLast($query)
    {
        return $query->orderBy('id', 'desc')->first();
    }


    public function getRouteKeyName(): string
    {
        return 'slug';
    }


}
