<?php

namespace App\Nova;

use App\Nova\Actions\ConfirmPurchaseOrder;
use App\Nova\Actions\DiscardPurchaseOrder;
use App\Nova\Lenses\ConfirmedPurchaseOrders;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class PurchaseOrder extends Resource
{
    /**
     * Build an "index" query for the given resource.
     *
     * @param NovaRequest $request
     * @param Builder $query
     * @return Builder
     */
    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->pending();
    }

    public static function authorizedToCreate(Request $request)
    {
        return false;
    }

    public function authorizedToUpdate(Request $request)
    {
        return false;
    }

    public function authorizedToDelete(Request $request)
    {
        return false;
    }

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\PurchaseOrder::class;

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Accounting';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'father_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'father_name', 'mother_name', 'main_contact', 'emergency_contact', 'email'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make('Discount')->onlyOnDetail(),

            BelongsTo::make('City')->onlyOnDetail(),

            Text::make('Father Name'),

            Text::make('Mother Name')->onlyOnDetail(),

            Text::make('Main Contact'),

            Text::make('Emergency Contact')->onlyOnDetail(),

            Currency::make('Total')->onlyOnDetail(),

            Currency::make('Discount')->onlyOnDetail(),

            Currency::make('Vat')->onlyOnDetail(),

            Currency::make('Grand Total'),

            File::make('Discount Proof')->onlyOnDetail(),

            File::make('Payment Proof')->onlyOnDetail(),

            Text::make('Payment Method'),

            Text::make('Delivery Address')
                ->canSee(function () {
                    return isset($this->delivery_address);
                })
                ->onlyOnDetail(),

            Date::make('Paid On')->format('DD-MM-YYYY')->onlyOnDetail(),

            Date::make('Cancelled On')->format('DD-MM-YYYY')->onlyOnDetail(),

            Date::make('Date', 'created_at')
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param Request $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param Request $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [
            (new ConfirmedPurchaseOrders())
        ];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [
            (new ConfirmPurchaseOrder())
                ->canSee(function ($request) {
                    if ($request->has('resourceId')) {
                        $model = optional($request->findModelQuery()->first());
                        return !isset($model->paid_on) && !isset($model->cancelled_on);
                    } else {
                        return true;
                    }
                })
                ->canRun(function ($request) {
                    return true;
                })
                ->onlyOnDetail(),
            (new DiscardPurchaseOrder())
                ->canSee(function ($request) {
                    if ($request->has('resourceId')) {
                        $model = optional($request->findModelQuery()->first());
                        return !isset($model->paid_on) && !isset($model->cancelled_on);
                    } else {
                        return true;
                    }
                })
                ->canRun(function ($request) {
                    return true;
                })
                ->onlyOnDetail()
        ];
    }
}
