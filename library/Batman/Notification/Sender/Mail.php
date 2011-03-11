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
 *
 */
class Batman_Notification_Sender_Mail extends Batman_Notification_Sender_Abstract
{
    /**
     * Mail recipient
     *
     * @var string
     */
    protected $_to = null;

    /**
     * Mail sender
     *
     * @var string
     */
    protected $_from = null;

    /**
     * Mail subject
     *
     * @var string
     */
    protected $_subject = null;

    /**
     * @param mixed $options
     */
    public function __construct($options = null)
    {
        if($options instanceof Zend_Config) {
            $options = $options->toArray();
        }
        if(isset($options['mail'])) {
            $this->setOptions($options['mail']);
        }
        $options = isset($options['template']) ? $options['template'] : null;
        parent::__construct($options);
    }

    /**
     * Set mail recipient
     *
     * @param string $to
     * @return void
     */
    public function setTo($to)
    {
        $this->_to = $to;
    }

    /**
     * Get e-mail recipient
     *
     * @return null|string
     */
    public function getTo()
    {
        return $this->_to;
    }

    /**
     * Set sender's e-mail
     *
     * @param string $from
     * @return void
     */
    public function setFrom($from)
    {
        $this->_from = $from;
    }

    /**
     * Get sender's e-mail
     *
     * @return null|string
     */
    public function getFrom()
    {
        return $this->_from;
    }

    /**
     * Set e-mail subject
     *
     * @param string $subject
     * @return void
     */
    public function setSubject($subject)
    {
        $this->_subject = $subject;
    }

    /**
     * Get e-mail subject
     *
     * @return null|string
     */
    public function getSubject()
    {
        return $this->_subject;
    }

    /**
     * Send e-mail
     *
     * @throws Batman_Notification_Exception
     * @return void
     */
    public function send()
    {
        if($this->getTo() === null) {
            throw new Batman_Notification_Exception('Invalid e-mail recipient');
        }

        if($this->getFrom() === null) {
            throw new Batman_Notification_Exception('Invalid e-mail sender');
        }

        if($this->getSubject() === null) {
            throw new Batman_Notification_Exception('Invalid e-mail subject');
        }

        $body = $this->_render();

        $mail = new Zend_Mail('utf-8');
        $mail->addTo($this->getTo());
        $mail->setFrom($this->getFrom());
        $mail->setSubject($this->getSubject());
        $mail->setBodyHtml($body);
        $mail->send();
    }
}
