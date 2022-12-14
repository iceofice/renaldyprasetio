<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Validation Rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
    ];

    /**
     * The projects that belong to the technology.
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
