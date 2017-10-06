<?php

namespace MinimalOriginal\NewsBundle;

use MinimalOriginal\CoreBundle\Modules\AbstractManageableModule;

use MinimalOriginal\NewsBundle\Form\NewsType;
use MinimalOriginal\NewsBundle\Entity\News;

class MinimalModule extends AbstractManageableModule{

  /**
   * {@inheritdoc}
   */
  public function init(){
    $this->informations->set('name', 'news');
    $this->informations->set('title', 'Articles');
    $this->informations->set('description', "Créez ou modifiez les articles de votre site.");
    $this->informations->set('icon', "ion-ios-paper-outline");
    return $this;
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
