<?php

namespace App\Repository;

interface EntityRepositoryInterface
{
    public function getAll(): array;

    public function getOneById($id);
}