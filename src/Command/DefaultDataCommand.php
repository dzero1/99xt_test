<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\XtBook;
use App\Entity\XtCategory;
use App\Entity\XtBookCategory;

class DefaultDataCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:default-data';

    private $container;
    private $entityManager;
    public function __construct(ContainerInterface $container, EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->container = $container;
        $this->entityManager = $entityManager;
    }

    protected function configure()
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $rowId = -1;
        if (($fp = fopen("books.csv", "r")) !== FALSE) {
            while (($row = fgetcsv($fp)) !== FALSE) {
                //var_dump($row);
                $rowId++;
                if ($rowId == 0) continue;

                echo "Inserting Book => $rowId - $row[0]\n";

                // Create a book
                $book = new XtBook();
                $book->setName($row[0]);
                $book->setPrice(floatval($row[1]));
                $book->setCover("$rowId.jpg");
                $book->setCreatedAt(new \DateTime());
                $book->setDescription("Author: $row[3]<br>Genre: $row[4]<br>Publisher: $row[5]<br>");
                $this->entityManager->persist($book);
                echo $this->entityManager->flush();

                // Create a category if not exist
                $repository = $this->container->get('doctrine')->getRepository(XtCategory::class);
                $cat = $repository->findOneBy(['name' => $row[2]]);
                if (!$cat){
                    $cat = new XtCategory();
                    $cat->setName($row[2]);
                    $cat->setCreatedAt(new \DateTime());
                    echo $this->entityManager->persist($cat);
                    echo $this->entityManager->flush();
                }

                // Set book category
                $book_cat = new XtBookCategory();
                $book_cat->setBook($book->getId());
                $book_cat->setCategory($cat->getId());
                echo $this->entityManager->persist($book_cat);
                echo $this->entityManager->flush();

            }
            fclose($fp);
        }
        
        return 0;
    }
}