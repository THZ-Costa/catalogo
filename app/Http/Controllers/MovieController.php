<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Services\MovieService;
use App\Services\ResponseService;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Exception;

class MovieController extends Controller
{
    protected $service;
    protected $response;

    public function __construct(MovieService $service, ResponseService $response)
    {
        $this->service = $service;
        $this->response = $response;
    }

    /**
     * Listar filmes.
     */
    public function index()
    {
        try {
            $movies = $this->service->listMovies();
            return $this->response->success($movies, Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->response->error('Erro ao listar filmes.', Response::HTTP_INTERNAL_SERVER_ERROR, $e->getMessage());
        }
    }

    /**
     * Criar novo filme.
     */
    public function store(StoreMovieRequest $request)
    {
        try {
            $movie = $this->service->createMovie($request->validated());
            return $this->response->success($movie, Response::HTTP_CREATED);
        } catch (Exception $e) {
            return $this->response->error('Erro ao criar filme.', Response::HTTP_INTERNAL_SERVER_ERROR, $e->getMessage());
        }
    }

    /**
     * Exibir filme específico.
     */
    public function show($id)
    {
        try {
            $movie = $this->service->findMovie($id);
            if (!$movie) {
                return $this->response->error('Filme não encontrado.', Response::HTTP_NOT_FOUND);
            }
            return $this->response->success($movie);
        } catch (Exception $e) {
            return $this->response->error('Erro ao buscar filme.', Response::HTTP_INTERNAL_SERVER_ERROR, $e->getMessage());
        }
    }

    /**
     * Atualizar filme.
     */
    public function update(UpdateMovieRequest $request, $id)
    {
        try {
            $updated = $this->service->updateMovie($id, $request->validated());
            if (!$updated) {
                return $this->response->error('Filme não encontrado.', Response::HTTP_NOT_FOUND);
            }
            return $this->response->success($updated);
        } catch (Exception $e) {
            return $this->response->error('Erro ao atualizar filme.', Response::HTTP_INTERNAL_SERVER_ERROR, $e->getMessage());
        }
    }

    /**
     * Remover filme (soft delete).
     */
    public function destroy($id)
    {
        try {
            $deleted = $this->service->deleteMovie($id);
            if (!$deleted) {
                return $this->response->error('Filme não encontrado.', Response::HTTP_NOT_FOUND);
            }
            return $this->response->success(['message' => 'Filme removido com sucesso.']);
        } catch (Exception $e) {
            return $this->response->error('Erro ao remover filme.', Response::HTTP_INTERNAL_SERVER_ERROR, $e->getMessage());
        }
    }
}
