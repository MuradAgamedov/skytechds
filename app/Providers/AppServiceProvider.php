<?php

namespace App\Providers;

use App\Models\Address\Address;
use App\Models\BlogCategory\BlogCategory;
use App\Models\Dictionary\Dictionary;
use App\Models\Email;
use App\Models\Phone;
use App\Models\Language;
use App\Models\SocialNetwork;
use App\Models\Map;
use App\Observers\EmailObserver;
use App\Observers\PhoneObserver;
use App\Observers\LanguageObserver;
use App\Observers\AddressObserver;
use App\Observers\BlogCategoryObserver;
use App\Observers\SocialNetworkObserver;
use App\Observers\MapObserver;
use App\Observers\DictionaryObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Phone::observe(PhoneObserver::class);
        Email::observe(EmailObserver::class);
        Language::observe(LanguageObserver::class);
        Address::observe(AddressObserver::class);
        SocialNetwork::observe(SocialNetworkObserver::class);
        Map::observe(MapObserver::class);
        BlogCategory::observe(BlogCategoryObserver::class);
    }
}
