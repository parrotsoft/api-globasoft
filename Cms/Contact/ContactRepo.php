<?php

namespace Cms\Contact;

use Cms\Base\BaseRepo;

class ContactRepo extends BaseRepo
{

    public function getModel()
    {
        return new Contact();
    }

    public function setValidation()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ];
    }
}
