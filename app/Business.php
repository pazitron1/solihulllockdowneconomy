<?php

namespace App;

use App\User;
use Carbon\Carbon;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasSlug;

    protected $guarded = [];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function recentListing()
    {
        if(Carbon::parse($this->created_at)->format('d-m-Y') === Carbon::today()->format('d-m-Y')) {
            return true;
        }
        return false;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function path()
    {
        return "/businesses/{$this->category->slug}/{$this->slug}";
    }

    public function imagePath()
    {
        $owner = User::where('slug', $this->user->slug)->first();

        return "storage/" . $this->image_path;
    }
}
