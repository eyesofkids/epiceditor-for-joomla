<?php

/**
 * @copyright   Copyright (C) EddyChang.me
 * @license     GNU General Public License version 2 or later.
 */

defined('_JEXEC') or die('Restricted access');

class plgEditorEpicEditor extends JPlugin
{

    //protected $_width = '';
    //protected $_editor_theme = '';


    public function onInit()
    {
        $path = JURI::root() . 'plugins/editors/epiceditor/epiceditor/';

        $doc = JFactory::getDocument();

        $doc->addScript($path . 'js/epiceditor.min.js');
        $doc->addScript($path . 'js/to-markdown.js');

        return '';
    }

    public function onSave($editor)
    {

        $js = "\t   var content = $.EpicNS.epiceditor.exportFile();\n

                      document.getElementById('{$editor}').value = content;\n";
        return $js;
    }

    public function onGetContent($id)
    {
        return "document.getElementById('$id').value;\n";
    }

    /**
     * Set the editor content.
     *
     * @param   string $id The id of the editor field.
     * @param   string $html The content to set.
     *
     * @return  string
     */
    public function onSetContent($id, $html)
    {
        return "document.getElementById('$id').value = $html;\n";
    }

    /**
     * Inserts html code into the editor
     *
     * @param   string $id The id of the editor field
     *
     * @return  boolean  returns true when complete
     */
    /**
     * @return bool
     */
    public function onGetInsertMethod()
    {
        static $done = false;

        // Do this only once.
        if (!$done) {
            $done = true;
            $doc = JFactory::getDocument();

            $path = JURI::root();

            //1. add path to image for preview.
            //2. use toMarkdown.js converter.
            //3. parse htmlentities (encode)
            $js = <<<JS
function jInsertEditorText(text, editor_id) {

var obj = {
    mystring: text
}


var img_tag = jQuery(obj.mystring).filter('img')[0];
var img_src = jQuery(img_tag).attr('src');


var hr_tag = jQuery(obj.mystring).filter('hr')[0];

var a_tag = jQuery(obj.mystring).filter('a')[0];
var a_href = jQuery(a_tag).attr('href');


if (typeof img_tag != 'undefined'){
 var new_img_src = "{$path}" + img_src;
 var newText = text.replace(img_src, new_img_src);
 }
else
{
 var newText = text;
}

if (typeof hr_tag == 'undefined'){
  newText = toMarkdown(newText, { gfm: true });
}

newText = jQuery('<div/>').text(newText).html();

var iframe = $.EpicNS.epiceditor.getElement('editorIframe');
var idoc = iframe.contentDocument || iframe.contentWindow.document;

if (!idoc.execCommand("InsertInputText", false, newText)) {
 idoc.execCommand("InsertHTML", false, newText)
}

}
JS;


            $doc->addScriptDeclaration($js);
        }

        return true;
    }


    /**
     * @param $name
     * @param $content
     * @param $width
     * @param $height
     * @param $col
     * @param $row
     * @param bool $buttons
     * @return string
     * @throws Exception
     */
    public function onDisplay(
        $name, $content, $width, $height, $col, $row, $buttons = true, $id = null, $asset = null, $author = null, $params = array())
    {
        $id = empty($id) ? $name : $id;

        // Only add "px" to width and height if they are not given as a percentage.
        $width .= is_numeric($width) ? 'px' : '';
        $height .= is_numeric($height) ? 'px' : '';

        $doc = JFactory::getDocument();

        $token = JSession::getFormToken();
        $admin = JFactory::getApplication()->isAdmin();


        $path = JURI::root() . 'plugins/editors/epiceditor/epiceditor/';

        // if ($uri->isSSL()) {
        //     $path = str_replace('http://', 'https://', $path);
        // }
        $editor_theme = $this->params->get('editor_theme', 'epic-dark');
        $preview_theme = $this->params->get('preview_theme', 'preview-dark');
        $auto_save = (int)$this->params->get('auto_save', 500);


        //heredoc string for javascript
        $optionJs = <<<JS
jQuery(document).ready(function(){
var opts = {
  container: 'epiceditor',
  textarea: '{$id}',
  basePath: '{$path}epiceditor',
  clientSideStorage: true,
  localStorageName: 'epiceditor',
  useNativeFullscreen: true,
  parser: marked,
  file: {
    name: 'epiceditor',
    defaultContent: '',
    autoSave: {$auto_save}
  },
  theme: {
    base: '{$path}themes/base/epiceditor.css',
    preview: '{$path}themes/preview/{$preview_theme}.css',
    editor: '{$path}themes/editor/{$editor_theme}.css'
  },
  button: {
    preview: true,
    fullscreen: true,
    bar: true
  },
  focusOnLoad: false,
  shortcut: {
    modifier: 18,
    fullscreen: 70,
    preview: 80
  },
  string: {
    togglePreview: 'Toggle Preview Mode',
    toggleEdit: 'Toggle Edit Mode',
    toggleFullscreen: 'Enter Fullscreen'
  },
  autogrow: true
}

$.EpicNS = {};
$.EpicNS.epiceditor = new EpicEditor(opts);


$.EpicNS.epiceditor.load(function(){

   if(jQuery('#jform_title').val() == ""){

    var r = confirm("It looks like you create a new article. Want to clean the LocalStorage now ?");
    if (r == true) {
        $.EpicNS.epiceditor.remove();
        $.EpicNS.epiceditor.open();
    }

   }


});

});
JS;

        $doc->addScriptDeclaration($optionJs);
        //$script = "var editor = new EpicEditor(opts);";

        // $doc->addScriptDeclaration($script);
        $buttons = $this->_displayButtons($id, $buttons, $asset, $author);

        $html = array();
        $html[] = '<div id="epiceditor">';
        $html[] = '</div>';

        $html[] = '<textarea name="' . $name . '" id="' . $id . '" cols="' . $col . '" rows="' . $row . '" style="display:none">' . $content . '</textarea>';

        $html[] = $buttons;


        $output = "";
        $output .= implode("\n", $html);

        return $output;

    }


