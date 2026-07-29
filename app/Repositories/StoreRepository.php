<?php

namespace App\Repositories;

use App\Interfaces\StoreRepositoryInterface;
use App\Models\Store;
use Exception;
use Illuminate\Support\Facades\DB;

class StoreRepository implements StoreRepositoryInterface
{
    public function getAll(
        ?string $search,
        ?bool $isVerified,
        ?string $limit,
        bool $execute
    ) {
        $query = Store::where(function ($query) use ($isVerified, $search) {
            if ($search) {
                $query->search($search);
            }

            if ($isVerified !== null) {
                $query->where('is_verified', $isVerified);
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
        ?bool $isVerified,
        ?int $rowPerPage,
    ) {
        // Implementation of the getAllPaginated method
        $query = $this->getAll(
            $search, 
            $isVerified,
            $rowPerPage, 
            false
        );
        return $query->paginate($rowPerPage);
    }

    public function getById(
        string $id
        ) {
            $query = Store::where('id', $id);
            return $query->first();
        } 

    // public function create(
    //         array $data
    //     ) {
    //         DB::beginTransaction();        

    //         try {
    //             $user = new User();
    //             $user->name = $data['name'];
    //             $user->email = $data['email'];
    //             $user->password = bcrypt($data['password']);
    //             $user->save();

    //             DB::commit();

    //             return $user;
    //             } catch (\Exception $e) {
    //                 DB::rollBack();
                    
    //                 throw new Exception($e->getMessage());
    //             }
    //         }

    //         public function update(
    //             string $id,
    //             array $data
    //         ) {
    //             DB::beginTransaction();        

    //             try {
    //                 $user = User::find($id);
    //                 $user->name = $data['name'];
    //                 if (isset($data['password'])) {
    //                     $user->password = bcrypt($data['password']);
    //                 }
    //                 $user->save();

    //                 DB::commit();

    //                 return $user;
    //             } catch (\Exception $e) {
    //                 DB::rollBack();
                    
    //                 throw new Exception($e->getMessage());
    //             }
    //         }   

    // public function delete(
    //             string $id
    //         ) {
    //             DB::beginTransaction();        

    //             try {
    //                 $user = User::find($id);
    //                 $user->delete();

    //                 DB::commit();

    //                 return true;
    //             } catch (\Exception $e) {
    //                 DB::rollBack();
                    
    //                 throw new Exception($e->getMessage());
    //             }
    //         }
}