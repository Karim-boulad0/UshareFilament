<?php

namespace io3x1\FilamentUser\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use STS\FilamentImpersonate\Impersonate;
use Filament\Tables\Columns\SelectColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MultiSelect;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Filters\TrashedFilter;
use io3x1\FilamentUser\Resources\UserResource\Pages;

class UserResource extends Resource
{

    public static function getEloquentQuery(): Builder
    {
        if (auth()->user()->id && !auth()->user()->is_admin) {
            return static::getModel()::query()->where('id', auth()->user()->id);
        } else {
            if (!auth()->user()->hasRole('super-admin')) {
                return static::getModel()::query()->where('id', '!=', 1)->orderBy("id", 'desc');
            } else {
                return static::getModel()::query()->orderBy("id", 'desc');
            }
        }
    }
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $model = User::class;

    protected static ?int $navigationSort = 9;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static function getNavigationLabel(): string
    {
        return trans('filament-user::user.resource.label');
    }

    public static function getPluralLabel(): string
    {
        return trans('filament-user::user.resource.label');
    }

    public static function getLabel(): string
    {
        return trans('filament-user::user.resource.single');
    }

    protected static function getNavigationGroup(): ?string
    {
        if (!auth()->user()->hasRole('user')) {
            return 'User Management';
        } else {
            return 'My Profile';
        }
    }

    protected function getTitle(): string
    {
        return trans('filament-user::user.resource.title.resource');
    }

    public static function form(Form $form): Form
    {
        if (!auth()->user()->hasRole('user')) {
            return $form
                ->schema([
                    Toggle::make('is_admin')
                        ->required(),
                    TextInput::make('name')->required(),
                    TextInput::make('email')->email()->required(),
                    Forms\Components\TextInput::make('password')
                        ->password()
                        ->maxLength(255)
                        ->dehydrateStateUsing(fn ($state) => !empty($state) ? Hash::make($state) : ""),

                    MultiSelect::make('roles')
                        ->relationship('roles', 'name')
                        ->options(function () {
                            if (!auth()->user()->hasRole('super-admin')) {
                                return Role::where('name', '!=', 'super-admin')
                                    ->where('name', '!=', 'admin')
                                    ->where('name', '!=', 'show-archive')->get()->pluck("name", "id");
                            } else {
                                return Role::get()->pluck("name", 'id');
                            }
                        })->preload(),


                    Select::make('admin_create')
                        ->options(function () {
                            return User::where('id', '=', auth()->user()->id)->pluck('id', 'name');
                        })->required()
                ]);
        } else {
            return $form
                ->schema([
                    TextInput::make('name')->required(),

                    TextInput::make('email')->email()->required(),
                    Forms\Components\TextInput::make('password')
                        ->password()
                        ->maxLength(255)
                        ->dehydrateStateUsing(fn ($state) => !empty($state) ? Hash::make($state) : ""),
                ]);
        }
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('name')->sortable()->searchable(),

                TextColumn::make('email')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('M j, Y')->sortable(),
                BooleanColumn::make('is_admin')->sortable(),
                TextColumn::make('admin_create')->sortable()
                    ->searchable(),
            ])
            ->prependActions([
                Impersonate::make('impersonate'),
            ])
            ->filters([
                Tables\Filters\Filter::make('admin')
                    ->query(fn (Builder $query): Builder => $query->whereIn('is_admin', [1])),
                Tables\Filters\Filter::make('user')
                    ->query(fn (Builder $query): Builder => $query->whereNotIn('is_admin', [1])), TrashedFilter::make(), TrashedFilter::make(), TrashedFilter::make(), TrashedFilter::make(), TrashedFilter::make(), TrashedFilter::make(), TrashedFilter::make(), TrashedFilter::make(),
                TrashedFilter::make(),

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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
