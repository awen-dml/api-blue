<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    public function getAll(
        ?string $search,
        ?string $limit,
        bool $execute
    );

    public function getAllPaginated(
        ?string $search,
        ?int $rowPerPage,
    ); 
}