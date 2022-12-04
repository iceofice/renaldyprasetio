<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    /**
     * Validation Rules
     *
     * @var array
     */
    public static $rules = [
        'title'             => 'required',
        'categories'        => 'array',
        'categories.*'      => 'exists:categories,id',
        'img'               => 'array',
        'img.*'             => 'image',
        'about'             => 'nullable|string',
        'contribution'      => 'nullable|string',
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
}
