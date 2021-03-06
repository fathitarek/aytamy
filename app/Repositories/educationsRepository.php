<?php

namespace App\Repositories;

use App\Models\educations;
use App\Repositories\BaseRepository;

/**
 * Class educationsRepository
 * @package App\Repositories
 * @version February 26, 2021, 6:56 pm UTC
*/

class educationsRepository extends BaseRepository
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
        return educations::class;
    }
}
