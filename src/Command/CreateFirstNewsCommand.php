<?php

namespace MinimalOriginal\NewsBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use MinimalOriginal\NewsBundle\Entity\News;

class CreateFirstNewsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
      $this
          ->setName('minimal_news:create-first-news')
          ->setDescription('Creates the first news of the site.')
          ->setHelp('This command allows you to create a first news for the website.')
      ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'First news creator',
            '============',
            '',
        ]);
        $doctrine = $this->getContainer()->get('doctrine');
        $em = $doctrine->getManager();
        $news = new News();
        $news->setTitle("Premier article");
        $news->setContent("Ceci est le premier article de mon site.");
        $news->setPublished(new \DateTime());

        $em->persist($news);
        $em->flush();

        $output->writeln('The first news has been successfully generated!');


    }
}
