<?php

namespace App\Providers;

namespace App\Providers;

use App\Interfaces\GlobalWeekRepositoryInterface;
use App\Interfaces\GroupRepositoryInterface;
use App\Interfaces\ModuleRepositoryInterface;
use App\Interfaces\RoomRepositoryInterface;
use App\Interfaces\SectionRepositoryInterface;
use App\Interfaces\SectorRepositoryInterface;
use App\Interfaces\SessionRepositoryInterface;
use App\Interfaces\TeacherRepositoryInterface;
use App\Interfaces\TimingRepositoryInterface;
use App\Interfaces\WeekRepositoryInterface;
use App\Interfaces\YearRepositoryInterface;
use App\Repositories\GlobalWeekRepository;
use App\Repositories\GroupRepository;
use App\Repositories\ModuleRepository;
use App\Repositories\RoomRepository;
use App\Repositories\SectionRepository;
use App\Repositories\SectorRepository;
use App\Repositories\SessionRepository;
use App\Repositories\TeacherRepository;
use App\Repositories\TimingRepository;
use App\Repositories\WeekRepository;
use App\Repositories\YearRepository;
use Illuminate\Support\ServiceProvider;

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
        $this->app->bind(SectorRepositoryInterface::class, SectorRepository::class);
        $this->app->bind(TeacherRepositoryInterface::class, TeacherRepository::class);
        $this->app->bind(RoomRepositoryInterface::class, RoomRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
