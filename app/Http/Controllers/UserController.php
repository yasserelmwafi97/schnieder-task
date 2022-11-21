<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacationRequest;
use App\Http\Services\vacation\VacationServiceInterface;
use Auth;
class UserController extends HomeController
{

    private VacationServiceInterface $VacationService;

    public function __construct(VacationServiceInterface $VacationService)
    {
        $this->VacationService = $VacationService;

    }
    public function createVacation(){
        return view('AdminPanel.PagesContent.Vacations.add');
    }

    public function storeVacation(VacationRequest $request)
    {
        $validated = $request->validated();
        $vacationRequest= $validated;
        $vacationRequest["user_id"]=Auth::user()->id;
        $result= $this->VacationService->createVacation($vacationRequest);
        if(isset($result['error'])){

            return   redirect()->back()->with('message',$result['error']);
        }
        return redirect()->back()->with('message','Vacation Created Successfully');
    }

    public function getMyVacations()
    {
        $result = $this->VacationService->getMyHistory(Auth::user()->id);
        return view('AdminPanel.PagesContent.Vacations.index')->with('vacations',$result);
    }

}
