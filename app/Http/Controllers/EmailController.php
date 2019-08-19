<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\Jobs\SendMail;
use Log;
use Illuminate\Support\Facades\Cache;

class EmailController extends Controller
{
    public function sendEmail()
    {
      // Cache::put('test','test12');
       if(Cache::has('test')){
       	dd(Cache::get('test'));
       }
       
        
        Log::info("Request cycle without Queues started");
     // dd(Date('H:m:s',strtotime(now()->addMinutes(1))));
       // Mail::to('mail@appdividend.com')->send(new SendMailable());
       // dispatch(new SendMail())->delay(now()->addMinutes(1))->onConnection('database');
        Log::info("Request cycle without Queues finished");
    }
}
