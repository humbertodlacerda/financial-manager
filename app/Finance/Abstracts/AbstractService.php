<?php

namespace App\Finance\Abstracts;

use App\Finance\Interfaces\ServiceInterface;

class AbstractService implements ServiceInterface
{
    public function getRepository()
    {
        return $this->repository;
    }

    public function getAll()
    {
        return $this->repository->all();
    }

    public function find(int $id)
    {
        return $this->repository->find($id);
    }

    public function save(array $data)
    {
        return $this->repository->create($data);
    }

    public function update(array $data, int $id)
    {
        return $this->repository->update($data, $id);
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }
}
