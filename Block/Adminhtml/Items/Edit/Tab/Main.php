<?php
/**
 * Copyright © 2015 Dotsquares. All rights reserved.
 */

// @codingStandardsIgnoreFile

namespace Dotsquares\Offerbanner\Block\Adminhtml\Items\Edit\Tab;


use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;



class Main extends Generic implements TabInterface
{

    /**
     * {@inheritdoc}
     */
    public function getTabLabel()
    {
        return __('Banner Information');
    }

    /**
     * {@inheritdoc}
     */
    public function getTabTitle()
    {
        return __('Banner Information');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Prepare form before rendering HTML
     *
     * @return $this
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('current_dotsquares_offerbanner_items');
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('item_');
        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Banner Information')]);
        if ($model->getId()) {
            $fieldset->addField('id', 'hidden', ['name' => 'id']);
        }
        $fieldset->addField(
            'title',
            'text',
            ['name' => 'title', 'label' => __('Title'), 'title' => __('Title'), 'required' => true]
        );
        $fieldset->addField(
            'content',
            'text',
            ['name' => 'content', 'label' => __('Content'), 'title' => __('Content'), 'required' => true]
        );
        $fieldset->addField(
            'url',
            'text',
            ['name' => 'url', 'label' => __('Url'), 'title' => __('Url'), 'required' => false]
        );
        $fieldset->addField(
            'start_date',
			
             'date',
         [
             'name' => 'start_date',
             'label' => __('Start date'),
             'title' => __('Start date'),
             'required' => true,
             'class' => '',
             'singleClick'=> true,
             'date_format' => $this->_localeDate->getDateFormat(\IntlDateFormatter::SHORT),
             'time_format' => $this->_localeDate->getTimeFormat(\IntlDateFormatter::SHORT),
             'time'=>true,
			 'required' => true
            //'format' =>$this->_localeDate->getDateFormat(\IntlDateFormatter::LONG)
         ]
            //['name' => 'start_date', 'label' => __('Start date'), 'title' => __('Start date'), 'required' => true]
        )->setAfterElementHtml("<script>
        //<![CDATA[
          require([
          'jquery',
          'mage/calendar'
            ], function($){
                  
                 $('#item_start_date').datetimepicker({
                    showOn: 'button',
                minDate: new Date(),
                dateFormat:'yy-mm-dd',
                beforeShowDay: $.datepicker.noWeekends
                
            }
        );   
                 });         
        //]]>
        </script>");

        $fieldset->addField(
            'end_date',
			
			 'date',
         [
             'name' => 'end_date',
             'label' => __('End date'),
             'title' => __('End date'),
             'required' => true,
             'class' => '',
             'singleClick'=> true,
             'date_format' => $this->_localeDate->getDateFormat(\IntlDateFormatter::SHORT),
             'time_format' => $this->_localeDate->getTimeFormat(\IntlDateFormatter::SHORT),
             'time'=>true,
			 'required' => true
            //'format' =>$this->_localeDate->getDateFormat(\IntlDateFormatter::LONG)
         ]

            //['name' => 'end_date', 'label' => __('End date'), 'title' => __('End date'), 'required' => true]
        )->setAfterElementHtml("<script>
        //<![CDATA[
          require([
          'jquery',
          'mage/calendar'
            ], function($){
                  
                 $('#item_end_date').datetimepicker({
                    showOn: 'button',
                minDate: new Date(),
                dateFormat:'yy-mm-dd',
                beforeShowDay: $.datepicker.noWeekends
                
            }
        );   
                 });         
        //]]>
        </script>");
        $fieldset->addField(
            'image',
            'file',
            ['name' => 'image', 'label' => __('Image'), 'title' => __('Image'), 'required' => false]
        );
        
		$fieldset->addField(
            'status',
            'select',
            [
                'label' => __('Status'),
                'title' => __('Status'),
                'name' => 'status',
                'required' => true,
				'values' => array('-1'=>'Please Select..','1' => 'Enable','0' => 'Disable'),
            ]
        );
        $form->setValues($model->getData());
        $this->setForm($form);
        return parent::_prepareForm();
    }
	
}
