<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\AboutPageResource\Pages;
use App\Models\AboutPage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AboutPageResource extends Resource
{
    protected static ?string $model = AboutPage::class;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';

    protected static ?string $navigationGroup = 'Site';

    protected static ?int $navigationSort = 5;

    protected static ?string $navigationLabel = 'About page';

    protected static ?string $modelLabel = 'About page';

    protected static ?string $pluralModelLabel = 'About page';

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
        return $form
            ->schema([
                Forms\Components\Section::make('Hero')
                    ->description('Full-width intro band (hero + title).')
                    ->schema([
                        Forms\Components\TextInput::make('hero_kicker')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('hero_title')
                            ->maxLength(255)
                            ->required(),
                        Forms\Components\FileUpload::make('hero_bg_light')
                            ->label('Hero background (light theme)')
                            ->image()
                            ->disk('public')
                            ->directory('about/hero')
                            ->helperText('Optional. Leave empty to use the path below or theme default.'),
                        Forms\Components\FileUpload::make('hero_bg_dark')
                            ->label('Hero background (dark theme)')
                            ->image()
                            ->disk('public')
                            ->directory('about/hero'),
                    ])
                    ->columns(2),
                Forms\Components\Section::make('Intro')
                    ->schema([
                        Forms\Components\FileUpload::make('intro_image')
                            ->label('Center image')
                            ->image()
                            ->disk('public')
                            ->directory('about/intro'),
                        Forms\Components\TextInput::make('intro_heading')
                            ->maxLength(500)
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('intro_body')
                            ->rows(4)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                Forms\Components\Section::make('Story — first block')
                    ->schema([
                        Forms\Components\FileUpload::make('story_one_image')
                            ->label('Image')
                            ->image()
                            ->disk('public')
                            ->directory('about/stories'),
                        Forms\Components\TextInput::make('story_one_heading')
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('story_one_body')
                            ->rows(4)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                Forms\Components\Section::make('Story — second block')
                    ->schema([
                        Forms\Components\FileUpload::make('story_two_image')
                            ->label('Image')
                            ->image()
                            ->disk('public')
                            ->directory('about/stories'),
                        Forms\Components\TextInput::make('story_two_heading')
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('story_two_body')
                            ->rows(4)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                Forms\Components\Section::make('Testimonials')
                    ->schema([
                        Forms\Components\Repeater::make('testimonials')
                            ->schema([
                                Forms\Components\Textarea::make('quote')
                                    ->rows(3)
                                    ->required(),
                            ])
                            ->defaultItems(0)
                            ->collapsible()
                            ->columnSpanFull(),
                    ]),
                Forms\Components\Section::make('Team')
                    ->schema([
                        Forms\Components\TextInput::make('team_section_heading')
                            ->maxLength(500)
                            ->columnSpanFull(),
                        Forms\Components\Repeater::make('team_members')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('role')
                                    ->maxLength(255),
                                Forms\Components\FileUpload::make('photo')
                                    ->image()
                                    ->disk('public')
                                    ->directory('about/team'),
                            ])
                            ->defaultItems(0)
                            ->collapsible()
                            ->columnSpanFull(),
                    ]),
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
            'index' => Pages\ListAboutPages::route('/'),
            'edit' => Pages\EditAboutPage::route('/{record}/edit'),
        ];
    }
}
