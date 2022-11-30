<?php

namespace App\Finance\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function getModel(): Model;

    public function all();

    public function find(int $id);

    public function create(array $data);

    public function update(int $id, array $data);

    public function destroy(int $id);
}

