<?php

namespace Cms\Contact;

use Cms\Base\BaseEntity;

class Contact extends BaseEntity
{
    protected $table = 'contacts';

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message'
    ];

    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'subject' => 'string',
        'message' => 'string'
    ];

}
