<?php

namespace App\Finance\Abstracts;

use App\Finance\Interfaces\ServiceInterface;

class AbstractService implements ServiceInterface
{
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * Lists all data from a given table
     *
     * @return void
     */
    public function getAll()
    {
        return $this->repository->all();
    }

    /**
     * List an item from a given table
     *
     * @param integer $id
     * @return void
     */
    public function find(int $id)
    {
        return $this->repository->find($id);
    }

    public function beforeSave(array $data)
    {
        return $data;
    }

  /**
     * @param array $data
     * @return mixed
     */
    public function save(array $data)
    {
        $data = $this->beforeSave($data);
        
        if (!$data instanceof \Exception) {
            $entity = $this->repository->create($data);
        }

        $this->afterSave($entity);

        return $entity;
    }

    /**
     * Changes certain information of a selected item
     *
     * @param array $data
     * @param integer $id
     * @return void
     */
    public function update(array $data, int $id)
    {
        return $this->repository->update($data, $id);
    }

    /**
     * Deletes certain information from a selected item
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }

    public function afterSave($entity)
    {
        return $entity;
    }
    
}
