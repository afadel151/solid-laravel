<?php

namespace App\Interfaces;

interface SectionRepositoryInterface
{
    public function all();

    public function find($id);

    public function create(array $data);

    public function update(int $id, array $data);

    public function delete($id);
}
