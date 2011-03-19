<?php
/**
 * Batman's ZF library
 *
 * @package Batman_Notification
 * @subpackage Sender
 *
 * @author Maciej Wilgucki
 * @copyright (c) 2011 Maciej Wilgucki <http://blog.wilgucki.pl>
 * @license http://blog.wilgucki.pl/license/new-bsd New BSD License
 * @version 0.2
 */
class Batman_Notification_Sender_ZendMail extends Zend_Mail implements Batman_Notification_Sender_Interface
{
    /**
     * @var Batman_Notification_DataTemplate_Interface
     */
    protected $_dataTemplate = null;

    public function setDataTemplate(Batman_Notification_DataTemplate_Interface $dataTemplate)
    {
        $this->_dataTemplate = $dataTemplate;
        return $this;
    }
    
    public function getDataTemplate()
    {
        return $this->_dataTemplate;
    }

    public function send()
    {
        $this->setBodyHtml(
            $this->_dataTemplate->render()
        );
        parent::send();
    }
}