<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TalentRepository;

class TalentController
{
    private $talentRepository;

    public function __construct(TalentRepository $talentRepository) 
    {
        $this->talentRepository = $talentRepository;
    }
    /**
     * @Route("/talent/", name="add_talent", methods={"POST"})
     */
    public function add(Request $request) : JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        // TODO, class talent?^
        $name = $data['name'];
        $type = $data['type'];
        $timing = $data['timing'];
        $reach = $data['reach'];
        $target = $data['target'];
        $cost = $data['cost'];
        $effect = $data['effect'];
        $reference = $data['reference'];

        if (empty($name) || empty($type) || empty($timing) || empty($reach) || empty($target) || empty($cost) || empty($effect) || empty($reference)) {
            throw new NotFoundHttpException('Missing required parameters');
        }

        $newTalent = $this->talentRepository->saveTalent($name, $type, $timing, $reach,$target,$cost,$effect,$reference);
        if (!$newTalent) {
            //TODO on failure
            //return new JsonResponse(['error' => $newTalent], Response::HTTP_CONFLICT);
        }
        return new JsonResponse(['talent' => $newTalent], Response::HTTP_CREATED);
   }

    /**
     * @Route("/talent/{id}", name="get_talent", methods={"GET"})
     */
   public function get($id) : JsonResponse
   {
        $talent = $this->talentRepository->findOneBy(['id' => $id]);
        return new JsonResponse($talent->toArray(), Response::HTTP_OK);
   }
   /**
    * @Route("/talent/", name="get_all_talents", methods={"GET"})
    */
   public function getAll() : JsonResponse
   {
       $talents = $this->talentRepository->findAll();
       $data = [];
       foreach($talents as $talent) 
       {
           $data[] = $talent->toArray();
       }
       return new JsonResponse($data, Response::HTTP_OK);
   }
    /**
     * @Route("talent/{id}", name="update_talent", methods={"PUT"})
     */
   public function update(Request $request, $id) : JsonResponse 
   {
        //TODO patch 
        $talent = $this->talentRepository->findOneBu(['id' => $id]);
        $data = json_decode($request->getContent(), true);

        empty($data['name']) ? true : $talent->setName($data['name']);
        empty($data['type']) ? true : $talent->Type($data['type']);
        empty($data['timing']) ? true : $talent->setTiming($data['timing']);
        empty($data['reach']) ? true : $talent->setReach($data['reach']);
        empty($data['target']) ? true : $talent->setTarget($data['target']);
        empty($data['cost']) ? true : $talent->setCost($data['cost']);
        empty($data['effect']) ? true : $talent->setEffect($data['effect']);
        empty($data['reference']) ? true : $talent->setReference($data['reference']);

        $updatedTalent = $this->talentRepository->update($data);

        return new JsonResponse($updatedTalent->toArray(), Response::HTTP_OK);
   }
   /**
    * @Route("/talent/{id}", name="delete_talent", methods={"DELETE"})
    */
   public function delete($id) : JsonResponse
   {
        $talent = $this->talentRepository->findOneBy(['id'=> $id]);
        $this->talentRepository->deleteTalent($talent);
        return new JsonResponse(['talent' => $talent], Response::HTTP_OK);
   }
}
