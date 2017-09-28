<?php

namespace MinimalOriginal\NewsBundle;

use MinimalOriginal\CoreBundle\Modules\ModuleInterface;
use MinimalOriginal\CoreBundle\Modules\ModuleRoutedInterface;

use MinimalOriginal\NewsBundle\Form\NewsType;
use MinimalOriginal\NewsBundle\Entity\News;

use MinimalOriginal\CoreBundle\Entity\EntityRoutedInterface;

class MinimalModule implements ModuleInterface, ModuleRoutedInterface{

  /**
   * {@inheritdoc}
   */
  public function getName(){
    return 'news';
  }

  /**
   * {@inheritdoc}
   */
  public function getTitle(){
    return "Articles";
  }

  /**
   * {@inheritdoc}
   */
  public function getDescription(){
    return "Créez ou modifiez les articles de votre site.";
  }

  /**
   * {@inheritdoc}
   */
  public function getEntityClass(){
    return News::class;
  }

  /**
   * {@inheritdoc}
   */
  public function getFormTypeClass(){
    return NewsType::class;
  }

  /**
   * {@inheritdoc}
   */
  public function getShowRoute(){
    return 'news_show';
  }

  /**
   * {@inheritdoc}
   */
  public function getShowRouteParams(EntityRoutedInterface $entity){
    return array('slug' => $entity->getSlug());
  }

  /**
   * {@inheritdoc}
   */
  public function getShowController(){
    return 'MinimalNewsBundle:News:show';
  }

  /**
   * {@inheritdoc}
   */
  public function getShowControllerParams(EntityRoutedInterface $entity){
    return array('slug' => $entity->getSlug());
  }
}
