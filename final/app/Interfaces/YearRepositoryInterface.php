<?php

namespace App\Interfaces;

use App\Models\Year;
use Illuminate\Database\Eloquent\Collection;

interface YearRepositoryInterface
{  
    public function find($id): Year;
    public function create(array $data):Year;
    public function delete(int $id):bool;
    public function all(): Collection;  
}