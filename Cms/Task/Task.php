<?php

namespace Cms\Task;

use Cms\Base\BaseEntity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends BaseEntity
{
    use SoftDeletes;

    protected $table = 'tasks';

    protected $fillable = [
        'title',
        'description',
        'lat',
        'lng',
        'completed'
    ];

    protected $casts = [
        'title' => 'string',
        'description'  => 'string',
        'lat' => 'double',
        'lng' => 'double',
        'completed' => 'boolean'
    ];
}
