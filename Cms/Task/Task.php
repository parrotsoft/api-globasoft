<?php

namespace Cms\Task;

use Cms\Base\BaseEntity;

class Task extends BaseEntity
{
    protected $table = 'tasks';

    protected $fillable = [
        'title',
        'description',
        'lat',
        'lng'
    ];

    protected $casts = [
        'title' => 'string',
        'description'  => 'string',
        'lat' => 'double',
        'lng' => 'double'
    ];
}
