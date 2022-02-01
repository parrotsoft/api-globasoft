<?php

namespace App\Http\Controllers;

use Cms\Base\BaseController;
use Cms\Contact\ContactRepo;

class ContactController extends BaseController
{
    //
    public function __construct(ContactRepo $model)
    {
        parent::__construct($model);
    }
}
