<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question4 extends Model
{
    use HasFactory;

    protected $fillable = [
        'foo',
        'bar',
        'baz',
        'qux',
    ];
}
