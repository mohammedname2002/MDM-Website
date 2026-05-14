<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ContactPageResource\Pages;
use App\Models\ContactPage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ContactPageResource extends Resource
{
    protected static ?string $model = ContactPage::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $navigationGroup = 'Site';

    protected static ?int $navigationSort = 6;

    protected static ?string $navigationLabel = 'Contact page';

    protected static ?string $modelLabel = 'Contact page';

    protected static ?string $pluralModelLabel = 'Contact page';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDelete($record): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        $jsonToText = function ($state): string {
            if ($state === null || $state === []) {
                return '';
            }
            if (is_array($state)) {
                return json_encode($state, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
            }

            return (string) $state;
        };

        $textToJsonArray = function ($state): array {
            if ($state === null || trim((string) $state) === '') {
                return [];
            }
            $decoded = json_decode((string) $state, true);

            return is_array($decoded) ? $decoded : [];
        };

        return $form
            ->schema([
                Forms\Components\Section::make('Breadcrumb & hero')
                    ->schema([
                        Forms\Components\TextInput::make('breadcrumb_label')
                            ->maxLength(120)
                            ->required(),
                        Forms\Components\TextInput::make('hero_title')
                            ->maxLength(255)
                            ->required(),
                        Forms\Components\Textarea::make('hero_subtitle')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                Forms\Components\Section::make('Address')
                    ->schema([
                        Forms\Components\TextInput::make('address_heading')
                            ->maxLength(120)
                            ->required(),
                        Forms\Components\Textarea::make('address_body')
                            ->rows(5)
                            ->helperText('Plain text; line breaks are shown on the site.')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('directions_url')
                            ->label('Directions link URL')
                            ->maxLength(2048),
                        Forms\Components\TextInput::make('directions_label')
                            ->maxLength(120),
                    ])
                    ->columns(2),
                Forms\Components\Section::make('Phone & email')
                    ->schema([
                        Forms\Components\TextInput::make('contact_heading')
                            ->maxLength(120)
                            ->required(),
                        Forms\Components\TextInput::make('mobile_label')->maxLength(80),
                        Forms\Components\TextInput::make('mobile')->maxLength(120),
                        Forms\Components\TextInput::make('hotline_label')->maxLength(80),
                        Forms\Components\TextInput::make('hotline')->maxLength(120),
                        Forms\Components\TextInput::make('email_label')->maxLength(80),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->nullable()
                            ->maxLength(255),
                    ])
                    ->columns(2),
                Forms\Components\Section::make('Hours')
                    ->schema([
                        Forms\Components\TextInput::make('hours_heading')
                            ->maxLength(120)
                            ->required(),
                        Forms\Components\TextInput::make('weekday_label')->maxLength(80),
                        Forms\Components\TextInput::make('weekday_hours')->maxLength(120),
                        Forms\Components\TextInput::make('weekend_label')->maxLength(80),
                        Forms\Components\TextInput::make('weekend_hours')->maxLength(120),
                    ])
                    ->columns(2),
                Forms\Components\Section::make('Map (Mapbox)')
                    ->description('Theme reads JSON from data attributes. Marker backgroundImage can be `assets/...` (public) or a full URL.')
                    ->schema([
                        Forms\Components\TextInput::make('map_height')
                            ->numeric()
                            ->minValue(200)
                            ->maxValue(1200)
                            ->suffix('px'),
                        Forms\Components\Textarea::make('mapbox_access_token')
                            ->rows(2)
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('map_options')
                            ->label('Map options (JSON)')
                            ->rows(8)
                            ->formatStateUsing($jsonToText)
                            ->dehydrateStateUsing($textToJsonArray)
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('map_markers')
                            ->label('Map markers (JSON array)')
                            ->rows(10)
                            ->formatStateUsing($jsonToText)
                            ->dehydrateStateUsing($textToJsonArray)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                Forms\Components\Section::make('Contact form labels')
                    ->schema([
                        Forms\Components\TextInput::make('form_heading')
                            ->maxLength(255)
                            ->required(),
                        Forms\Components\TextInput::make('placeholder_name')->maxLength(120),
                        Forms\Components\TextInput::make('placeholder_email')->maxLength(120),
                        Forms\Components\TextInput::make('placeholder_message')->maxLength(120),
                        Forms\Components\Textarea::make('checkbox_label')
                            ->rows(2)
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('submit_label')->maxLength(120),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('hero_title')
                    ->label('Title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->paginated(false)
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactPages::route('/'),
            'edit' => Pages\EditContactPage::route('/{record}/edit'),
        ];
    }
}
