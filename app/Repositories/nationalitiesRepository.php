<?php

namespace App\Repositories;

use App\Models\nationalities;
use App\Repositories\BaseRepository;

/**
 * Class nationalitiesRepository
 * @package App\Repositories
 * @version February 26, 2021, 4:38 pm UTC
*/

class nationalitiesRepository extends BaseRepository
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
        return nationalities::class;
    }
}
