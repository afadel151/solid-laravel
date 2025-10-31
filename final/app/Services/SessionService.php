<?php

namespace App\Services;

use App\Interfaces\SessionRepositoryInterface;

class SessionService  {
    protected $sessionRepository;
    public function __construct(SessionRepositoryInterface $sessionRepository) {
        $this->sessionRepository = $sessionRepository;
    }
    public function getAll()
    {
        return $this->sessionRepository->all();
    }
    public function getById($id) {
        return $this->sessionRepository->find($id);
    }
    public function create(array $data) 
    {
        return  $this->sessionRepository->create($data);
    }
    public function update(int $id, array $data)
    {
        return $this->sessionRepository->update($id, $data);
    }
    public function destroy(int $id)
    {
        return $this->sessionRepository->delete($id);
    }
    public function getByAttribute(string $attribute, $value)
    {
        return $this->sessionRepository->getByAttribute($attribute, $value);
    }
}
