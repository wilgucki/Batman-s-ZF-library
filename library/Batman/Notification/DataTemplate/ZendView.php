<?php
/**
 * Batman's ZF library
 *
 * @package Batman_Notification
 * @subpackage DataTemplate
 *
 * @author Maciej Wilgucki
 * @copyright (c) 2011 Maciej Wilgucki <http://blog.wilgucki.pl>
 * @license http://blog.wilgucki.pl/license/new-bsd New BSD License
 * @version 0.2
 */
class Batman_Notification_DataTemplate_ZendView extends Zend_View implements Batman_Notification_DataTemplate_Interface
{
    protected $_templatePath = null;
    protected $_templateName = null;
    
    /**
     * Set template file name
     *
     * @param string $templateName
     * @return Batman_Notification_DataTemplate_ZendView
     */
    public function setTemplateName($templateName)
    {
        $this->_templateName = $templateName;
        return $this;
    }

    /**
     * Get template file name
     *
     * @return null|string
     */
    public function getTemplateName()
    {
        return $this->_templateName;
    }

    /**
     * Set template path
     *
     * @param string $path
     * @return Batman_Notification_DataTemplate_ZendView
     */
    public function setTemplatePath($path)
    {
        $this->_templatePath = $path;
        return $this;
    }

    /**
     * Get template path
     *
     * @return null|string
     */
    public function getTemplatePath()
    {
        return $this->_templatePath;
    }
    
    public function render($name = '')
    {
        if($this->getTemplateName() === null) {
            throw new Batman_Notification_Exception('Invalid template file');
        }

        if($this->getTemplatePath() === null) {
            throw new Batman_Notification_Exception('Invalid template path');
        }

        if(!in_array($this->getTemplatePath(), $this->getScriptPaths())) {
            $this->setScriptPath($this->getTemplatePath());
        }

        return parent::render($this->getTemplateName());
    }
}