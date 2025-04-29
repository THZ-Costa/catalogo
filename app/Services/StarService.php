<?php

namespace App\Services;

use App\Repositories\StarRepository;

class StarService
{
    protected $repository;

    public function __construct(StarRepository $repository)
    {
        $this->repository = $repository;
    }

    public function listStars()
    {
        return $this->repository->getAll();
    }

    public function findStar($id)
    {
        return $this->repository->find($id);
    }

    public function createStar(array $data)
    {
        return $this->repository->create($data);
    }

    public function updateStar($id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function deleteStar($id)
    {
        return $this->repository->delete($id);
    }
}
