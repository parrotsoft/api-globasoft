<?php

namespace Cms\Task;

use Cms\Base\BaseRepo;

class TaskRepo extends BaseRepo
{

    public function getModel()
    {
        return new Task();
    }

    public function setValidation()
    {
        return [
            'title' => 'required',
            'description' => 'required'
        ];
    }
}
