<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use App\Services\ResponseService;
use App\Services\TagService;
use Exception;
use Illuminate\Http\Response;

class TagController extends Controller
{
    protected $service;
    protected $response;

    public function __construct(TagService $service, ResponseService $response)
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
            $tags = $this->service->listTags();
            return $this->response->success($tags, Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->response->error('Erro ao listar Tag.', Response::HTTP_INTERNAL_SERVER_ERROR, $e->getMessage());
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
     * Criar nova tag.
     */
    public function store(StoreTagRequest $request)
    {
        try {
            $tag = $this->service->createTag($request->validated());
            return $this->response->success($tag, Response::HTTP_CREATED);
        } catch (Exception $e) {
            return $this->response->error('Erro ao cadastrar Tag.', Response::HTTP_INTERNAL_SERVER_ERROR, $e->getMessage());
        }
    }

    /**
     * Exibir tag específica.
     */
    public function show(Tag $tag)
    {
        try {
            $tag = $this->service->findTag($tag->id);

            if (!$tag) {
                return $this->response->error('Tag não encontrada.', Response::HTTP_NOT_FOUND);
            }
            return $this->response->success($tag);
        } catch (Exception $e) {
            return $this->response->error('Erro ao buscar artista.', Response::HTTP_INTERNAL_SERVER_ERROR, $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Atualizar tag.
     */
    public function update(UpdateTagRequest $request, $id)
    {
        try {
            $updated = $this->service->updateTag($id, $request->validated());
            if (!$updated) {
                return $this->response->error('Tag não encontrada.', Response::HTTP_NOT_FOUND);
            }
            return $this->response->success($updated);
        } catch (Exception $e) {
            return $this->response->error('Erro ao atualizar tag.', Response::HTTP_INTERNAL_SERVER_ERROR, $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        //
    }
}
