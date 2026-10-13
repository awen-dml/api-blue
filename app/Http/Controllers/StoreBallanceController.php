<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Resources\PaginateResource;
use App\Http\Resources\StoreBallanceResource;
use App\Interfaces\StoreBallanceRepositoryInterface;
use Illuminate\Http\Request;

class StoreBallanceController extends Controller
{
    private StoreBallanceRepositoryInterface $storeBallanceRepository;

    public function __construct(StoreBallanceRepositoryInterface $storeBallanceRepository) {
        $this->storeBallanceRepository = $storeBallanceRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $storeBallances = $this->storeBallanceRepository->getAll(
                $request->search,
                $request->limit,
                true
                );

                return ResponseHelper::jsonResponse(true, 'Data Dompet Toko berhasil diambil', StoreBallanceResource::collection($storeBallances), 200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, 'Terjadi kesalahan saat mengambil data dompet toko', null, 500);
        }
    }


    public function getAllPaginated(Request $request)
    {
        $request = $request->validate([
            'search' => 'nullable|string',
            'rowPerPage' => 'required|integer',
        ]);
        try {
            $storeBallances = $this->storeBallanceRepository->getAllPaginated(
                $request['->search'] ?? null,
                $request['->rowPerPage']
            );

            return ResponseHelper::jsonResponse(true, 'Data Dompet Toko berhasil diambil', PaginateResource::make($storeBallances, StoreBallanceResource::class), 200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, 'Terjadi kesalahan saat mengambil data dompet toko', null, 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
