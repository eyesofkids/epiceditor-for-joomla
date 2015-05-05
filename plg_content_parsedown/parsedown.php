<?php
/*
 * @version   1.3.16 Sun Mar 2 17:49:25 2014 -0800
 * @package   yoonique markdown plugin
 * @author    yoonique[.]net
 * @copyright Copyright (C) yoonique[.]net and all rights reserved.
 * @license   GNU General Public License version 3
 */


defined('_JEXEC') or die('Restricted access');

jimport('joomla.plugin.plugin');

class plgContentParsedown extends JPlugin {

    public function onContentPrepare($context, &$article) {

        // We don't need it in the backend.
        if (JFactory::getApplication()->isAdmin())
        {
            return true;
        }

          $parsedown = new Parsedown();

          if ($this->params->get('set_breaks_enabled', '0') == '1') {
              $parsedown->setBreaksEnabled(true);
          }else{
              $parsedown->setBreaksEnabled(false);
          }

          if ($this->params->get('markup_escaped', '0') == '1') {
               $parsedown->setMarkupEscaped(true);
          }else{
              $parsedown->setMarkupEscaped(false);
          }

          if ($this->params->get('urls_linked', '0') == '1') {
            $parsedown->setUrlsLinked(true);
          }else{
            $parsedown->setUrlsLinked(false);
          }

          $article->text = $parsedown->text($article->text);

        return true;
    }

}

