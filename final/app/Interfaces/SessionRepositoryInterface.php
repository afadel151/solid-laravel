<?php

namespace App\Interfaces;

use App\Models\LearningSession;

interface SessionRepositoryInterface {
    public function all();
    public function find(int $id);
    public function create(array $data);
    public function update(int $id, array $data);
    public function edit(LearningSession $learningSession,array $data);
    public function delete(int $id);
    public function getByAttribute(string $attribute, $value);
}
