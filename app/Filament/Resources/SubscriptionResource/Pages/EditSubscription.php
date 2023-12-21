<?php

namespace App\Filament\Resources\SubscriptionResource\Pages;

use Filament\Pages\Actions;
use Illuminate\Database\Query\Builder;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\SubscriptionResource;

class EditSubscription extends EditRecord
{
    protected static string $resource = SubscriptionResource::class;
    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected $messages = [
        'data.phone_number.unique' => 'This phone number already have a subscription in this cycle.',
    ];
}
