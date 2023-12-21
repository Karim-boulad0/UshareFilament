<?php

namespace App\Filament\Widgets;

use App\Models\Bundle;
use App\Models\CycleBundle;
use App\Models\Subscription;
use Illuminate\Support\Facades\DB;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {

        return [];
    }
}
