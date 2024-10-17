<?php

namespace App\Contracts;

interface BaseRepositoryInterface
{
    public function getAll();
    public function storeData(array $resource);
    public function findById(int $id);
    public function findBy(string $field, $value);
    public function updateData(int $id,array $resource);
    public function deleteData(int $id);
}
