<?php

namespace App\Controller;

use App\Entity\Semillas;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\DecoderInterface;
use Doctrine\Persistence\ManagerRegistry;
use Exception; /* Importo para crear un catch en cada metodo */

class SemillasController extends AbstractController
{
    public function __construct(
        DecoderInterface $decoderInterface,
        ManagerRegistry $registry
    ){
        $this->decoderInterface = $decoderInterface; /* Implemento para traer el formato del request */
        $this->entityManager = $registry->getManager(); /* Implemento para manejar la persistencia de los parametros */
        $this->repository = $registry->getRepository(Semillas::class); /* Busco mi repo desde aca */

    }
    /**
     * @Route("/semillas", name="app_semillas")
     */
    public function index(): Response
    {
        return $this->json([
            'controller_name' => 'SemillasController',
            'mesage' => 'Hola controlador',
        ]);
    }

    /**
     * @Route("/semillas/create", name="create", methods={"POST"})
     */
    public function create(Request $request): Response
    {
        $semillas = new Semillas();
        $params = $this->decoderInterface->decode($request->getContent(), 'json');
        
        $semillas->setNombre($params['nombre']);
        $semillas->setCodigo($params['codigo']);
        $semillas->setDescripcion($params['descripcion']);
        $semillas->setEspecie($params['especie']);
        $semillas->setOrigen($params['origen']);
        $semillas->setProveedor($params['proveedor']);
        $semillas->setBancoDeSemillas($params['banco_de_semillas']);
        $semillas->setLimiteMinimoThc($params['limite_minimo_thc']);
        $semillas->setLimiteMaximoThc($params['limite_maximo_thc']);
        $semillas->setLimiteMinimoCbd($params['limite_minimo_cbd']);
        $semillas->setLimiteMaximoCbd($params['limite_maximo_cbd']);


        try {

            $this->entityManager->persist($semillas);
            $this->entityManager->flush();

            return $this->json('Inserted Semillas Create Successfully');

        }catch(Exception $e){

            $message = 'Transaction Error Semillas Create';
            return $this->helper->handleException($e, $message);

        }
    }

    /**
     * @Route("/semillas/update/{id}", name="update", methods={"PUT"})
     */
    public function update(Request $request, int $id): Response
    {
        $semillas = $this->repository->findOneById($id); /* Encuentro el registro que rquiero por el id */
        $params = $this->decoderInterface->decode($request->getContent(), 'json');
        
        $semillas->setNombre($params['nombre']);
        $semillas->setCodigo($params['codigo']);
        $semillas->setDescripcion($params['descripcion']);
        $semillas->setEspecie($params['especie']);
        $semillas->setOrigen($params['origen']);
        $semillas->setProveedor($params['proveedor']);
        $semillas->setBancoDeSemillas($params['banco_de_semillas']);
        $semillas->setLimiteMinimoThc($params['limite_minimo_thc']);
        $semillas->setLimiteMaximoThc($params['limite_maximo_thc']);
        $semillas->setLimiteMinimoCbd($params['limite_minimo_cbd']);
        $semillas->setLimiteMaximoCbd($params['limite_maximo_cbd']);


        try {

            $this->entityManager->persist($semillas);
            $this->entityManager->flush();

            return $this->json('Inserted Semillas Update Successfully');

        }catch(Exception $e){

            $message = 'Transaction Error Semillas Update';
            return $this->helper->handleException($e, $message);

        }
    }

    /**
     * @Route("/semillas/delete/{id}", name="delete", methods={"DELETE"})
     */
    public function delete(int $id): Response
    {
        $semillas = $this->repository->findOneById($id); /* Encuentro el registro que rquiero por el id */

        try {

            $this->entityManager->remove($semillas);
            $this->entityManager->flush();

            return $this->json('Deleted Semillas Successfully');

        }catch(Exception $e){

            $message = 'Transaction Error Semillas Deleted';
            return $this->helper->handleException($e, $message);

        }
    }

    /**
     * @Route("/semillas/read", name="read", methods={"GET"})
     */
    public function read(): Response
    {
        $semillas = $this->repository->findAll(); /* Encuentro el registro que rquiero por el id */

        try {
            foreach ($semillas as $allSemillas){
                $response[] = $allSemillas;
            }
            return $this->json(
                $response
            );

        }catch(Exception $e){

            $message = 'Transaction Error Semillas Deleted';
            return $this->helper->handleException($e, $message);

        }
    }
}
