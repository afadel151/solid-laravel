<?php

namespace App\Services;

use App\Interfaces\SectionRepositoryInterface;

class SectionService
{
    protected $sectionRepository;

    public function __construct(SectionRepositoryInterface $sectionRepository)
    {
        $this->sectionRepository = $sectionRepository;
    }

    public function getAll()
    {
        return $this->sectionRepository->all();
    }

    public function getById($id)
    {
        return $this->sectionRepository->find($id);
    }

    public function store(array $data)
    {
        $section = $this->sectionRepository->create($data);

        return $section;
    }

    public function update(array $data)
    {
        return $this->sectionRepository->update($data);
    }

    public function delete($id)
    {
        $deleted = $this->sectionRepository->delete($id);

        return $deleted;
    }
}
