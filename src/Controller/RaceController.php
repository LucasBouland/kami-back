<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\RaceRepository;

class RaceController
{
    private $raceRepository;

    public function __construct(RaceRepository $raceRepository) 
    {
        $this->raceRepository = $raceRepository;
    }
    /**
     * @Route("/race/", name="add_race", methods={"POST"})
     */
    public function add(Request $request) : JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        // TODO, racial bonus + attributes at the same time.
        $name = $data['name'];


        if (empty($name)) {
            throw new NotFoundHttpException('Missing required parameters');
        }

        $newRace = $this->raceRepository->saveRace($name, $type, $timing, $reach,$target,$cost,$effect,$reference);
        if (!$newRace) {
            //TODO on failure
            //return new JsonResponse(['error' => $newRace], Response::HTTP_CONFLICT);
        }
        return new JsonResponse(['race' => $newRace], Response::HTTP_CREATED);
   }

    /**
     * @Route("/race/{id}", name="get_race", methods={"GET"})
     */
   public function get($id) : JsonResponse
   {
        $race = $this->raceRepository->findOneBy(['id' => $id]);
        return new JsonResponse($race->toArray(), Response::HTTP_OK);
   }
   /**
    * @Route("/race/", name="get_all_races", methods={"GET"})
    */
   public function getAll() : JsonResponse
   {
       $races = $this->raceRepository->findAll();
       $data = [];
       $test;
       foreach($races as $race) 
       {
           $data[] = $race->toArray();
       }
       return new JsonResponse($data, Response::HTTP_OK);
   }
    /**
     * @Route("race/{id}", name="update_race", methods={"PUT"})
     */
   public function update(Request $request, $id) : JsonResponse 
   {
        //TODO patch 
        $race = $this->raceRepository->findOneBu(['id' => $id]);
        $data = json_decode($request->getContent(), true);

        empty($data['name']) ? true : $race->setName($data['name']);
        empty($data['type']) ? true : $race->Type($data['type']);
        empty($data['timing']) ? true : $race->setTiming($data['timing']);
        empty($data['reach']) ? true : $race->setReach($data['reach']);
        empty($data['target']) ? true : $race->setTarget($data['target']);
        empty($data['cost']) ? true : $race->setCost($data['cost']);
        empty($data['effect']) ? true : $race->setEffect($data['effect']);
        empty($data['reference']) ? true : $race->setReference($data['reference']);

        $updatedRace = $this->raceRepository->update($data);

        return new JsonResponse($updatedRace, Response::HTTP_OK);
   }
   /**
    * @Route("/race/{id}", name="delete_race", methods={"DELETE"})
    */
   public function delete($id) : JsonResponse
   {
        $race = $this->raceRepository->findOneBy(['id'=> $id]);
        $this->raceRepository->deleteRace($race);
        return new JsonResponse(['race' => $race], Response::HTTP_OK);
   }
}
