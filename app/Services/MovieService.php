<?php

namespace App\Services;

use App\Repositories\MovieRepository;

class MovieService
{
    protected $repository;

    public function __construct(MovieRepository $repository)
    {
        $this->repository = $repository;
    }

    public function listMovies()
    {
        return $this->repository->getAll();
    }

    public function findMovie($id)
    {
        return $this->repository->find($id);
    }

    public function createMovie(array $data)
    {
        info('service');
        return $this->repository->create($data);
    }

    public function updateMovie($id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function deleteMovie($id)
    {
        return $this->repository->delete($id);
    }
}
