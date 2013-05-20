<?php 
namespace Flux\PageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Flux\Utilities\Utils;

/**
 * @ORM\Entity
 * @ORM\Table(name="flux_page")
 * @ORM\Entity(repositoryClass="Flux\PageBundle\Repository\PageRepository")
 * @ORM\HasLifecycleCallbacks
 * @Gedmo\TranslationEntity(class="Flux\PageBundle\Entity\Translation\PageTranslation")
 * @Vich\Uploadable
 */
class Page
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=10, unique=true)
     * @Assert\NotBlank()
     */
    protected $code;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Gedmo\Translatable
     */
    protected $metaTitle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Gedmo\Translatable
     */
    protected $metaDescription;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank()
     * @Gedmo\Translatable
     */
    protected $title;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Gedmo\Translatable
     *
    protected $subtitle;*/

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Gedmo\Translatable
     */
    protected $summary;
    
    /**
     * @ORM\Column(type="text", length=4000, nullable=true)
     * @Gedmo\Translatable
     */
    protected $text1;

    /**
     * @ORM\Column(type="text", length=4000, nullable=true)
     * @Gedmo\Translatable
     */
    protected $text2;

    /**
     * @Assert\File(
     *     maxSize="5M",
     *     mimeTypes={"image/png", "image/jpeg", "image/pjpeg"}
     * )
     * @Vich\UploadableField(mapping="imatge", fileNameProperty="image1")
     */
    protected $image1File;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $image1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Gedmo\Translatable
     */
    protected $altImage1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Gedmo\Translatable
     */
    protected $titleImage1;

    /**
     * @Assert\File(
     *     maxSize="5M",
     *     mimeTypes={"image/png", "image/jpeg", "image/pjpeg"}
     * )
     * @Vich\UploadableField(mapping="imatge", fileNameProperty="image2")
     */
    protected $image2File;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $image2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Gedmo\Translatable
     */
    protected $altImage2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Gedmo\Translatable
     */
    protected $titleImage2;

    /**
     * @Assert\File(
     *     maxSize="5M",
     *     mimeTypes={"image/png", "image/jpeg", "image/pjpeg"}
     * )
     * @Vich\UploadableField(mapping="imatge", fileNameProperty="image3")
     */
    protected $image3File;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $image3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Gedmo\Translatable
     */
    protected $altImage3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Gedmo\Translatable
     */
    protected $titleImage3;

    /**
     * @Assert\File(
     *     maxSize="5M",
     *     mimeTypes={"image/png", "image/jpeg", "image/pjpeg"}
     * )
     * @Vich\UploadableField(mapping="imatge", fileNameProperty="image4")
     */
    protected $image4File;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $image4;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Gedmo\Translatable
     */
    protected $altImage4;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Gedmo\Translatable
     */
    protected $titleImage4;

    /**
     * @ORM\Column(type="smallint")
     */
    protected $position;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $isActive;

    /**
     * @Gedmo\Locale
     */
    private $locale;

    /**
     * @ORM\OneToMany(
     *  targetEntity="Flux\PageBundle\Entity\Translation\PageTranslation",
     *  mappedBy="object",
     *  cascade={"persist", "remove"}
     * )
     * @Assert\Valid(deep = true)
     */
    private $translations;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated;

    /**
     * Constructor
     */
    public function __construct() {
        $this->translations = new ArrayCollection();
    }

    /**
     * Get translations
     *
     * @return ArrayCollection
     */
    public function getTranslations()
    {
        return $this->translations;
    }

    /**
     * Add translation
     * @param EntityTranslation
     */
    public function addTranslation($translation) {
        if ($translation->getContent()) {
            $translation->setObject($this);
            $this->translations->add($translation);
        }
    }
    
    /**
     * Remove translation
     * @param EntityTranslation
     */
    public function removeTranslation($translation) {
        $this->translations->removeElement($translation);
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return Page
     */
    public function setCode($code)
    {
        $this->code = $code;
    
        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Page
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    } 

    /**
     * Set subtitle
     *
     * @param string $subtitle
     * @return Page
     *
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    
        return $this;
    }

    /**
     * Get subtitle
     *
     * @return string 
     *
    public function getSubtitle()
    {
        return $this->subtitle;
    }*/

    /**
     * Set summary
     *
     * @param string $summary
     * @return Page
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    
        return $this;
    }

    /**
     * Get summary
     *
     * @return string 
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set text1
     *
     * @param string $text
     * @return Page
     */
    public function setText1($text)
    {
        $this->text1 = $text;
    
        return $this;
    }

    /**
     * Get text1
     *
     * @return string 
     */
    public function getText1()
    {
        return $this->text1;
    }

    /**
     * Set text2
     *
     * @param string $text
     * @return Page
     */
    public function setText2($text)
    {
        $this->text2 = $text;
    
        return $this;
    }

    /**
     * Get text2
     *
     * @return string 
     */
    public function getText2()
    {
        return $this->text2;
    }

    /**
     * Set image1File
     *
     * @param string $imageFile
     * @return Page
     */
    public function setImage1File($imageFile)
    {
        $this->image1File = $imageFile;
        $this->updated  = new \DateTime();
        
        return $this;
    }

    /**
     * Get image1File
     *
     * @return string 
     */
    public function getImage1File()
    {
        return $this->image1File;
    }

    /**
     * Set image1
     *
     * @param string $image
     * @return Page
     */
    public function setImage1($image)
    {
        $this->image1 = $image;
        $this->updated  = new \DateTime();

        return $this;
    }

    /**
     * Get image1
     *
     * @return string 
     */
    public function getImage1()
    {
        return $this->image1;
    }

    /**
     * Set image2File
     *
     * @param string $imageFile
     * @return Page
     */
    public function setImage2File($imageFile)
    {
        $this->image2File = $imageFile;
        $this->updated  = new \DateTime();
        
        return $this;
    }

    /**
     * Get image2File
     *
     * @return string 
     */
    public function getImage2File()
    {
        return $this->image2File;
    }

    /**
     * Set image2
     *
     * @param string $image
     * @return Page
     */
    public function setImage2($image)
    {
        $this->image2 = $image;
        $this->updated  = new \DateTime();

        return $this;
    }

    /**
     * Get image2
     *
     * @return string 
     */
    public function getImage2()
    {
        return $this->image2;
    }

    /**
     * Set image3File
     *
     * @param string $imageFile
     * @return Page
     */
    public function setImage3File($imageFile)
    {
        $this->image3File = $imageFile;
        $this->updated  = new \DateTime();
        return $this;
    }

    /**
     * Get image3File
     *
     * @return string 
     */
    public function getImage3File()
    {
        return $this->image3File;
    }

    /**
     * Set image3
     *
     * @param string $image
     * @return Page
     */
    public function setImage3($image)
    {
        $this->image3 = $image;
        $this->updated  = new \DateTime();

        return $this;
    }

    /**
     * Get image3
     *
     * @return string 
     */
    public function getImage3()
    {
        return $this->image3;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Page
     */
    public function setPosition($position)
    {
        $this->position = $position;
    
        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Page
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
        $this->updated  = new \DateTime();
    
        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    public function titleSlug()
    {
        return Utils::getSlug($this->title);
    }

    public function setLocale($locale) {
        $this->locale = $locale;
    }

    public function getLocale() {
        return $this->locale;
    }

    public function setAltImage1($altImage1)
    {
        $this->altImage1 = $altImage1;
    }

    public function getAltImage1()
    {
        return $this->altImage1;
    }

    public function setAltImage2($altImage2)
    {
        $this->altImage2 = $altImage2;
    }

    public function getAltImage2()
    {
        return $this->altImage2;
    }

    public function setAltImage3($altImage3)
    {
        $this->altImage3 = $altImage3;
    }

    public function getAltImage3()
    {
        return $this->altImage3;
    }

    public function setAltImage4($altImage4)
    {
        $this->altImage4 = $altImage4;
    }

    public function getAltImage4()
    {
        return $this->altImage4;
    }

    public function setImage4($image4)
    {
        $this->image4 = $image4;
        $this->updated  = new \DateTime();
    }

    public function getImage4()
    {
        return $this->image4;
    }

    public function setImage4File($image4File)
    {
        $this->image4File = $image4File;
        $this->updated  = new \DateTime();
    }

    public function getImage4File()
    {
        return $this->image4File;
    }

    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;
    }

    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    public function setMetaTitle($metaTitle)
    {
        $this->metaTitle = $metaTitle;
    }

    public function getMetaTitle()
    {
        return $this->metaTitle;
    }

    public function setTitleImage1($titleImage1)
    {
        $this->titleImage1 = $titleImage1;
    }

    public function getTitleImage1()
    {
        return $this->titleImage1;
    }

    public function setTitleImage2($titleImage2)
    {
        $this->titleImage2 = $titleImage2;
    }

    public function getTitleImage2()
    {
        return $this->titleImage2;
    }

    public function setTitleImage3($titleImage3)
    {
        $this->titleImage3 = $titleImage3;
    }

    public function getTitleImage3()
    {
        return $this->titleImage3;
    }

    public function setTitleImage4($titleImage4)
    {
        $this->titleImage4 = $titleImage4;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    public function setCreated($created)
    {
        $this->created = $created;
    }

    public function getUpdated()
    {
        return $this->updated;
    }

    public function getTitleImage4()
    {
        return $this->titleImage4;
    }

    public function __toString()
    {
        return $this->getTitle()?:'---';
    }
}