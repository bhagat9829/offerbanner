<?php

/**
 * Copyright © 2015 Dotsquares. All rights reserved.
 */

namespace Dotsquares\Offerbanner\Block\Adminhtml\Items;


class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{
   public function __construct()
		{
				parent::__construct();
				$this->setId("offerbannerGrid");
				$this->setDefaultSort("offer_banner_id");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

   public function getRowUrl($row)
	 	{
			   return $this->getUrl("*/*/edit", array("id" => $row->getId()));
		}

		static public function getOptionArray5()
		{
            $data_array=array(); 
			$data_array[0]='Active';
			$data_array[1]='Deactive';
            return($data_array);
		}
		static public function getValueArray5()
		{
            $data_array=array();
			foreach(Dotsquares_Offerbanner_Block_Adminhtml_Offerbanner_Grid::getOptionArray5() as $k=>$v){
               $data_array[]=array('value'=>$k,'label'=>$v);		
			}
            return($data_array);

		} 
}
