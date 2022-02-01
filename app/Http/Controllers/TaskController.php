<?php

namespace App\Http\Controllers;

use Cms\Base\BaseController;
use Cms\Task\TaskRepo;


class TaskController extends BaseController
{
    public function __construct(TaskRepo $model)
    {
        parent::__construct($model);
    }

}
