<?php

namespace App\Data\Repositories\Eloquent;

use App\Models\Contact;

class ContactRepository extends AppBaseRepository
{
    /**
     * Attribute seachable
     *
     * @var array
     */
    protected $fieldSearchable = [
        'email' => ['column' => 'contacts.email', 'operator' => 'like', 'type' => 'normal'],
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Contact::class;
    }
}
