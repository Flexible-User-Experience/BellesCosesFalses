<?php 
namespace Flux\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Flux\Utilities\Utils;

/**
 * @ORM\Entity
 * @ORM\Table(name="flux_product")
 * @ORM\Entity(repositoryClass="Flux\ProductBundle\Repository\ProductRepository")
 * @ORM\HasLifecycleCallbacks
 * @Gedmo\TranslationEntity(class="Flux\ProductBundle\Entity\Translation\ProductTranslation")
 * @Vich\Uploadable
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=20, unique=true)
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
    protected $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Gedmo\Translatable
     *
    protected $birth;*/

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Gedmo\Translatable
     *
    protected $dimensions;*/

    /**
     *  @ORM\Column(type="smallint", nullable=true)
     *
    protected $weight;*/

    /**
     *  @ORM\Column(type="smallint", nullable=true)
     *
    protected $fabrics;*/

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Gedmo\Translatable
     *
    protected $specifications;*/

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
    protected $size;*/
    
    /**
     * @Assert\File(
     *     maxSize="3M",
     *     mimeTypes={"image/png", "image/jpeg", "image/pjpeg"}
     * )
     * @Vich\UploadableField(mapping="vins", fileNameProperty="image1")
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
     *     maxSize="3M",
     *     mimeTypes={"image/png", "image/jpeg", "image/pjpeg"}
     * )
     * @Vich\UploadableField(mapping="imatge", fileNameProperty="image2")
     *
    protected $image2File;*/

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
    protected $image2;*/

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Gedmo\Translatable
     *
    protected $altImage2;*/

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Gedmo\Translatable
     *
    protected $titleImage2;

    /**
     * @ORM\Column(type="float", nullable=true)
     *
    protected $price;

    /**
     * @ORM\Column(type="integer", nullable=true)
     *
    protected $stock;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     *
    protected $gender;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Url()
     *
    protected $urlPinterestPin = NULL;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Url()
     *
    protected $urlPinterestPinboard = NULL;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Url()
     *
    protected $urlFacebookPhoto = NULL;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Url()
     *
    protected $urlFacebookAlbum = NULL;*/

    /**
     * @ORM\Column(type="float")
     */
    protected $degrees;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Gedmo\Translatable
     */
    protected $type;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    protected $bottles;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Gedmo\Translatable
     */
    protected $mix;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Gedmo\Translatable
     */
    protected $presentation;

    /**
     * @ORM\Column(type="text", length=4000, nullable=true)
     * @Gedmo\Translatable
     */
    protected $vinification;

    /**
     * @ORM\Column(type="text", length=4000, nullable=true)
     * @Gedmo\Translatable
     */
    protected $taste_note;

    /**
     * @ORM\Column(type="text", length=4000, nullable=true)
     * @Gedmo\Translatable
     */
    protected $marriage;

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
     * @ORM\ManyToOne(targetEntity="Flux\ProductBundle\Entity\Category") 
     */
    protected $category;

    /**
     * @ORM\OneToMany(
     *  targetEntity="Flux\ProductBundle\Entity\Translation\ProductTranslation",
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
     * Get translated field and form locale
     */
    public function getTranslatedFieldAndFromLocale($field, $locale)
    {
        $this->getTranslations()->filter(function($entity, $locale, $field) {
            return (($entity->getLocale() === $locale) && ($entity->getField() === $field));
        })->first();
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
     * @return Product
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
     * Set name
     *
     * @param string $name
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    } 

    /**
     * Set birth
     *
     * @param string $birth
     * @return Product
     *
    public function setBirth($birth)
    {
        $this->birth = $birth;
    
        return $this;
    }*/

    /**
     * Get birth
     *
     * @return string 
     *
    public function getBirth()
    {
        return $this->birth;
    }*/

    /**
     * Set dimensions
     *
     * @param string $dimensions
     * @return Product
     *
    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;
    
        return $this;
    }*/

    /**
     * Get dimensions
     *
     * @return string 
     *
    public function getDimensions()
    {
        return $this->dimensions;
    }*/

    /**
     * Set weight
     *
     * @param integer $weight
     * @return Product
     *
    public function setWeight($weight)
    {
        $this->weight = $weight;
    
        return $this;
    }*/

    /**
     * Get weight
     *
     * @return integer 
     *
    public function getWeight()
    {
        return $this->weight;
    }*/

    /**
     * Set fabrics
     *
     * @param integer $fabrics
     * @return Product
     *
    public function setFabrics($fabrics)
    {
        $this->fabrics = $fabrics;
    
        return $this;
    }*/

    /**
     * Get fabrics
     *
     * @return integer 
     *
    public function getFabrics()
    {
        return $this->fabrics;
    }*/

    /**
     * Set specifications
     *
     * @param string $specifications
     * @return Product
     *
    public function setSpecifications($specifications)
    {
        $this->specifications = $specifications;
    
        return $this;
    }*/

    /**
     * Get specifications
     *
     * @return string 
     *
    public function getSpecifications()
    {
        return $this->specifications;
    }*/

    /**
     * Set size
     *
     * @param string $size
     * @return Product
     *
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }*/

    /**
     * Get size
     *
     * @return string
     *
    public function getSize()
    {
        return $this->size;
    }*/

    /**
     * Set image1File
     *
     * @param string $imageFile
     * @return Product
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
     * @return Product
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
     * @return Product
     *
    public function setImage2File($imageFile)
    {
        $this->image2File = $imageFile;
        $this->updated  = new \DateTime();
        
        return $this;
    }*/

    /**
     * Get image2File
     *
     * @return string 
     *
    public function getImage2File()
    {
        return $this->image2File;
    }*/

    /**
     * Set image2
     *
     * @param string $image
     * @return Product
     *
    public function setImage2($image)
    {
        $this->image2 = $image;
        $this->updated  = new \DateTime();

        return $this;
    }*/

    /**
     * Get image2
     *
     * @return string 
     *
    public function getImage2()
    {
        return $this->image2;
    }*/

    /**
     * Set price
     *
     * @param float $price
     * @return Product
     *
    public function setPrice($price)
    {
        $this->price = $price;
    }*/

    /**
     * Get price
     *
     * @return float
     *
    public function getPrice()
    {
        return $this->price;
    }*/

    /**
     * Set stock
     *
     * @param integer $stock
     * @return Product
     *
    public function setStock($stock)
    {
        $this->stock = $stock;
    }*/

    /**
     * Get stock
     *
     * @return integer
     *
    public function getStock()
    {
        return $this->stock;
    }*/

    /**
     * Set gender
     *
     * @param integer $gender
     * @return Product
     *
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }*/

    /**
     * Get gender
     *
     * @return integer
     *
    public function getGender()
    {
        return $this->gender;
    }*/

    /**
     * Set urlPinterestPin
     *
     * @param string $pinterestPin
     * @return Product
     *
    public function setUrlPinterestPin($pinterestPin)
    {
        $this->urlPinterestPin = $pinterestPin;

        return $this;
    }*/

    /**
     * Get urlPinterestPin
     *
     * @return string
     *
    public function getUrlPinterestPin()
    {
        return $this->urlPinterestPin;
    }*/

    /**
     * Set urlPinterestPinboard
     *
     * @param string $pinterestPinboard
     * @return Product
     *
    public function setUrlPinterestPinboard($pinterestPinboard)
    {
        $this->urlPinterestPinboard = $pinterestPinboard;

        return $this;
    }*/

    /**
     * Get urlPinterestPinboard
     *
     * @return string
     *
    public function getUrlPinterestPinboard()
    {
        return $this->urlPinterestPinboard;
    }*/

    /**
     * Set urlFacebookPhoto
     *
     * @param string $facebookPhoto
     * @return Product
     *
    public function setUrlFacebookPhoto($facebookPhoto)
    {
        $this->urlFacebookPhoto = $facebookPhoto;

        return $this;
    }*/

    /**
     * Get urlFacebookPhoto
     *
     * @return string
     *
    public function getUrlFacebookPhoto()
    {
        return $this->urlFacebookPhoto;
    }*/

    /**
     * Set urlFacebookAlbum
     *
     * @param string $facebookAlbum
     * @return Product
     *
    public function setUrlFacebookAlbum($facebookAlbum)
    {
        $this->urlFacebookAlbum = $facebookAlbum;

        return $this;
    }*/

    /**
     * Get urlFacebookAlbum
     *
     * @return string
     *
    public function getUrlFacebookAlbum()
    {
        return $this->urlFacebookAlbum;
    }*/

    /**
     * Set position
     *
     * @param integer $position
     * @return Product
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
     * @return Product
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    
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

    /**
     * Set category
     *
     * @param Category $category
     * @return Category
     */
    public function setCategory($category = null) {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return Category 
     */
    public function getCategory() {
        return $this->category;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug() {
        return Utils::getSlug($this->name);
    }

    public function setDegrees($degrees)
    {
        $this->degrees = $degrees;
    }

    public function getDegrees()
    {
        return $this->degrees;
    }

    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    public function getLocale()
    {
        return $this->locale;
    }

    public function setMarriage($marriage)
    {
        $this->marriage = $marriage;
    }

    public function getMarriage()
    {
        return $this->marriage;
    }

    public function setTasteNote($taste_note)
    {
        $this->taste_note = $taste_note;
    }

    public function getTasteNote()
    {
        return $this->taste_note;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setVinification($vinification)
    {
        $this->vinification = $vinification;
    }

    public function getVinification()
    {
        return $this->vinification;
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

    public function setAltImage1($altImage1)
    {
        $this->altImage1 = $altImage1;
    }

    public function getAltImage1()
    {
        return $this->altImage1;
    }

    public function setBottles($bottles)
    {
        $this->bottles = $bottles;
    }

    public function getBottles()
    {
        return $this->bottles;
    }

    public function setMix($mix)
    {
        $this->mix = $mix;
    }

    public function getMix()
    {
        return $this->mix;
    }

    public function setPresentation($presentation)
    {
        $this->presentation = $presentation;
    }

    public function getPresentation()
    {
        return $this->presentation;
    }

    /*
    public function setAltImage2($altImage2)
    {
        $this->altImage2 = $altImage2;
    }

    public function getAltImage2()
    {
        return $this->altImage2;
    }*/

    public function setTitleImage1($titleImage1)
    {
        $this->titleImage1 = $titleImage1;
    }

    public function getTitleImage1()
    {
        return $this->titleImage1;
    }

    public function setCreated($created)
    {
        $this->created = $created;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    public function getUpdated()
    {
        return $this->updated;
    }

    /*
    public function setTitleImage2($titleImage2)
    {
        $this->titleImage2 = $titleImage2;
    }

    public function getTitleImage2()
    {
        return $this->titleImage2;
    }*/

    public function __toString()
    {
        return $this->getName()?:'---';
    }
}