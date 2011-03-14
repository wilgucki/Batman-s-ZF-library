<?php
/**
 * Batman's ZF library
 *
 * @package Batman_Notification
 *
 * @author Maciej Wilgucki
 * @copyright (c) 2011 Maciej Wilgucki <http://blog.wilgucki.pl>
 * @license http://blog.wilgucki.pl/license/new-bsd New BSD License
 * @version 0.1.1
 */
class Batman_Notification
{
    /**
     * Factory
     *
     * @static
     * @param string $type
     * @param mixed $options
     * @return Batman_Notification_Sender_Abstract
     */
    public static function factory($type, $options = null)
    {
        $class = 'Batman_Notification_Sender_' . ucfirst($type);
        if(!class_exists($class)) {
            throw new Batman_Notification_Exception('Invalid notification type');
        }

        return new $class($options);
    }
}