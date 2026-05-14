<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ContactMessageResource\Pages\ListContactMessages;
use App\Filament\Admin\Resources\ContactMessageResource\Pages\ViewContactMessage;
use App\Models\ContactMessage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ContactMessageResource extends Resource
{
    protected static ?string $model = ContactMessage::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox';

    protected static ?string $navigationGroup = 'Site';

    protected static ?int $navigationSort = 7;

    protected static ?string $navigationLabel = 'Contact messages';

    protected static ?string $modelLabel = 'Contact message';

    protected static ?string $pluralModelLabel = 'Contact messages';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')
                ->disabled(),
            Forms\Components\TextInput::make('email')
                ->disabled(),
            Forms\Components\DateTimePicker::make('submitted_at')
                ->seconds(false)
                ->disabled(),
            Forms\Components\Textarea::make('message')
                ->rows(12)
                ->disabled()
                ->columnSpanFull(),
            Forms\Components\TextInput::make('ip_address')
                ->label('IP address')
                ->disabled(),
            Forms\Components\Textarea::make('user_agent')
                ->rows(3)
                ->disabled()
                ->columnSpanFull(),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('submitted_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('message')
                    ->limit(60)
                    ->wrap(),
                Tables\Columns\TextColumn::make('submitted_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListContactMessages::route('/'),
            'view' => ViewContactMessage::route('/{record}'),
        ];
    }
}

