<?php
class CategorizedFile extends DataObject {

  static $singular_name = "CategorizedFile";

  static $db = array(
    "Title" => "Text"
  );

  static $has_one = array(
    'FilesRepoHolder' => 'FilesRepoHolder',
    "File" => "File",
  );
  
  
  
  static $belongs_many_many = array(
    'FileCategorys' => 'FileCategory',
  );
  

  static $sort_order = "FileCategorys.Title ASC";

  //Fields to show in the DOM
  static $summary_fields = array(
    "Title" => "File Name"
  );

  function onBeforeWrite() {
    $this->FilesRepoHolderID = FilesRepoHolder::get()->first()->ID;
    parent::onBeforeWrite();
  }


  public function getCMSFields(){

    $fields = FieldList::create(TabSet::create("Root"));
    $fields->addFieldToTab("Root.Main", TextField::create('Title', _t('Empresa.NOMBREARCHIVO', 'File Name')));

    if ($this->ID) {
      $fields->addFieldToTab("Root.Main", $dd = CheckboxSetField::create('FileCategorys', "Category", 
        FileCategory::get()->map('ID', 'Title')
      ));

      $dd->setEmptyString(_t('PersonCV.SELECT',"-- select category --"));
      $UploadField = new UploadField('File', _t('Page.IMAGES',"File"));
      $UploadField->setFolderName("CategorizedFiles");
      $fields->addFieldToTab("Root.Main", $UploadField);
    }

    return $fields;
  }

}