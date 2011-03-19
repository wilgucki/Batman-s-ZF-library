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
interface Batman_Notification_Sender_Interface
{
    public function send();
    public function setDataTemplate(Batman_Notification_DataTemplate_Interface $dataTemplate);
    public function getDataTemplate();
}