<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function getAll(
        ?string $search,
        ?string $limit,
        bool $execute
    ) {
        $query = User::where(function ($query) use ($search) {
            if ($search) {
                $query->search($search);
            }
        });

        if ($limit) {
            $query->limit((int) $limit);
        }

        if ($execute) {
            return $query->get();
        }

        return $query;

    }

    public function getAllPaginated(
        ?string $search,
        ?int $rowPerPage,
    ) {
        // Implementation of the getAllPaginated method
        $query = $this->getAll(
            $search, 
            $rowPerPage, 
            false
        );
        return $query->paginate($rowPerPage);
    }
}