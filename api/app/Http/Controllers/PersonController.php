<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Transformers\PersonTransformer;
use App\Repositories\Contracts\PersonRepository;

use Illuminate\Http\Request;

class PersonController extends CachingController
{
    /**
     * Constructor
     *
     * @param PersonRepository $persons
     * @param PersonTransformer $transformer
     */
    public function __construct(PersonRepository $repository, PersonTransformer $transformer)
    {
        $this->repository = $repository;
        $this->resourceType = $this->repository->resourceType();
        parent::__construct($transformer);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('page')) {
            if ($errors = $this->validate($request, ['page' => 'integer'])) {
                return $this->sendInvalidFieldResponse($errors);
            }
            return $this->respondWithCollection($this->repository->paginate($request->page));
        }
        return $this->respondWithCollection($this->repository->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($errors = $this->validate($request, [
            'name'          => 'required|max:100',
            'birthdate'     => 'required|date',
            'timezone'      => 'timezone',
        ])) {
            return $this->sendInvalidFieldResponse($errors);
        }

        $person = $this->repository->save($request->all());

        if (!$person instanceof Person) {
            return $this->sendCustomResponse(500, 'Error occurred on creating Person');
        }

        return $this->setStatusCode(201)->respondWithItem($person);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $person = $this->repository->find($id);

        if (!$person instanceof Person) {
            return $this->sendNotFoundResponse("The person with id {$id} doesn't exist");
        }

        return $this->respondWithItem($person);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($errors = $this->validate($request, [
            'name'          => 'required|max:100',
            'birthdate'     => 'required|date',
            'timezone'      => 'timezone',
        ])) {
            return $this->sendInvalidFieldResponse($errors);
        }

        $person = $this->repository->find($id);

        if (!$person instanceof Person) {
            return $this->sendNotFoundResponse("The person with id {$id} doesn't exist");
        }

        // Authorization
        $this->authorize('update', $person);

        $person = $this->repository->update($person, $request->all());

        return $this->respondWithItem($person);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $person = $this->repository->find($id);

        if (!$person instanceof Person) {
            return $this->sendNotFoundResponse("The person with id {$id} doesn't exist");
        }

        // Authorization
        $this->authorize('destroy', $person);

        $this->repository->delete($person);

        return response()->json(null, 204);
    }

}
