<?php

namespace App\Repositories;

use App\Models\countries;
use App\Repositories\BaseRepository;

/**
 * Class countriesRepository
 * @package App\Repositories
 * @version February 26, 2021, 4:20 pm UTC
*/

class countriesRepository extends BaseRepository
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
        return countries::class;
    }
}
