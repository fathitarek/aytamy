<?php

namespace App\Repositories;

use App\Models\notifications;
use App\Repositories\BaseRepository;

/**
 * Class notificationsRepository
 * @package App\Repositories
 * @version April 6, 2021, 11:21 am UTC
*/

class notificationsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'body',
        'customer_id',
        'lang'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return notifications::class;
    }
}
