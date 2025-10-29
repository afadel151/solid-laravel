<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\{
    ModuleRepositoryInterface,
    GlobalWeekRepositoryInterface,
    WeekRepositoryInterface,
    YearRepositoryInterface,
    SectionRepositoryInterface,
    GroupRepositoryInterface,
    SessionRepositoryInterface,
    TimingRepositoryInterface
};
use App\Repositories\{
    ModuleRepository,
    GlobalWeekRepository,
    WeekRepository,
    YearRepository,
    SectionRepository,
    GroupRepository,
    SessionRepository,
    TimingRepository
};

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ModuleRepositoryInterface::class, ModuleRepository::class);
        $this->app->bind(GlobalWeekRepositoryInterface::class, GlobalWeekRepository::class);
        $this->app->bind(WeekRepositoryInterface::class, WeekRepository::class);
        $this->app->bind(YearRepositoryInterface::class, YearRepository::class);
        $this->app->bind(SectionRepositoryInterface::class, SectionRepository::class);
        $this->app->bind(GroupRepositoryInterface::class, GroupRepository::class);
        $this->app->bind(SessionRepositoryInterface::class, SessionRepository::class);
        $this->app->bind(TimingRepositoryInterface::class, TimingRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
