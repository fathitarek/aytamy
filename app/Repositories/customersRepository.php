<?php

namespace App\Repositories;

use App\Models\customers;
use App\Repositories\BaseRepository;

/**
 * Class customersRepository
 * @package App\Repositories
 * @version February 26, 2021, 6:53 pm UTC
*/

class customersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'image',
        'whats_app'
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
        return customers::class;
    }
}
