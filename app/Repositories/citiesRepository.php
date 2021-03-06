<?php

namespace App\Repositories;

use App\Models\cities;
use App\Repositories\BaseRepository;

/**
 * Class citiesRepository
 * @package App\Repositories
 * @version February 26, 2021, 6:57 pm UTC
*/

class citiesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name_en',
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
        return cities::class;
    }
}
