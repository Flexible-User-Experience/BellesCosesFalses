<?php
namespace Flux\PageBundle\Admin;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Translation\Translator;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class PageAdmin extends Admin
{
    protected function configureListFields(ListMapper $listMapper)
    {
        $locale = $this->getRequest()->get('locale');
        $translator = new Translator($locale);
        $listMapper
            //->addIdentifier('id')
            ->addIdentifier('code', null, array('label' => $translator->trans('page.code')))
            ->add('title', null, array('label' => $translator->trans('page.title')))
            ->add('image1', null, array('label' => $translator->trans('page.image1'), 'template' => 'FluxPageBundle:Admin:customimg1.html.twig'))
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
        /*$locale = $this->getRequest()->get('locale');
        $translator = new Translator($locale);
        $datagridMapper
            ->add('title', null, array('label' => $translator->trans('page.title')))
            ->add('isActive', null, array('label' => $translator->trans('page.active')))
        ;*/
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $locale = $this->getRequest()->get('locale');
        $translator = new Translator($locale);
        $formMapper
            ->add('code', 'text', array('label' => $translator->trans('page.code'), 'read_only' => true))
            ->add('title', 'text', array('label' => $translator->trans('page.title')))
            //->add('summary', 'text', array('label' => $translator->trans('page.summary'), 'required' => false))
            ->add('text1', 'textarea', array(
                'label' => 'Text columna esquerra',
                'required' => false,
                'attr' => array(
                    'class' => 'tinymce',
                    'data-theme' => 'simple',
                    'style' => 'height:400px'
            )))
            ->add('text2', 'textarea', array(
                'label' => 'Text columna dreta',
                'required' => false,
                'attr' => array(
                    'class' => 'tinymce',
                    'data-theme' => 'simple',
                    'style' => 'height:400px'
            )))

            ->with('SEO') // SEO
            ->add('metaTitle', 'text', array('label' => $translator->trans('page.metatitle'), 'required' => false))
            ->add('metaDescription', 'text', array('label' => $translator->trans('page.metadescription'), 'required' => false))

            ->with('Imatges') // IMAGES
            ->add('image1File', 'file', array('label' => $translator->trans('page.upload.image1'), 'required' => false))
            ->add('image1', null, array('label' => $translator->trans('page.image1'), 'required' => false, 'read_only' => true))
            ->add('altImage1', 'text', array('label' => $translator->trans('page.altimage1'), 'required' => false))
            ->add('titleImage1', 'text', array('label' => $translator->trans('page.titleimage1'), 'required' => false))
            //->add('img1', 'sonata_type_model', array('property_path' => false, 'label' => 'im1', 'required' => false, 'template' => 'MainBundle:Admin:img.html.twig'))
            ->add('image2File', 'file', array('label' => $translator->trans('page.upload.image2'), 'required' => false))
            ->add('image2', null, array('label' => $translator->trans('page.image2'), 'required' => false, 'read_only' => true))
            ->add('altImage2', 'text', array('label' => $translator->trans('page.altimage2'), 'required' => false))
            ->add('titleImage2', 'text', array('label' => $translator->trans('page.titleimage2'), 'required' => false))
            ->add('image3File', 'file', array('label' => $translator->trans('page.upload.image3'), 'required' => false))
            ->add('image3', null, array('label' => $translator->trans('page.image3'), 'required' => false, 'read_only' => true))
            ->add('altImage3', 'text', array('label' => $translator->trans('page.altimage3'), 'required' => false))
            ->add('titleImage3', 'text', array('label' => $translator->trans('page.titleimage3'), 'required' => false))
            ->add('image4File', 'file', array('label' => $translator->trans('page.upload.image4'), 'required' => false))
            ->add('image4', null, array('label' => $translator->trans('page.image4'), 'required' => false, 'read_only' => true))
            ->add('altImage4', 'text', array('label' => $translator->trans('page.altimage4'), 'required' => false))
            ->add('titleImage4', 'text', array('label' => $translator->trans('page.titleimage4'), 'required' => false))

            ->with('Controls') // CONTROLS
            ->add('position', 'integer', array('label' => $translator->trans('page.position')))
            ->add('is_active', 'checkbox', array('label' => $translator->trans('page.active'), 'required' => false))

            /*->with('Traduccions') // TRANSLATIONS
            ->add('translations', 'a2lix_translations', array(
            'label' => ' ',
            'fields' => array(
                'title' => array('label' => $translator->trans('page.title')),
                'metaTitle' => array('label' => $translator->trans('page.metatitle')),
                'metaDescription' => array('label' => $translator->trans('page.metadescription')),
                'summary' => array('label' => $translator->trans('page.summary')),
                'text1' => array('label' => $translator->trans('page.text1'),
                    'attr' => array(
                        'class' => 'tinymce',
                        'data-theme' => 'simple',
                        'style' => 'height:400px'
                    )),
                'altImage1' => array('label' => $translator->trans('page.altimage1')),
                'titleImage1' => array('label' => $translator->trans('page.titleimage1')),
                'altImage2' => array('label' => $translator->trans('page.altimage2')),
                'titleImage2' => array('label' => $translator->trans('page.titleimage2')),
                'altImage3' => array('label' => $translator->trans('page.altimage3')),
                'titleImage3' => array('label' => $translator->trans('page.titleimage3')),
                'altImage4' => array('label' => $translator->trans('page.altimage4')),
                'titleImage4' => array('label' => $translator->trans('page.titleimage4')),

            )))
            // help messages like this
            /*->setHelps(array(
               'title' => $this->trans('help_post_title')
            ))*/
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

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
        $collection->remove('delete');
    }
}