    /**
     * @param $name
     * @param $buttons
     * @param $asset
     * @param $author
     *
     * @return string
     */
    protected function _displayButtons($name, $buttons, $asset, $author)
    {
        // Load modal popup behavior
        JHtml::_('behavior.modal', 'a.modal-button');

        $args['name'] = $name;
        $args['event'] = 'onGetInsertMethod';

        $return = '';
        $results[] = $this->update($args);
        foreach ($results as $result) {
            if (is_string($result) && trim($result)) {
                $return .= $result;
            }
        }

        if (is_array($buttons) || (is_bool($buttons) && $buttons)) {
            $results = $this->_subject->getButtons($name, $buttons, $asset, $author);

            $version = new JVersion();
            if (version_compare($version->getShortVersion(), '3.0', '>=')) {

                /*
                 * This will allow plugins to attach buttons or change the behavior on the fly using AJAX
                 */
                $return .= "\n<div id=\"editor-xtd-buttons\" class=\"btn-toolbar pull-left\">\n";
                $return .= "\n<div class=\"btn-toolbar\">\n";

                foreach ($results as $button) {
                    /*
                     * Results should be an object
                     */
                    if ($button->get('name')) {
                        $modal = ($button->get('modal')) ? ' class="modal-button btn"' : null;
                        $href = ($button->get('link')) ? ' class="btn" href="' . JURI::base() . $button->get('link') . '"' : null;
                        $onclick = ($button->get('onclick')) ? ' onclick="' . $button->get('onclick') . '"' : '';
                        $title = ($button->get('title')) ? $button->get('title') : $button->get('text');
                        $return .= '<a' . $modal . ' title="' . $title . '"' . $href . $onclick . ' rel="' . $button->get('options')
                            . '"><i class="icon-' . $button->get('name') . '"></i> ' . $button->get('text') . "</a>\n";
                    }
                }

                $return .= "</div>\n";
                $return .= "</div>\n";

            } else {

                // This will allow plugins to attach buttons or change the behavior on the fly using AJAX
                $return .= "\n" . '<div id="editor-xtd-buttons"><div class="btn-toolbar pull-left rokpad-clearfix">' . "\n";

                foreach ($results as $button) {
                    // Results should be an object
                    if ($button->get('name')) {
                        $modal = ($button->get('modal')) ? 'class="modal-button"' : null;
                        $href = ($button->get('link')) ? 'href="' . JURI::base() . $button->get('link') . '"' : null;
                        $onclick = ($button->get('onclick')) ? 'onclick="' . $button->get('onclick') . '"' : null;
                        $title = ($button->get('title')) ? $button->get('title') : $button->get('text');
                        $return .= "\n" . '<div class="button2-left"><div class="' . $button->get('name') . '">';
                        $return .= '<a ' . $modal . ' title="' . $title . '" ' . $href . ' ' . $onclick . ' rel="' . $button->get('options') . '">';
                        $return .= $button->get('text') . '</a>' . "\n" . '</div>' . "\n" . '</div>' . "\n";
                    }
                }

                $return .= '</div></div>' . "\n";
            }
        }

        return $return;
    }

}
