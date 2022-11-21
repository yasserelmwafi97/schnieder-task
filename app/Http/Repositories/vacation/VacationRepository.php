<?php

namespace App\Http\Repositories\vacation;

use App\Http\Repositories\BaseRepository;
use App\Http\Repositories\vacation\VacationRepositoryInterface;
use App\Models\Vacation;

class VacationRepository extends BaseRepository implements VacationRepositoryInterface
{
    public function __construct(Vacation $model)
    {
        parent::__construct($model);
    }
}
