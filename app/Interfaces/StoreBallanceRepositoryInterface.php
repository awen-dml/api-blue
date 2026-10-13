<?php

namespace App\Interfaces;

interface StoreBallanceRepositoryInterface
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

    // public function getById(
    //     string $id
    // );
}