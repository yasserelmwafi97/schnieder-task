<?php


namespace App\Http\Controllers;

use App\Http\Services\user\UserServiceInterface;
use Auth;
class HomeController extends Controller
{
    private UserServiceInterface $userService;


    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;

    }

    public function home(){
        $user_data= $this->userService->getUser(Auth::user()->id);
        return view('AdminPanel.PagesContent.index')->with("user",$user_data);
    }

}
