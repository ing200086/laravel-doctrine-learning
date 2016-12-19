<?php

namespace App\Http\Controllers\Api\v1;

use \Doctrine\ORM\EntityManagerInterface as EntityManager;

use \App\Transformers\UserTransformer as Transformer;
use \App\Entities\User;

class UserController extends \App\Http\Controllers\Controller
{
    protected $repository;
    protected $transformer;

    public function __construct(EntityManager $entityManager, Transformer $transformer)
    {
        $this->repository = $entityManager->getRepository(User::class);
        $this->transformer = $transformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->repository->findAll();

        // dd($users);

        return response()->json(
            fractal()->collection($users)
            	->transformWith($this->transformer)
            	->toArray(), 200);
    }
}
