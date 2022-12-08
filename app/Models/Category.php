<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
    ];

    /**
     * Validation Rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
    ];

    /**
     * The projects that belong to the category.
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
