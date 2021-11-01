<?php

namespace App\Nova\Metrics;

use App\Models\Schedule;
use App\Models\Student;
use Carbon\Carbon;
use ThijsSimonis\NovaListCard\NovaListCard;

class LatestStudents extends NovaListCard
{
    public $width = '1/2';

    public function __construct()
    {
        parent::__construct();

        $this->heads(['ID', 'Name', 'Email', 'View']);

        $this->rows(Student::select('id', 'name', 'email')
            ->orderBy('created_at', 'DESC')
            ->limit(10)
            ->get()
            ->map(function ($row) {
                $row['view'] = config('nova.path') . '/resources/students/' . $row['id'];
                return $row;
            }));
    }

    public function uriKey(): string
    {
        return 'latest-students';
    }
}
