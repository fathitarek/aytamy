<?php

namespace App\Repositories;

use App\Models\likes;
use App\Repositories\BaseRepository;

/**
 * Class likesRepository
 * @package App\Repositories
 * @version April 5, 2021, 11:04 am UTC
*/

class likesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'from',
        'to'
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
        return likes::class;
    }
}
