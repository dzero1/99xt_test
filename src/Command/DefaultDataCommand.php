<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\XtBook;
use App\Entity\XtCategory;
use App\Entity\XtCoupon;

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

        $doctrine = $this->container->get('doctrine');

        $rowId = -1;
        if (($fp = fopen("books.csv", "r")) !== FALSE) {
            while (($row = fgetcsv($fp)) !== FALSE) {
                //var_dump($row);
                $rowId++;
                if ($rowId == 0) continue;

                echo "Inserting Book => $rowId - $row[0]\n";

                // Create a category if not exist
                $repository = $doctrine->getRepository(XtCategory::class);
                $cat = $repository->findOneBy(['name' => $row[2]]);
                if (!$cat){
                    $cat = new XtCategory();
                    $cat->setName($row[2]);
                    $cat->setCreatedAt(new \DateTime());
                    $this->entityManager->persist($cat);
                    $this->entityManager->flush();
                }

                // Create a book
                $book = new XtBook();
                $book->setName($row[0]);
                $book->setPrice(floatval($row[1]));
                $book->setCover("covers/cover$rowId.jpg");
                $book->setCreatedAt(new \DateTime());
                $book->setDescription("Author: $row[3]<br>Genre: $row[4]<br>Publisher: $row[5]<br>");
                $book->addCategory($cat);
                $this->entityManager->persist($book);
            }
            fclose($fp);
        }

        for ($i=0; $i < 5; $i++) { 
            $code = $this->generateRandomString();
            echo "Coupon codes => $code\n";

            $coupon = new XtCoupon();
            $coupon->setCode($code);
            $coupon->setDiscount(15);
            $coupon->setCreatedAt(new \DateTime());
            $this->entityManager->persist($coupon);
        }
        
        $this->entityManager->flush();
        return 0;
    }

    private function generateRandomString($length = 5) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}