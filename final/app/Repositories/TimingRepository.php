<?php

namespace App\Repositories;

use App\Interfaces\TimingRepositoryInterface;
use App\Models\Timing;

class TimingRepository implements TimingRepositoryInterface
{
    public function all(){
        return Timing::all();
    }
    
    public function find($id){
        return Timing::find($id);
    }

    public function update(array $data){
        Timing::update($data);
    }

    public function create(array $data){
        return Timing::create($data);
    }

    public function delete($id){

        return Timing::find(id: $id)->delete();
    }
    
}