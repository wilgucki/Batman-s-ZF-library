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
interface Batman_Notification_DataTemplate_Interface
{
    /**
     * Render message body
     * 
     * @return string
     */
    public function render();
}