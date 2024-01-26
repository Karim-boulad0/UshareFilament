<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Bundle;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Toggle;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Filters\TrashedFilter;
use App\Filament\Resources\BundleResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BundleResource\RelationManagers;

class BundleResource extends Resource
{
    public static function getEloquentQuery(): Builder
    {
        if (!auth()->user()->hasRole(["super-admin",'show-archive'])) {
            return static::getModel()::query()->where('is_active', 1);
        } else {
            return static::getModel()::query();
        }
    }
    protected static ?string $model = Bundle::class;

    protected static ?string $navigationIcon = 'heroicon-o-adjustments';

    protected static ?string $navigationGroup = 'Subscriptions';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required(),
                        Forms\Components\TextInput::make('capacity')
                            ->required(),                       
                             Forms\Components\TextInput::make('price')
                            ->required(),
                        Toggle::make('is_active')

                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->searchable(),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('capacity')->searchable(),
                Tables\Columns\TextColumn::make('price')->searchable(),
                BooleanColumn::make('is_active')->searchable(),
            ])
            ->filters([
                TrashedFilter::make(),
                Tables\Filters\Filter::make('activeBundles')
                ->default('activeBundles')
                ->query(fn (Builder $query): Builder => $query->where('is_active', 1)),
                Tables\Filters\Filter::make('NotActiveBundles')
                ->query(fn (Builder $query): Builder => $query->where('is_active', 0)),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBundles::route('/'),
            'create' => Pages\CreateBundle::route('/create'),
            'view' => Pages\ViewBundle::route('/{record}'),
            'edit' => Pages\EditBundle::route('/{record}/edit'),
        ];
    }
}
