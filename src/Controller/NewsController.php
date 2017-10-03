<?php

namespace MinimalOriginal\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MinimalOriginal\CoreBundle\Routing\Annotation\Route;
use MinimalOriginal\CoreBundle\Repository\QueryFilter;

/**
 * @Route("/news")
 */
class NewsController extends Controller
{
  /**
   * @Route("/", name="minimal_news_list", title="Liste de news")
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

    // Définit les données SEO
    $this->initSeo()->setDescription("Retrouvez l'ensemble de notre actualité.");

    return $this->render('MinimalNewsBundle:List:item.html.twig', array(
      'data' => $data,
    ));
  }

  /**
   * @Route("/{slug}", name="minimal_news_show")
   */
  public function showAction($slug)
  {
    $repository = $this->getDoctrine()->getRepository('MinimalOriginal\NewsBundle\Entity\News');
    $data = $repository->findOneBy(array('slug'=>$slug));
    if( null === $data ){
      throw new NotFoundHttpException("Cet article n'existe pas.");
    }

    // Définit les données SEO
    $this->initSeo()
    ->addTitle($data->getTitle())
    ->setDescription($data->getContent());


    return $this->render('MinimalNewsBundle:Show:show.html.twig', array(
      'data' => $data,
    ));
  }

  /**
   * Initialise les données SEO
   */
  protected function initSeo(){
    $seo = $this->container->get('minimal_seo');
    return $seo->addTitle("Actualités");
  }
}
