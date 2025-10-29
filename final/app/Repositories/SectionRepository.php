<?php

namespace App\Repositories;

use App\Interfaces\SectionRepositoryInterface;
use App\Models\Section;

class SectionRepository implements SectionRepositoryInterface
{
    public function all()
    {
        return Section::all();
    }

    public function find($id)
    {
        return Section::find($id);
    }

    public function create(array $data)
    {
        return Section::create($data);
    }

    public function update(array $data)
    {
        $section = Section::find($data['id']);
        if ($section) {
            $section->update($data);
        }

        return $section;
    }

    public function delete($id)
    {
        return Section::find($id)->delete();
    }
}
