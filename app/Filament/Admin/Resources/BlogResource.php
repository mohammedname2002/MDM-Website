<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BlogResource\Pages;
use App\Models\Blog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Content';

    protected static ?int $navigationSort = 20;

    public static function form(Form $form): Form
    {
        $tagsToText = function ($state): string {
            if ($state === null || $state === []) {
                return '';
            }
            if (is_array($state)) {
                return collect($state)->filter()->map(fn ($t) => trim((string) $t))->filter()->implode(', ');
            }

            return trim((string) $state);
        };

        $textToTags = function ($state): array {
            $raw = trim((string) $state);
            if ($raw === '') {
                return [];
            }

            return collect(explode(',', $raw))
                ->map(fn ($t) => trim($t))
                ->filter()
                ->values()
                ->all();
        };

        return $form
            ->schema([
                Forms\Components\Section::make('Blog post')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('slug')
                            ->disabled()
                            ->dehydrated()
                            ->helperText('Auto-generated from title.')
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('name')
                            ->label('Name')
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('category')
                            ->maxLength(120)
                            ->helperText('Example: Skin care, Tips, Life style...')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('tags')
                            ->label('Tags (comma-separated)')
                            ->formatStateUsing($tagsToText)
                            ->dehydrateStateUsing($textToTags)
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('description')
                            ->label('Description')
                            ->rows(4)
                            ->helperText('Short excerpt used in lists/cards.')
                            ->columnSpanFull(),
                        Forms\Components\RichEditor::make('content')
                            ->label('Content')
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'strike',
                                'h2',
                                'h3',
                                'blockquote',
                                'bulletList',
                                'orderedList',
                                'link',
                                'undo',
                                'redo',
                            ])
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('cover_image')
                            ->label('Cover image (optional)')
                            ->image()
                            ->imageEditor()
                            ->directory('blogs/cover')
                            ->disk('public')
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('images')
                            ->label('Images')
                            ->multiple()
                            ->reorderable()
                            ->appendFiles()
                            ->image()
                            ->imageEditor()
                            ->directory('blogs/gallery')
                            ->disk('public')
                            ->maxFiles(30)
                            ->columnSpanFull(),
                        Forms\Components\DateTimePicker::make('published_at')
                            ->seconds(false)
                            ->helperText('Optional. Leave empty if you do not need publish scheduling.')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category')
                    ->searchable()
                    ->placeholder('—')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->placeholder('—')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('views')
                    ->numeric()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
