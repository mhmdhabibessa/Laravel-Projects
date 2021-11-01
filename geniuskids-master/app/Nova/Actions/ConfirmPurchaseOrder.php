<?php

namespace App\Nova\Actions;

use App\GeniusKids\StoreConfirmedPurchaseOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\Image;

class ConfirmPurchaseOrder extends Action
{
    use InteractsWithQueue, Queueable;

    /**
     * Perform the action on the given models.
     *
     * @param ActionFields $fields
     * @param Collection $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        foreach ($models as $model) {
            $uploadedDocuments = $fields->payment_proof->store('public/payment-proofs');
            (new StoreConfirmedPurchaseOrder())->handle($model->id, Str::after($uploadedDocuments, 'public/'));
        }
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [
            File::make('Payment Proof')
                ->rules('required', 'mimes:jpg,jpeg,png,pdf', 'max:1024')
        ];
    }
}
