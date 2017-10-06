<?php

namespace MinimalOriginal\NewsBundle;

use MinimalOriginal\CoreBundle\Modules\ModuleInterface;

use MinimalOriginal\NewsBundle\Form\NewsType;
use MinimalOriginal\NewsBundle\Entity\News;

use MinimalOriginal\CoreBundle\Entity\EntityRoutedInterface;

class MinimalModule implements ModuleInterface{

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

}
