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
        $page->setTitle("Exposicions");
        $page->setSummary("Resum sobre la pàgina d'Exposicions");
        $page->setText1("Text HTML en cru amb la descripció complerta de la pàgina d'Exposicions");
        $page->setImage1('001-EXP-01.png');
        $page->setPosition(1);
        $page->setIsActive(true);

        $manager->persist($page);

        ////////////////

        /// ARTISTES
        $page = new Page();
        $page->setCode("002-ART");
        $page->setTitle("Artistes");
        $page->setSummary("Resum sobre la pàgina d'Artistes");
        $page->setText1("Text HTML en cru amb la descripció complerta de la pàgina d'Artistes");
        $page->setImage1('002-ART-01.png');
        $page->setPosition(2);
        $page->setIsActive(true);

        $manager->persist($page);

        ////////////////

        /// AGRAÏMENTS
        $page = new Page();
        $page->setCode("003-AGR");
        $page->setTitle("Agraïments");
        $page->setSummary("Resum sobre la pàgina d'Agraïments");
        $page->setText1("Text HTML en cru amb la descripció complerta de la pàgina d'Agraïments");
        $page->setImage1('002-AGR-01.png');
        $page->setPosition(3);
        $page->setIsActive(true);

        $manager->persist($page);

        ////////////////

        /// CRÈDITS
        $page = new Page();
        $page->setCode("004-CRE");
        $page->setTitle("Crèdits");
        $page->setSummary("Resum sobre la pàgina d'Crèdits");
        $page->setText1("Text HTML en cru amb la descripció complerta de la pàgina d'Crèdits");
        $page->setImage1('004-CRE-01.png');
        $page->setPosition(4);
        $page->setIsActive(true);

        $manager->persist($page);

        ////////////////

        $manager->flush();
    }
}