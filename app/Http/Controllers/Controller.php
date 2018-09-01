<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function counts($user) {
        $count_jobs = $user->jobs()->count();
        $count_entries = $user->entries()->count();
        $count_sendmails = $user->sendmails()->count();
        $count_mailtemplates = $user->mailtemplates()->count();

        return [
            'count_jobs' => $count_jobs,
            'count_entries' => $count_entries,
            'count_sendmails' => $count_sendmails,
            'count_mailtemplates' => $count_mailtemplates,
        ];
    }
}
