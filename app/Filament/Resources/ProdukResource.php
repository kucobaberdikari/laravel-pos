<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdukResource\Pages;
use App\Filament\Resources\ProdukResource\RelationManagers;
use App\Models\Produk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kode_produk')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_produk')
                    ->required()
                    ->maxLength(255),
		        Forms\Components\TextInput::make('merk')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('harga_beli')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('harga_jual')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('diskon')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('stok')
                    ->required()
                    ->numeric(),
 		        Forms\Components\FileUpload::make('foto_produk')
                    ->image()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('kode_produk')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('nama_produk')
                ->sortable()
                ->searchable(),
		        Tables\Columns\TextColumn::make('merk')
                ->sortable()
                ->searchable(),
                Tables\Columns\ImageColumn::make('foto_produk')
                ->square(),
                Tables\Columns\TextColumn::make('harga_beli')
                ->sortable(),
                Tables\Columns\TextColumn::make('harga_jual')
                ->sortable(),
                Tables\Columns\TextColumn::make('diskon'),
                Tables\Columns\TextColumn::make('stok'),
            ])
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
            'index' => Pages\ListProduks::route('/'),
            'create' => Pages\CreateProduk::route('/create'),
            'edit' => Pages\EditProduk::route('/{record}/edit'),
        ];
    }
}
