<?php
class FilesRepoHolder extends Page {

	static $singular_name = "Files RepoHolder";
	static $allowed_children = array("FileCategory"); // set to string "none" or array of classname(s)
	static $default_child = "FileCategory"; //one classname
	static $default_parent = null; // NOTE: has to be a URL segment NOT a class name
	static $can_be_root = true; //
	static $hide_ancestor = null; //dont show ancestry class
	
	static $db = array(
		
	);

	public function canCreate($member = null) {
		return FilesRepoHolder::get()->count() < 1;
	}

	static $has_many = array(
		'CategorizedFiles' => 'CategorizedFile',
	);
	
	
	
	
	function getTheFiles(){
		$files = $this->CategorizedFiles()->sort("FileCategorys.Title","DESC");
//		Debug::show($files);
		return $files;
	}
	
	
	public function getCMSFields() {	
		$fields = parent::getCMSFields();
		$fields->addFieldToTab("Root.Main", GridField::create('CategorizedFiles','', $this->CategorizedFiles(), GridFieldConfig_RecordEditor::create()),"Content");
		
		return $fields;
	}
	
	
}

class FilesRepoHolder_Controller extends Page_Controller {

}