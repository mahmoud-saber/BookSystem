<?php

namespace App\Filament\Admin\Resources\Categories\Pages;

use App\Filament\Admin\Resources\Categories\CategoryResource;
use App\Models\Category;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;


/**
 * * Mutate the data before creating a new record.
 * This function is responsible for creating a new record based on the given data.
 * It returns the newly created category object.
 * It logs information about the newly created category.
 */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['slug'] = str()->slug($data['name'],'-');
        return $data;
    }
/**
 * Handle record creation.
 *
 * This function is responsible for creating a new record based on the given data.
 * It returns the newly created category object.
 *
 * It logs information about the newly created category.
 * @param array $data The data used to create the new record.
 * @return Model The newly created category object.
 */
    protected function handleRecordCreation(array $data): Model
    {
        $category = Category::create($data);
        Log::info("category created with name: ".$category->name);
        return $category;
    }

/**
 * Return the title of the notification that is displayed to the user after creating a record.
 *
 * @return string|null The title of the notification, or null if no title is desired.
 */
    // protected function getCreatedNotificationTitle(): ?string
    // {
    //     return 'Category Created';
    // }
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Category Created')
            ->body('The category has been successfully created.')
            ->icon(Heroicon::AcademicCap);

    }


    /**
     * Return the URL to redirect to after creating the record.
     *
     * @return string
     */
    protected function getRedirectUrl(): string
    {
        // return $this->getResource()::getUrl('index'); // This is the default redirect URL after creating a record, which takes the user back to the index page of the resource.


        // return $this->getResource()::getUrl('index'); // This is the default redirect URL after creating a record, which takes the user back to the index page of the resource.
        return $this->getResource()::getUrl('index'); // This is the default
        return $this->PreviousUrl ?? $this->getResource()::getUrl('index'); // Redirect to the previous URL if available, otherwise go to the index page of the resource.
    }
}
