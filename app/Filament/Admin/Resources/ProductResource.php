<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProductResource\Pages;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\SubSubcategory;
use Filament\Forms;
use Illuminate\Support\Str;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationGroup = 'Shop';

    protected static ?int $navigationSort = 10;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Product')
                    ->description('Main product details and gallery.')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Forms\Set $set, ?string $state, callable $get): void {
                                if (blank($get('slug'))) {
                                    $set('slug', Str::slug((string) $state));
                                }
                            })
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('slug')
                            ->label('URL slug')
                            ->required()
                            ->maxLength(255)
                            ->alphaDash()
                            ->unique(ignoreRecord: true)
                            ->helperText('Shown in the address bar, e.g. /products/tone-cream-30ml. Letters, numbers, and hyphens only.'),
                        Forms\Components\RichEditor::make('description')
                            ->columnSpanFull(),
                        Forms\Components\RichEditor::make('how_to_use')
                            ->label('How to use')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('price')
                            ->label('Current price')
                            ->numeric()
                            ->prefix('$')
                            ->minValue(0)
                            ->step(0.01)
                            ->default(0)
                            ->required(),
                        Forms\Components\TextInput::make('compare_at_price')
                            ->label('Compare at price')
                            ->helperText('Optional “was” price shown struck through when higher than current price.')
                            ->numeric()
                            ->prefix('$')
                            ->minValue(0)
                            ->step(0.01)
                            ->nullable(),
                        Forms\Components\TextInput::make('flash_badge')
                            ->label('Corner badge')
                            ->helperText('e.g. -25%, New, or leave empty.')
                            ->maxLength(32)
                            ->nullable(),
                        Forms\Components\Toggle::make('is_featured')
                            ->label('Featured on home')
                            ->default(false),
                        Forms\Components\TextInput::make('featured_sort')
                            ->label('Featured order')
                            ->numeric()
                            ->default(0)
                            ->minValue(0)
                            ->helperText('Lower numbers appear first in the home “Featured” row.'),
                        Forms\Components\FileUpload::make('images')
                            ->label('Product images')
                            ->helperText('You can upload many images. Drag thumbnails to change order.')
                            ->multiple()
                            ->reorderable()
                            ->appendFiles()
                            ->panelLayout('grid')
                            ->image()
                            ->imageEditor()
                            ->directory('products/gallery')
                            ->disk('public')
                            ->maxFiles(30)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                Forms\Components\Section::make('Organization')
                    ->description('Place this product in the category tree. Subcategory and sub-subcategory are optional — pick as deep as you need.')
                    ->schema([
                        Forms\Components\Select::make('category_id')
                            ->label('Category')
                            ->options(fn () => Category::query()->orderBy('sort_order')->orderBy('name')->pluck('name', 'id'))
                            ->searchable()
                            ->preload()
                            ->live()
                            ->afterStateUpdated(function (Forms\Set $set): void {
                                $set('subcategory_id', null);
                                $set('sub_subcategory_id', null);
                            }),
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
                            ->live()
                            ->afterStateUpdated(fn (Forms\Set $set) => $set('sub_subcategory_id', null))
                            ->disabled(fn (callable $get) => ! $get('category_id')),
                        Forms\Components\Select::make('sub_subcategory_id')
                            ->label('Sub-subcategory')
                            ->options(function (callable $get) {
                                $subcategoryId = $get('subcategory_id');

                                if (! $subcategoryId) {
                                    return [];
                                }

                                return SubSubcategory::query()
                                    ->where('subcategory_id', $subcategoryId)
                                    ->orderBy('sort_order')
                                    ->orderBy('name')
                                    ->pluck('name', 'id');
                            })
                            ->searchable()
                            ->disabled(fn (callable $get) => ! $get('subcategory_id')),
                    ])
                    ->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->placeholder('—')
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('subcategory.name')
                    ->label('Subcategory')
                    ->placeholder('—')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\ImageColumn::make('images')
                    ->label('Photos')
                    ->disk('public')
                    ->stacked()
                    ->limit(3)
                    ->limitedRemainingText()
                    ->height(40)
                    ->width(40),
                Tables\Columns\TextColumn::make('price')
                    ->money('USD')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('featured_sort')
                    ->label('Sort')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'name')
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
