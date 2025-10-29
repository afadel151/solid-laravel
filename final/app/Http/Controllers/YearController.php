<?php

namespace App\Http\Controllers;

use App\Services\YearService;
use Illuminate\Database\Eloquent\Collection;

class YearController extends Controller
{
    protected $yearService;

    public function __construct(YearService $yearService)
    {
        $this->yearService = $yearService;
    }

    public function index(): Collection
    {
        return $this->yearService->getAllYears();
    }
}
