<?php

namespace App\Interfaces;

interface TimingRepositoryInterface
{
    public function all();
    public function update(array $data);
    
    public function create(array $data);
    public function find($id);
    public function delete($id);
}