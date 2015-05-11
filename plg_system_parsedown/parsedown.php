<?php
/**
 * @copyright   Copyright (C) EddyChang.me
 * @license     GNU General Public License version 2 or later.
 */

defined('_JEXEC') or die;

/**
 * plgSystemParsedown plugin class.
 *
 * @package     Joomla.plugin
 * @subpackage  System.mylib
 */
class plgSystemParsedown extends JPlugin
{
    /**
     * Method to register custom library.
     *
     * return  void
     */
    public function onAfterInitialise()
    {

        JLoader::register('Parsedown', JPATH_LIBRARIES . '/parsedown/Parsedown.php');
        JLoader::register('ParsedownExtra', JPATH_LIBRARIES . '/parsedown/ParsedownExtra.php');


        if((int) $this->params->get('highlight', 0) == 1){


            // We don't need it in the backend.
            if (JFactory::getApplication()->isAdmin()) {
                return true;
            } else {
                //get the style css param
                $style = $this->params->get('highlight_style', 'default.css');

                if (strpos($style,'.css') !== true) {
                    $style.='.css';
                }

                $doc = JFactory::getDocument();
                $doc->addStyleSheet(JURI::root() . 'plugins/system/parsedown/styles/'.$style);
                $doc->addScript(JURI::root() . 'plugins/system/parsedown/highlight.pack.js');
                $doc->addScriptDeclaration('hljs.initHighlightingOnLoad();');
            }
        }


    }
}