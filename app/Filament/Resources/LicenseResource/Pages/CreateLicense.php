<?php

namespace App\Filament\Resources\LicenseResource\Pages;

use Filament\Resources\Pages\CreateRecord as BaseCreateRecord;
use App\Filament\Resources\LicenseResource;

class CreateRecord extends BaseCreateRecord
{
    protected static string $resource = LicenseResource::class;
}