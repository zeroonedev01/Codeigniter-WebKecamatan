/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

 CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	
	config.filebrowserBrowseUrl = 'http://192.168.100.34:8080/MasterKecamatan/assets/kcfinder/browse.php?opener=ckeditor&type=files';
	config.filebrowserImageBrowseUrl = 'http://192.168.100.34:8080/MasterKecamatan/assets/kcfinder/browse.php?opener=ckeditor&type=images';
	config.filebrowserFlashBrowseUrl = 'http://192.168.100.34:8080/MasterKecamatan/assets/kcfinder/browse.php?opener=ckeditor&type=flash';
	config.filebrowserUploadUrl = 'http://192.168.100.34:8080/MasterKecamatan/assets/kcfinder/upload.php?opener=ckeditor&type=files';
	config.filebrowserImageUploadUrl = 'http://192.168.100.34:8080/MasterKecamatan/assets/kcfinder/upload.php?opener=ckeditor&type=images';
	config.filebrowserFlashUploadUrl = 'http://192.168.100.34:8080/MasterKecamatan/assets/kcfinder/upload.php?opener=ckeditor&type=flash';
};
