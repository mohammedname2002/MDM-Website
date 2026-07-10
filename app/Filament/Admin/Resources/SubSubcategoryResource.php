<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\SubSubcategoryResource\Pages;
use App\Models\SubSubcategory;
use App\Models\Subcategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class SubSubcategoryResource extends Resource
{
    protected static ?string $model = SubSubcategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-queue-list';

    protected static ?string $navigationGroup = 'Shop';

    protected static ?string $navigationLabel = 'Sub-subcategories';

    protected static ?string $modelLabel = 'sub-subcategory';

    protected static ?int $navigationSort = 40;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Sub-subcategory')
                    ->schema([
                        // Helper field only — not stored. It filters the subcategory list.
                        Forms\Components\Select::make('category_id')
                            ->label('Category')
                            ->options(fn () => \App\Models\Category::query()
                                ->orderBy('name')
                                ->pluck('name', 'id'))
                            ->searchable()
                            ->preload()
                            ->live()
                            ->dehydrated(false)
                            ->afterStateUpdated(fn (Forms\Set $set) => $set('subcategory_id', null))
                            ->required(),
                        Forms\Components\Select::make('subcategory_id')
                            ->label('Subcategory')
                            ->options(function (callable $get) {
                                $categoryId = $get('category_id');

                                if (! $categoryId) {
                                    return [];
                                }

                                return Subcategory::query()
                                    ->where('category_id', $categoryId)
                                    ->orderBy('sort_order')
                                    ->orderBy('name')
                                    ->pluck('name', 'id');
                            })
                            ->searchable()
                            ->required()
                            ->helperText('Pick a category first, then its subcategory.'),
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Forms\Set $set, ?string $state, callable $get): void {
                                if (blank($get('slug'))) {
                                    $set('slug', Str::slug((string) $state));
                                }
                            }),
                        Forms\Components\TextInput::make('slug')
                            ->label('URL slug')
                            ->maxLength(255)
                            ->alphaDash()
                            ->helperText('Leave empty to generate it from the name automatically.'),
                        Forms\Components\TextInput::make('sort_order')
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                            ->helperText('Lower numbers appear first.'),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('subcategory.category.name')
                    ->label('Category')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('subcategory.name')
                    ->label('Subcategory')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Sort')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean()
                    ->sortable(),
            ])
            ->defaultSort('sort_order')
            ->filters([
                Tables\Filters\SelectFilter::make('subcategory_id')
                    ->label('Subcategory')
                    ->relationship('subcategory', 'name')
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubSubcategories::route('/'),
            'create' => Pages\CreateSubSubcategory::route('/create'),
            'edit' => Pages\EditSubSubcategory::route('/{record}/edit'),
        ];
    }
}
