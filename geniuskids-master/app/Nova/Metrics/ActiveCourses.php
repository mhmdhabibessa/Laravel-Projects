<?php

namespace App\Nova\Metrics;

use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use ThijsSimonis\NovaListCard\NovaListCard;

class ActiveCourses extends NovaListCard
{
    public $width = '1/2';

    public function __construct()
    {
        parent::__construct();

        $this->heads(['ID', 'Name', 'Starts', 'Ends', 'View']);

        $this->rows(Schedule::select('id','name->en', 'starts_on', 'ends_on')
            ->where('ends_on', '>=', Carbon::today())
            ->has('students')
            ->get()
            ->map(function ($row) {
                $row['starts_onn'] = Carbon::parse($row['starts_on'])->format('d-m-Y');
                Arr::forget($row, 'starts_on');
                $row['ends_onn'] = Carbon::parse($row['ends_on'])->format('d-m-Y');
                $row['ends_on'] = null;
                Arr::forget($row, 'ends_on');
                $row['view'] = config('nova.path') . '/resources/schedules/' . $row['id'];
                return $row;
            }));
    }

    public function uriKey(): string
    {
        return 'active-courses';
    }
}
