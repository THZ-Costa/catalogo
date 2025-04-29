<?php

namespace App\Services;

use App\Repositories\TagRepository;

class TagService
{
    protected $repository;

    public function __construct(TagRepository $repository)
    {
        $this->repository = $repository;
    }

    public function listTags()
    {
        return $this->repository->getAll();
    }

    public function findTag($id)
    {
        return $this->repository->find($id);
    }

    public function createTag(array $data)
    {
        return $this->repository->create($data);
    }

    public function updateTag($id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function deleteTag($id)
    {
        return $this->repository->delete($id);
    }
}
