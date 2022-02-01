<?php

namespace Cms\Task;

use Cms\Base\BaseRepo;

class TaskRepo extends BaseRepo
{

    public function getModel()
    {
        return new Task();
    }
}
