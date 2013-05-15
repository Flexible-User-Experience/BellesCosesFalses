<?php
namespace Flux\ProductBundle\Admin;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Translation\Translator;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\PageBundle\Model\PageInterface;
use Knp\Menu\ItemInterface as MenuItemInterface;

use Flux\ProductBundle\Entity\ActivityCategory;

class ActivityCategoryAdmin extends Admin
{
    protected function configureListFields(ListMapper $listMapper)
    {
        $locale = $this->getRequest()->get('locale');
        $translator = new Translator($locale);
        $listMapper
            //->addIdentifier('id')
            ->addIdentifier('code', null, array('label' => $translator->trans('page.code')))
            ->addIdentifier('title', null, array('label' => $translator->trans('page.title')))
            ->add('image1', null, array('label' => $translator->trans('page.image1'), 'template' => 'MainBundle:Admin:customimg1.html.twig'))
            ->add('position', null, array('label' => $translator->trans('page.position')))
            ->add('is_active', 'boolean', array('label' => $translator->trans('page.active')))
            // add custom action links
            ->add('_action', 'actions', array(
                'actions' => array(
                    //'view' => array(),
                    'edit' => array(),
                ),
                'label' => $translator->trans('page.actions')
            ))
        ;
    }

    protected $datagridValues = array(
        '_page' => 1,
        '_sort_order' => 'ASC', // sort direction
        '_sort_by' => 'code' // field name
    );

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $locale = $this->getRequest()->get('locale');
        $translator = new Translator($locale);
        $datagridMapper
            ->add('title', null, array('label' => $translator->trans('page.title')))
            ->add('isActive', null, array('label' => $translator->trans('page.active')))
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $locale = $this->getRequest()->get('locale');
        $translator = new Translator($locale);
        $formMapper
            ->add('code', 'text', array('label' => $translator->trans('page.code')))
            ->add('title', 'text', array('label' => $translator->trans('page.title')))
            ->add('summary', 'text', array('label' => $translator->trans('page.summary'), 'required' => false))

            ->with('SEO') // SEO
            ->add('metaTitle', 'text', array('label' => $translator->trans('page.metatitle'), 'required' => false))
            ->add('metaDescription', 'text', array('label' => $translator->trans('page.metadescription'), 'required' => false))

            ->with('Imatges') // IMAGES
            ->add('image1File', 'file', array('label' => $translator->trans('page.upload.image1'), 'required' => false))
            ->add('image1', null, array('label' => $translator->trans('page.image1'), 'required' => false, 'read_only' => true))
            ->add('altImage1', 'text', array('label' => $translator->trans('page.altimage1'), 'required' => false))
            ->add('titleImage1', 'text', array('label' => $translator->trans('page.titleimage1'), 'required' => false))

            ->with('Controls') // CONTROLS
            ->add('position', 'integer', array('label' => $translator->trans('page.position')))
            ->add('is_active', 'checkbox', array('label' => $translator->trans('page.active'), 'required' => false))

            ->with('Traduccions') // TRANSLATIONS
            ->add('translations', 'a2lix_translations', array(
                'label' => ' ',
                'fields' => array(
                    'title' => array('label' => $translator->trans('page.title')),
                    'summary' => array('label' => $translator->trans('page.summary')),
                    'metaTitle' => array('label' => $translator->trans('page.metatitle')),
                    'metaDescription' => array('label' => $translator->trans('page.metadescription')),
                    'altImage1' => array('label' => $translator->trans('page.altimage1')),
                    'titleImage1' => array('label' => $translator->trans('page.titleimage1')),
            )))
            ;
    }

    /*protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('code')
            ->add('position')
            ->add('title')
            ->add('subtitle')
            ->add('summary')
            ->add('text')
        ;
    }*/
}