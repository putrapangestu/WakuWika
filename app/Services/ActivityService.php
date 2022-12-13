<?php 

namespace App\Services;

use App\Models\User;
use App\Request\ActivityRequest;
use Illuminate\Support\Facades\{Auth,Hash};
use Illuminate\Http\Request;

class ActivityService
{
    private $activityRepo;

    function __construct()
    {
        
    }

    public function loginAdmin(ActivityRequest $request)
    {
        $validated = $request->validated();
        dd($validated["email"]);
        $login = Auth::attempt(['email' => $validated["email"],'password' => $validated["password"]]);
        if($login)
        {
            $request->session()->regenerate();
            return redirect("admin");
        }
    }
}