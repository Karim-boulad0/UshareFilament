<?php

namespace App\Filament\Resources\SubscriptionResource\Pages;

use Filament\Pages\Actions;
use App\Models\Subscription;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\SubscriptionResource;

class CreateSubscription extends CreateRecord
{
    protected static string $resource = SubscriptionResource::class;

    protected $messages = [
        'data.phone_number.unique' => 'This phone number already have a subscription in this cycle.',
    ];
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
