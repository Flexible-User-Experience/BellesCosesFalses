<?php
namespace Flux\BlogBundle\Admin;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Translation\Translator;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class PostAdmin extends Admin
{
    protected function configureListFields(ListMapper $listMapper)
    {
        $locale = $this->getRequest()->get('locale');
        $translator = new Translator($locale);
        $listMapper
            ->addIdentifier('id')
            ->add('postDate', null, array('label' => $translator->trans('blog.date'), 'template' => 'FluxPageBundle:Admin:custompostdate.html.twig'))
            ->add('title', null, array('label' => $translator->trans('blog.title')))
            ->add('image1', null, array('label' => $translator->trans('blog.image1'), 'template' => 'FluxPageBundle:Admin:customimg1.html.twig'))
            ->add('is_active', 'boolean', array('label' => $translator->trans('blog.active')))
            // add custom action links
            ->add('_action', 'actions', array(
                'actions' => array(
                    //'view' => array(),
                    'edit' => array(),
                ),
                'label' => $translator->trans('blog.actions')
            ))
        ;
    }

    protected $datagridValues = array(
        '_page' => 1,
        '_sort_order' => 'DESC', // sort direction
        '_sort_by' => 'postDate' // field name
    );

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        /*$locale = $this->getRequest()->get('locale');
        $translator = new Translator($locale);
        $datagridMapper
            ->add('title', null, array('label' => $translator->trans('blog.title')))
            ->add('isActive', null, array('label' => $translator->trans('blog.active')))
        ;*/
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $locale = $this->getRequest()->get('locale');
        $translator = new Translator($locale);
        $formMapper
            ->add('postDate', null, array('label' => $translator->trans('blog.date')))
            //->add('categories', 'sonata_type_model_list', array('label' => $translator->trans('blog.category')), array(/*'by_reference' => false*/))
            ->add('title', 'text', array('label' => $translator->trans('blog.title')))
            //->add('subtitle', 'text', array('label' => $translator->trans('blog.subtitle'), 'required' => false))
            ->add('summary', 'text', array('label' => $translator->trans('blog.summary'), 'required' => false))
            ->add('text1', 'textarea', array(
                'label' => 'Text columna esquerra',
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
            ->add('image2File', 'file', array('label' => $translator->trans('page.upload.image2'), 'required' => false))
            ->add('image2', null, array('label' => $translator->trans('page.image2'), 'required' => false, 'read_only' => true))
            ->add('altImage2', 'text', array('label' => $translator->trans('page.altimage2'), 'required' => false))
            ->add('titleImage2', 'text', array('label' => $translator->trans('page.titleimage2'), 'required' => false))
            //->add('image3File', 'file', array('label' => $translator->trans('page.upload.image3'), 'required' => false))
            //->add('image3', null, array('label' => $translator->trans('page.image3'), 'required' => false, 'read_only' => true))
            //->add('altImage3', 'text', array('label' => $translator->trans('page.altimage3'), 'required' => false))
            //->add('titleImage3', 'text', array('label' => $translator->trans('page.titleimage3'), 'required' => false))

            ->with('Controls') // CONTROLS
            ->add('is_active', 'checkbox', array('label' => $translator->trans('page.active'), 'required' => false))

            /*->add('translations', 'a2lix_translations', array(
                'label' => ' ',
                'fields' => array(
                    'title' => array('label' => $translator->trans('blog.title')),
                    'subtitle' => array('label' => $translator->trans('blog.subtitle')),
                    'summary' => array('label' => $translator->trans('blog.summary')),
                    'text1' => array('label' => $translator->trans('blog.text1')),
                    'text2' => array('label' => $translator->trans('blog.text2'))
            )))*/

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
}