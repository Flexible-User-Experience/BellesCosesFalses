<?php
namespace BellesCosesFalses\MainBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use Flux\PageBundle\Entity\Page;
use Flux\PageBundle\Entity\Translation\PageTranslation;

class Pages implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /// EXPOSICIO
        $page = new Page();
        $page->setCode("001-EXP");
        $page->setTitle("Exposició");
        $page->setSummary("Resum sobre la pàgina d'Exposició");
        $page->setText1("Text HTML en cru amb la descripció complerta de la pàgina Exposició a la columna esquerra");
        $page->setText2("Text HTML en cru amb la descripció complerta de la pàgina Exposició a la columna dreta");
        $page->setImage1('001-EXP-01.png');
        $page->setPosition(1);
        $page->setIsActive(true);

        $manager->persist($page);

        ////////////////

        /// APARTATS
        $page = new Page();
        $page->setCode("002-APA");
        $page->setTitle("Apartats");
        $page->setSummary("Resum sobre la pàgina d'Apartats");
        $page->setText1("Text HTML en cru amb la descripció complerta de la pàgina Apartats a la columna esquerra");
        $page->setText2("Text HTML en cru amb la descripció complerta de la pàgina Apartats a la columna dreta");
        $page->setImage1('002-APA-01.png');
        $page->setPosition(2);
        $page->setIsActive(true);

        $manager->persist($page);

        ////////////////

        /// ARTISTES
        $page = new Page();
        $page->setCode("003-ART");
        $page->setTitle("Artistes");
        $page->setSummary("Resum sobre la pàgina d'Artistes");
        $page->setText1("Text HTML en cru amb la descripció complerta de la pàgina d'Artistes a la columna esquerra");
        $page->setText2("Text HTML en cru amb la descripció complerta de la pàgina d'Artistes a la columna dreta");
        $page->setImage1('003-ART-01.png');
        $page->setPosition(3);
        $page->setIsActive(true);

        $manager->persist($page);

        ////////////////

        /// AGRAÏMENTS
        $page = new Page();
        $page->setCode("004-AGR");
        $page->setTitle("Agraïments");
        $page->setSummary("Resum sobre la pàgina d'Agraïments");
        $page->setText1("Text HTML en cru amb la descripció complerta de la pàgina d'Agraïments a la columna esquerra");
        $page->setText2("Text HTML en cru amb la descripció complerta de la pàgina d'Agraïments a la columna dreta");
        $page->setImage1('004-AGR-01.png');
        $page->setPosition(4);
        $page->setIsActive(true);

        $manager->persist($page);

        ////////////////

        /// CRÈDITS
        $page = new Page();
        $page->setCode("005-CRE");
        $page->setTitle("Crèdits");
        $page->setSummary("Resum sobre la pàgina de Crèdits");
        $page->setText1("Text HTML en cru amb la descripció complerta de la pàgina de Crèdits a la columna esquerra");
        $page->setText2("Text HTML en cru amb la descripció complerta de la pàgina de Crèdits a la columna dreta");
        $page->setImage1('005-CRE-01.png');
        $page->setPosition(5);
        $page->setIsActive(true);

        $manager->persist($page);

        ////////////////

        $manager->flush();
    }
}