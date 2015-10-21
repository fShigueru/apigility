<?php
/**
 * Created by PhpStorm.
 * User: Webelven01
 * Date: 21/10/2015
 * Time: 13:46
 */

namespace CodeOrders\V1\Rest\Users;


use Zend\Stdlib\Hydrator\HydratorInterface;

class UsersMapper extends UsersEntity implements HydratorInterface
{



    /**
     * Extract values from an object
     *
     * @param  object $object
     * @return array
     */
    public function extract($object)
    {
        return [
            'id'        => $object->id,
            'username'  => $object->username,
            'password'  => $object->password,
            'firstName' => $this->firstName,
            'lastName'  => $this->lastName,
            'role'      => $this->role
        ];
    }

    /**
     * Hydrate $object with the provided $data.
     *
     * @param  array $data
     * @param  object $object
     * @return object
     */
    public function hydrate(array $data, $object)
    {
        $object->id = $data['id'];
        $object->username = $data['username'];
        $object->password = $data['password'];
        $object->firstName = $data['firstName'];
        $object->lastName = $data['lastName'];
        $object->role = $data['role'];
        return $object;
    }
}