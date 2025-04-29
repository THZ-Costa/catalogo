<?php
namespace App\Repositories;

use App\Models\Star;

class StarRepository
{
    public function getAll()
    {
        return Star::all();
    }

    public function find($id)
    {
        return Star::findOrFail($id);
    }

    public function create(array $data)
    {
        return Star::create($data);
    }

    public function update($id, array $data)
    {
        $star = Star::findOrFail($id);
        $star->update($data);
        return $star;
    }

    public function delete($id)
    {
        $star = Star::findOrFail($id);
        $star->delete();
    }
}
