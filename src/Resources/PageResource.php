<?php

namespace Detit\Polipages\Resources;

use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Detit\Polipages\Models\Page;
use Filament\Resources\Resource;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

use Filament\Forms\Components\Actions\Action;
use Filament\Resources\Concerns\Translatable;
use Detit\Polipages\Resources\PageResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Detit\Polipages\Resources\PageResource\Blocks\Faq;
use Detit\Polipages\Resources\PageResource\Blocks\Anchor;
use Detit\Polipages\Resources\PageResource\Blocks\Features;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Detit\Polipages\Resources\PageResource\Blocks\ContactForm;
use Detit\Polipages\Resources\PageResource\Blocks\CallToAction;
use Detit\Polipages\Resources\PageResource\Blocks\HeroWithImage;
use Detit\Polipages\Resources\PageResource\Blocks\HeroWithVideo;
use Detit\Polipages\Resources\PageResource\Blocks\TextWithImage;
use Detit\Polipages\Resources\PageResource\Blocks\HeroWithBckImage;
use Detit\Polipages\Resources\PageResource\Blocks\HeroWithBckVideo;

class PageResource extends Resource
{
    use Translatable;

    protected static ?string $slug = 'pages';

    protected static ?string $recordTitleAttribute = "title";

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationGroup = 'Pages';

    protected static ?string $model = Page::class;


    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Tabs::make('Tabs')
                ->tabs([
                    Tabs\Tab::make('Details')
                        ->schema([
                            TextInput::make('title')
                                ->label('Page title')
                                ->maxLength(255)
                                ->live(debounce: 500)
                                ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                                    if (($get('slug') ?? '') !== Str::slug($old)) {
                                        return;
                                    }

                                    $set('slug', Str::slug($state));
                                })
                                ->required(),
                            TextInput::make('slug')
                                ->label('slug')
                                ->required()
                                ->maxLength(255)
                                ->unique(Page::class, 'slug'),
                            Toggle::make('is_published')
                                ->label('Published')
                                ->default(true),
                            ]),
                    Tabs\Tab::make('Content')
                        ->schema([
                            Builder::make('content')
                                ->blockNumbers(false)
                                ->addActionLabel('Add a new block')
                                ->reorderableWithButtons()
                                ->collapsed()
                                ->cloneable()
                                ->blockPickerColumns(2)
                                ->blockPickerWidth('2xl')
                                ->deleteAction(
                                    fn (Action $action) => $action->requiresConfirmation(),
                                )
                                ->blockPreviews()
                                ->blocks([
                                    Anchor::make(),
                                    CallToAction::make(),
                                    Faq::make(),
                                    Features::make(),
                                    HeroWithBckImage::make(),
                                    HeroWithBckVideo::make(),
                                    HeroWithImage::make(),
                                    HeroWithVideo::make(),
                                    TextWithImage::make(),
                                    ContactForm::make(),

                            ]),
                        ]),
                    Tabs\Tab::make('SEO')
                        ->schema([
                            TextInput::make('meta_title')
                                ->label('meta title')
                                ->maxLength(255),
                            Textarea::make('meta_description')
                                ->label('meta description')
                                ->maxLength(255),
                        ]),
                ])
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')

                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'view' => Pages\ViewPage::route('/{record}'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): EloquentBuilder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
