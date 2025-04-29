<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStarRequest;
use App\Http\Requests\UpdateStarRequest;
use App\Models\Star;
use App\Services\ResponseService;
use App\Services\StarService;
use Exception;
use Illuminate\Http\Response;

class StarController extends Controller
{
    protected $service;
    protected $response;

    public function __construct(StarService $service, ResponseService $response)
    {
        $this->service = $service;
        $this->response = $response;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $stars = $this->service->listStars();
            return $this->response->success($stars, Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->response->error('Erro ao listar filmes.', Response::HTTP_INTERNAL_SERVER_ERROR, $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Criar novo ator/atriz.
     */
    public function store(StoreStarRequest $request)
    {
        try {
            $star = $this->service->createStar($request->validated());
            return $this->response->success($star, Response::HTTP_CREATED);
        } catch (Exception $e) {
            return $this->response->error('Erro ao cadastrar artista.', Response::HTTP_INTERNAL_SERVER_ERROR, $e->getMessage());
        }
    }

    /**
     * Exibir ator/atriz específico.
     */
    public function show(Star $star)
    {
        try {
            $star = $this->service->findStar($star->id);
            if (!$star) {
                return $this->response->error('Artista não encontrada.', Response::HTTP_NOT_FOUND);
            }
            return $this->response->success($star);
        } catch (Exception $e) {
            return $this->response->error('Erro ao buscar artista.', Response::HTTP_INTERNAL_SERVER_ERROR, $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Star $star)
    {
        //
    }

    /**
     * Atualizar ator/atriz.
     */
    public function update(UpdateStarRequest $request, $id)
    {
        try {
            $updated = $this->service->updateStar($id, $request->validated());
            if (!$updated) {
                return $this->response->error('Artista não encontrada.', Response::HTTP_NOT_FOUND);
            }
            return $this->response->success($updated);
        } catch (Exception $e) {
            return $this->response->error('Erro ao atualizar artista.', Response::HTTP_INTERNAL_SERVER_ERROR, $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Star $star)
    {
        //
    }
}
