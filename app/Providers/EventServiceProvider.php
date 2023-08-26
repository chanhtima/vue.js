<?php

namespace App\Providers;

// use Illuminate\Auth\Events\Registered;
// use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

use Modules\User\Listeners\UserEventSubscriber;
// use Modules\Order\Listeners\OrderEventSubscriber;
// use Modules\ContactUs\Listeners\ContactEventSubscriber;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
       
    ];


    /**
    * Function : subscribe event & listener of module
    * Dev : Tong
    * Update Date : 16 Jun 2021
    * @param no
    * @return no
    */

    protected $subscribe = [
        UserEventSubscriber::class,
        // ContactEventSubscriber::class,
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
