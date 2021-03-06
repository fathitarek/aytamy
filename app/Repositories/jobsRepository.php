<?php

namespace App\Repositories;

use App\Models\jobs;
use App\Repositories\BaseRepository;

/**
 * Class jobsRepository
 * @package App\Repositories
 * @version February 26, 2021, 4:32 pm UTC
*/

class jobsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name_en',
        '<a',
        'name_ar'
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
        return jobs::class;
    }
}
