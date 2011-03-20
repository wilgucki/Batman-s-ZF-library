<?php
/**
 * Batman's ZF library
 *
 * @package Batman_Notification
 *
 * @author Maciej Wilgucki
 * @copyright (c) 2011 Maciej Wilgucki <http://blog.wilgucki.pl>
 * @license http://blog.wilgucki.pl/license/new-bsd New BSD License
 * @version 0.2
 */
class Batman_Notification
{
    /**
     * @var Batman_Notification_Sender_Abstract
     */
    protected $_sender = null;
    
    /**
     * @var Batman_Notification_DataTemplate_Abstract
     */
    protected $_dataTemplate = null;
    
    public function __construct($sender = null, $dataTemplate = null)
    {
        if($sender !== null) $this->setSender($sender);
        if($dataTemplate !== null) $this->setDataTemplate($dataTemplate);
    }
    
    public function setSender($sender)
    {
        if(!$sender instanceof Batman_Notification_Sender_Interface) {
            if(!class_exists($sender)) {
                throw new Batman_Notification_Exception('Sender class ' . $sender . ' does not exists');
            }
            $sender = new $sender;
        }
        
        $this->_sender = $sender;
    }
    
    public function getSender()
    {
        return $this->_sender;
    }
    
    public function setDataTemplate($dataTemplate)
    {
        if(!$dataTemplate instanceof Batman_Notification_DataTemplate_Interface) {
            if(!class_exists($dataTemplate)) {
                throw new Batman_Notification_Exception('DataTemplate class ' . $dataTemplate . ' does not exists');
            }
            $dataTemplate = new $dataTemplate;
        }
        
        $this->_dataTemplate = $dataTemplate;
    }
    
    public function getDataTemplate()
    {
        return $this->_dataTemplate;
    }
    
    public function send()
    {
        $this->_sender->setDataTemplate($this->_dataTemplate);
        $this->_sender->send();
    }
}