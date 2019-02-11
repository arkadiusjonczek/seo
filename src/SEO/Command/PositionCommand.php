<?php

namespace SEO\Command;

use SEO\Google;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

class PositionCommand extends \Symfony\Component\Console\Command\Command
{
    protected function configure()
    {
        $this->setName('position')
             ->setDescription('Show position for keyword and domain.')
             ->addArgument('keyword', InputArgument::REQUIRED, 'The keyword to check.')
             ->addArgument('domain', InputArgument::REQUIRED, 'The domain to check.')
             ->setHelp('This command allows you to search the SEO position for a keyword.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $keyword = $input->getArgument('keyword');
        $domain  = $input->getArgument('domain');

        $searchCriteria = new Google\SearchCriteria($keyword);

        $google = new Google('de', 'de');
        $search = $google->search($searchCriteria);

        $searchResult = $search->getResult();

        try {
            $items = $searchResult->getPosition($domain);
            $output->writeln(print_r($items, true));
        }
        catch (\Exception $exception) {
            $output->writeln('Keinen Eintrag gefunden.');
        }
    }
}