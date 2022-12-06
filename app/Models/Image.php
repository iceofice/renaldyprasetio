<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'url',
        'project_id',
    ];

    /**
     * Validation Rules
     *
     * @var array
     */
    public static $rules = [
        'url'           => 'required',
        'project_id'    => 'exists:projects,id',
    ];
}
