<?php

namespace MinimalOriginal\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MinimalOriginal\CoreBundle\Repository\QueryFilter;

/**
 * @Route("/news")
 */
class NewsController extends Controller
{
  /**
   * @Route("/", name="news_list")
   *
   * @param QueryFilter $queryFilter
   *
   */
  public function listAction(QueryFilter $queryFilter)
  {
    $repository = $this->getDoctrine()
      ->getRepository('MinimalOriginal\NewsBundle\Entity\News')
      ->setQueryFilter($queryFilter)
      ;

    $data = $repository->findList();

    return $this->render('MinimalNewsBundle:List:item.html.twig', array(
      'data' => $data,
    ));
  }

  /**
   * @Route("/{slug}", name="news_show")
   */
  public function showAction($slug)
  {
    $repository = $this->getDoctrine()->getRepository('MinimalOriginal\NewsBundle\Entity\News');
    $data = $repository->findOneBy(array('slug'=>$slug));
    if( null === $data ){
      throw new NotFoundHttpException("Cet article n'existe pas.");
    }
    return $this->render('MinimalNewsBundle:Show:show.html.twig', array(
      'data' => $data,
    ));
  }
}
