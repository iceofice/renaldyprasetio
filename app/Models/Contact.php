<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message'
    ];

    /**
     * Validation Rules
     *
     * @var array
     */
    public static $rules = [
        'name'     => 'required',
        'email'     => 'required|email',
        'subject'   => 'required',
        'message'   => 'required',
    ];
}
