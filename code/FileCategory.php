<?php
class FileCategory extends Page {

  static $singular_name = "File Category";
  static $icon = "mysite/images/filecategory";
  static $allowed_children = "none"; // set to string "none" or array of classname(s)
  static $can_be_root = false; //
  static $hide_ancestor = null; //dont show ancestry class
  
  static $many_many = array(
    'CategorizedFiles' => 'CategorizedFile',
  );


	public function getCMSFields() {	
		$fields = parent::getCMSFields();
		$fields->addFieldToTab("Root.Main", GridField::create('CategorizedFiles','', $this->CategorizedFiles(), GridFieldConfig_RecordEditor::create()),"Content");
		
		return $fields;
	}

}

class FileCategory_Controller extends Page_Controller {

}