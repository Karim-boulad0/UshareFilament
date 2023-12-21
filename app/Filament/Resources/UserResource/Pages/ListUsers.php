<?php

namespace io3x1\FilamentUser\Resources\UserResource\Pages;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\ListRecords;
use io3x1\FilamentUser\Resources\UserResource;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;


    // protected function getTableQuery(): Builder
    // {
    //     return User::query()->orderBy("id",'desc');
    // }

}
