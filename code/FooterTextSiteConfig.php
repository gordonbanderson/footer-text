<?php
class FooterTextSiteConfig extends DataExtension {
	static $db = array(
		'FooterText' => 'HTMLText',
		'ColumnStart' => "Enum('1,2,3,4')",
		'ColumnWidth' => "Enum('1,2,3,4')"
	);

	function updateCMSFields(FieldList $fields){
		$footerTabName = 'Root.'._t('SiteConfig.FOOTER', 'Footer');
		$fields->addFieldToTab($footerTabName, $h1=new HTMLEditorField('FooterText', _t('SiteConfig.FOOTER_TEXT', "Text to display in the footer")));	
		$options1 = singleton('SiteConfig')->dbObject('ColumnStart')->EnumValues();
		$options2 = singleton('SiteConfig')->dbObject('ColumnWidth')->EnumValues();
		$columnStartField = new DropdownField('ColumnStart',_t('SiteConfig.FOOTER_TEXT_START_COLUMN','Which column (of four) should the footer text start in',$options1));
		$columnWidthField = new DropdownField('ColumnStart',_t('SiteConfig.FOOTER_TEXT_WIDTH_COLUMN','How many, of four columns, should the footer text take up',$options2));
		//$fields->addFieldToTab("Root.Footer", $columnStartField);	
		//$fields->addFieldToTab("Root.Footer", $h1=new HTMLEditorField('FooterText', _t('SiteConfig.FOOTER_TEXT', "Text to display in the footer")));	
		$h1->setRows(6);
	}
}