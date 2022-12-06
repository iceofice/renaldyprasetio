<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'about',
        'contributions'
    ];

    /**
     * Validation Rules
     *
     * @var array
     */
    public static $rules = [
        'title'             => 'required',
        'categories'        => 'array',
        'categories.*'      => 'exists:categories,id',
        'image'             => 'array',
        'image.*'           => 'image',
        'about'             => 'required',
        'contributions'     => 'required',
        'technologies'      => 'array',
        'technologies.*'    => 'exists:technologies,id',
    ];

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public static $messages = [
        'categories.*'      => 'The selected categories are invalid.',
        'technologies.*'    => 'The selected technologies are invalid.',
    ];

    /**
     * The categories that belong to the project.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * The categories that belong to the project.
     */
    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }

    /**
     * Get the images for the project.
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
