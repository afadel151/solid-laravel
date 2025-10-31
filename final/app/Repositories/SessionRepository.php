<?php

namespace App\Repositories;

use App\Interfaces\SessionRepositoryInterface;
use App\Models\LearningSession;

class SessionRepository implements SessionRepositoryInterface
{
    public function all()
    {
        return LearningSession::all();
    }

    public function find($id)
    {
        return LearningSession::find($id);
    }

    public function getByAttributes(array $attributes)
    {
        $query = LearningSession::query();
        foreach ($attributes as $key => $value) {
            $query->where($key, $value);
        }
        return $query->get();
    }

    public function edit(LearningSession $learningSession, array $data)
    {
        $learningSession->fill($data)->save();

        return $learningSession;
    }

    public function create(array $data)
    {
        return LearningSession::create($data);
    }

    public function update(int $id, array $data)
    {
        $session = LearningSession::find($id);
        if ($session) {
            $session->update($data);

            return $session;
        } else {
            return null;
        }
    }

    public function delete(int $id)
    {
        $session = LearningSession::find($id);
        if ($session) {
            return $session->delete();
        } else {
            return false;
        }
    }
}
