<?php

namespace App\Interfaces;

interface TimingRepositoryInterface
{
    public function all();

    public function update(int $id,array $data);

    public function create(array $data);

    public function find($id);

    public function delete($id);
}
