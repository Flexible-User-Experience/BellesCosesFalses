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
        $page->setTitle("Sis capítols, sis maneres de crear el paisatge");
        $page->setSummary("");
        $page->setText1("<strong>Verdolatria</strong><br/>Una al·lusió irònica a la fal·lera de cromatisme verd que inunda els discursos més convencionals sobre el paisatge. A la vegada...<br/><br/><strong>Regions espantoses</strong><br/>Imatges del rebuig...<br/><br/><strong>El Jardí</strong><br/>Etimològicament, un jardí és un clos tancat i protegit. Una imatge...");
        $page->setText2("<strong>Terres promeses</strong><br/>L'anhel de trobar un món millor és cabdal...<br/><br/><strong>La pell</strong><br/>Les històries subjectives poden convertir-se en paisatge quan...<br/><br/><strong>Cap a paisages nous</strong><br/>L'últim apartat compendia el concepte central de l'exposició: sempre estem ideant paisatges nous...");
        $page->setImage1('');
        $page->setPosition(2);
        $page->setIsActive(true);

        $manager->persist($page);

        ////////////////

        /// ARTISTES
        $page = new Page();
        $page->setCode("003-ART");
        $page->setTitle("Artistes");
        $page->setSummary("");
        $page->setText1("<strong>Verdolatria</strong><br/>Carlos Aires<br/>Josep Berga i Boix<br/>Francesc Guasch Homs<br/><br/><strong>Regions espantoses</strong><br/>Xavier Basiana + Jaume Orpinell<br/>Basurama<br/><br/><strong>El Jardí</strong><br/>Arquitecturia");
        $page->setText2("<strong>Terres promeses</strong><br/>Miquel Barceló<br/>Francesc Català-Roca<br/>Patrícia Dauder<br/><br/><strong>La pell</strong><br/>Rosa Amorós<br/>Fina Miralles<br/><br/><strong>Cap a paisages nous</strong><br/>Joan Fontcuberta<br/>Albert Gusi");
        $page->setImage1('');
        $page->setPosition(3);
        $page->setIsActive(true);

        $manager->persist($page);

        ////////////////

        /// AGRAÏMENTS
        $page = new Page();
        $page->setCode("004-AGR");
        $page->setTitle("Agraïments");
        $page->setSummary("Resum sobre la pàgina d'Agraïments");
        $page->setText1("Amb agraïmets a les següents institucions i galeries:<br/><br/>MACBA Museu d'Art Contemporani de Barcelona<br/>MNAC<br/>Museu de Valls<br/><br/>Galeria ADN, Barcelona<br/>Galeria Casa sin fin, Madrid");
        $page->setText2("La imatge emprada en la comunicació de l'exposició és una interpretació de la il·lustració La Rioja y sus siete valles, d'Ernesto Reiner");
        $page->setImage1('');
        $page->setPosition(4);
        $page->setIsActive(true);

        $manager->persist($page);

        ////////////////

        /// CRÈDITS
        $page = new Page();
        $page->setCode("005-CRE");
        $page->setTitle("Crèdits");
        $page->setSummary("");
        $page->setText1("Organització<br/>Lo Pati Centre d'Art Terres de l'Ebre<br/><br/>Comissariat:<br>Albert Martinez Lopez-Amor<br/><br/>Coordinació:<br/>Imma Ávalos");
        $page->setText2("");
        $page->setImage1('');
        $page->setPosition(5);
        $page->setIsActive(true);

        $manager->persist($page);

        ////////////////

        $manager->flush();
    }
}