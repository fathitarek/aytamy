<?php

namespace App\Repositories;

use App\Models\dreams;
use App\Repositories\BaseRepository;

/**
 * Class dreamsRepository
 * @package App\Repositories
 * @version February 26, 2021, 4:28 pm UTC
*/

class dreamsRepository extends BaseRepository
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
        return dreams::class;
    }
}
