<?php

namespace App\Http\Services\vacation;

use App\Http\Repositories\vacation\VacationRepositoryInterface;
use App\Http\Services\user\UserServiceInterface;
use Nette\Utils\DateTime;

class VacationService implements VacationServiceInterface
{
    private UserServiceInterface $UserService;
    private VacationRepositoryInterface $VacationRepository;

    public function __construct(UserServiceInterface $UserService, VacationRepositoryInterface $VacationRepository)
    {
       $this->UserService= $UserService;
       $this->VacationRepository= $VacationRepository;
    }

    /**
     * @throws \Exception
     */
    public function createVacation($vacationRequest)
    {
        $userRow = $this->UserService->getUser($vacationRequest["user_id"]);

        $number_of_days = 1;
        $fromDate =new DateTime($vacationRequest["start_date"]);
        $toDate =new DateTime($vacationRequest["end_date"]);
        $fromDate=$fromDate->getTimestamp();
        $toDate=$toDate->getTimestamp();

        while ( $fromDate !=  $toDate) {
            $day = date("w", $fromDate);
            if ($day != 6 || $day != 5) {
                $number_of_days ++;
            }
            $fromDate = strtotime(date("Y-m-d", $fromDate) . "+1 day");
        }

        if($userRow["balance"] < $number_of_days){
            return ["error"=>"balance not enough"];
        }
        $current_balance = $userRow["balance"] - $number_of_days;

        $vacationRequest["number_of_days"]=$number_of_days;

       $isUpdated = $this->UserService->updateUser(["balance" =>$current_balance],$vacationRequest["user_id"]);

       if(!$isUpdated)
       {
           return ["error"=>"balance not enough"];
       }
       return  $this->VacationRepository->create($vacationRequest);
    }

    public function getMyHistory($user_id)
    {
       return $this->VacationRepository->getAll(["id","user_id","start_date","end_date","number_of_days","type"],["user_id"=>$user_id]);
    }
}
