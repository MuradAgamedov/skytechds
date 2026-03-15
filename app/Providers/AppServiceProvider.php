<?php

namespace App\Providers;

use App\Models\Address\Address;
use App\Models\Blog\Blog;
use App\Models\BlogCategory\BlogCategory;
use App\Models\Email;
use App\Models\Faq\Faq;
use App\Models\Phone;
use App\Models\Language;
use App\Models\SocialNetwork;
use App\Models\Map;
use App\Models\Statistics\Statistic;
use App\Models\AllSeo;
use App\Observers\EmailObserver;
use App\Observers\PhoneObserver;
use App\Observers\LanguageObserver;
use App\Observers\AddressObserver;
use App\Observers\BlogCategoryObserver;
use App\Observers\BlogObserver;
use App\Observers\FaqObserve;
use App\Observers\SocialNetworkObserver;
use App\Observers\MapObserver;
use App\Observers\StatisticObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use App\Policies\PermissionPolicy;
use App\Policies\PhonePolicy;
use App\Policies\EmailPolicy;
use App\Policies\AllSeoPolicy;
use App\Policies\MapPolicy;
use App\Policies\SocialNetworkPolicy;
use Spatie\Permission\Models\Role;
use App\Policies\RolePolicy;
use App\Models\User;
use App\Models\Dictionary\Dictionary;
use App\Policies\UserPolicy;
use App\Policies\AddressPolicy;
use App\Policies\LanguagePolicy;
use App\Policies\DictionaryPolicy;
use App\Policies\BlogCategoryPolicy;
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
        Blog::observe(BlogObserver::class);
        Faq::observe(FaqObserve::class);
        Statistic::observe(StatisticObserver::class);
        Gate::policy(Permission::class, PermissionPolicy::class);
        Gate::policy(Phone::class, PhonePolicy::class);
        Gate::policy(Email::class, EmailPolicy::class);
        Gate::policy(AllSeo::class, AllSeoPolicy::class);
        Gate::policy(Map::class, MapPolicy::class);
        Gate::policy(SocialNetwork::class, SocialNetworkPolicy::class);
        Gate::policy(Role::class, RolePolicy::class);
        Gate::policy(User::class, UserPolicy::class);
        Gate::policy(Address::class, AddressPolicy::class);
        Gate::policy(Language::class, LanguagePolicy::class);
        Gate::policy(Dictionary::class, DictionaryPolicy::class);
        Gate::policy(BlogCategory::class, BlogCategoryPolicy::class);
    }
}
