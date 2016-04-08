<?php

/**
 * Created by PhpStorm.
 * User: David
 * Date: 07/04/2016
 * Time: 22:25
 */
class Home extends CI_Controller
{
    public function index()
    {
        //print_r($this->doctrine->em);
    }
    /**
     * @desc Crea un usuario con doctrine
     */
    public function create()
    {
        //creamos una instancia de la entidad User
        $user = new Entities\User;

        //establecemos las propiedades a través de los setters
        $user->setUsername("david luis");
        $user->setEmail("davidluis@gmail.com");
        $user->setPassword("misecreto");

        //guardamos la entidad en la tabla users
        $this->doctrine->em->persist($user);
        $this->doctrine->em->flush();
        echo "Se ha creado el usuario con ID " . $user->getId() . "\n";
    }
    /**
     * @desc Obtiene y lista a todos los usuarios
     */
    public function listar()
    {
        //obtenemos y mostramos todos los usuarios con el metodo findAll
        //disponible en todo el repositorio
        $data['users'] = $this->doctrine->em->getRepository("Entities\\User")->findAll();
        $this->load->view('welcome_message',$data);
    }
    /**
     * @param $id
     * @desc Obtiene un usuario por su id
     */
    public function find($id)
    {
        //obtiene un usuario con el metodo find de otra forma
        $data['user'] = $this->doctrine->em->find("Entities\\User", $id);
        $this->load->view("welcome_message",$data);
    }
    /**
     * @param $id
     * @param $username
     * @desc Actualiza un usuario
     */
    public function update($id, $usermame)
    {
        //obtenemos al usuario
        $user = $this->doctrine->em->getRepository("Entities\\User")->find($id);
        if ( $user === null )
        {
            echo "No existe el usuario ";
        }else
            {
                //setemos su nombre y lo actualizamos
                $user->setUsername($usermame);
                $this->doctrine->em->flush();

                print_r($user);
            }
    }
    /**
     * @param $id
     * @desc Obtenemos un usuario por su id con el metodo findOneBy por su id y si existe lo eliminamos
     */
    public function remove($id)
    {
        $user = $this->doctrine->em->getRepository("Entities\\User")->findOneBy(["id" => $id]);
        if( $user === null )
        {
            echo "Npo existe el usuario ";
            exit();
        }else
            {
                $this->doctrine->em->remove($user);
                $this->doctrine->em->flush();
            }
    }
}