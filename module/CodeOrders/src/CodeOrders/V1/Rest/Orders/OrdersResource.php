<?php
namespace CodeOrders\V1\Rest\Orders;

use CodeOrders\V1\Rest\Users\UsersRepository;
use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class OrdersResource extends AbstractResourceListener
{

    private $repository;
    private $ordersService;
    private $usersRepository;

    /**
     * OrdersResource constructor.
     * @param $repository
     */
    public function __construct(OrdersRepository $repository, OrdersService $ordersService, UsersRepository $usersRepository)
    {
        $this->repository = $repository;
        $this->ordersService = $ordersService;
        $this->usersRepository = $usersRepository;
    }


    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {

        $user = $this->usersRepository->findByUserName($this->getIdentity()->getRoleId());
        if(!$user){
            return new ApiProblem(405, 'Error processing');
        }
        if($user->getRole() != "salesman"){
            return new ApiProblem(403, 'Esse usuário não tem permissão para criar um novo pedido');
        }

        $result = $this->ordersService->insert($data);

        if ($result == "error") {
            return new ApiProblem(405, 'Error processing order');
        }

        return $result;
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        $user = $this->usersRepository->findByUserName($this->getIdentity()->getRoleId());
        if(!$user){
            return new ApiProblem(405, 'Error processing');
        }
        if($user->getRole() != "admin"){
            return new ApiProblem(403, 'Esse usuário não tem permissão para excluir esse pedido');
        }

        $result = $this->repository->find($id);
        if(!$result){
            return new ApiProblem(404, 'Registro não encontrado');
        }

        return $this->ordersService->delete($id);
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        $user = $this->usersRepository->findByUserName($this->getIdentity()->getRoleId());
        if(!$user){
            return new ApiProblem(405, 'Error processing');
        }
        if($user->getRole() != "salesman"){
            return new ApiProblem(403, 'Esse usuário não tem permissão para criar um novo pedido');
        }

        $orderOfUser = $this->repository->isOrderOfUser($id,$user->getId());

        if(!$orderOfUser){
            return new ApiProblem(403, 'Esse usuário não tem permissão para ver esse pedido');
        }

        return $this->repository->find($id);
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = array())
    {
        $user = $this->usersRepository->findByUserName($this->getIdentity()->getRoleId());
        if(!$user){
            return new ApiProblem(405, 'Error processing');
        }
        if($user->getRole() != "admin"){
            return new ApiProblem(403, 'Esse usuário não tem permissão para listar os pedido');
        }

        return $this->repository->findAll();
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for individual resources');
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    /**
     * Update a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id,$data)
    {
        $user = $this->usersRepository->findByUserName($this->getIdentity()->getRoleId());
        if(!$user){
            return new ApiProblem(405, 'Error processing');
        }
        if($user->getRole() != "admin"){
            return new ApiProblem(403, 'Esse usuário não tem permissão para atualizar esse pedido');
        }

        $result = $this->repository->find($id);
        if(!$result){
            return new ApiProblem(404, 'Registro não encontrado');
        }

        $resultUpdate = $this->ordersService->update($id,$data);
        if ($resultUpdate == "error") {
            return new ApiProblem(405, 'Error processing order');
        }

        return $resultUpdate;
    }
}
