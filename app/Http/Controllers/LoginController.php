<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Request\ActivityRequest;
use App\Services\ActivityService;

class LoginController extends Controller
{
    private $activity;

    function __construct(ActivityService $activityService)
    {
        $this->activity = $activityService;
    }

    public function halaman()
    {
        return view("login");
    }

    public function postLogin(ActivityRequest $request)
    {
        $this->activity->loginAdmin($request);
    }
}
