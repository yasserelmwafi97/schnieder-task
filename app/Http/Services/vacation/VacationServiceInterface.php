<?php

namespace App\Http\Services\vacation;

interface VacationServiceInterface
{
    public function createVacation($vacationRequest);
    public function getMyHistory($user_id);
}
