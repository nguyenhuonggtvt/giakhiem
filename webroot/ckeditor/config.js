/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.height='300px';
    config.filebrowserBrowseUrl = gb_url+'webroot/ckfinder/ckfinder.html';
    config.filebrowserImageBrowseUrl = gb_url+'webroot/ckfinder/ckfinder.html?type=Images';
    config.filebrowserFlashBrowseUrl =gb_url+'webroot/ckfinder/ckfinder.html?type=Flash';
    config.filebrowserUploadUrl = gb_url+'webroot/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserImageUploadUrl =gb_url+'webroot/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
    config.filebrowserFlashUploadUrl =gb_url+'webroot/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
