<?php
class Batman_NotificationTest extends PHPUnit_Framework_TestCase
{
    public function testInvalidSenderOrDataTemplateInConstructor()
    {
        try {
            $sender = 'SomeBogusSenderClass';
            $dataTemplate = 'SomeBogusDataTemplateClass';
            $notification = new Batman_Notification($sender, $dataTemplate);
        } catch(Batman_Notification_Exception $e) {
            return;
        }
        
        $this->fail('Exception hasn\'t been raised');
    }
    
    public function testNullValuesInConstructor()
    {
        $notification = new Batman_Notification();
        $this->assertTrue(null === $notification->getSender());
        $this->assertTrue(null === $notification->getDataTemplate());
    }

    public function testSetInvalidSender()
    {
        try {
            $sender = 'SomeBogusSenderClass';
            $notification = new Batman_Notification();
            $notification->setSender($sender);
        } catch(Batman_Notification_Exception $e) {
            return;
        }
        
        $this->fail('Exception hasn\'t been raised');
    }
    
    public function testSetInvalidDataTemplate()
    {
        try {
            $dataTemplate = 'SomeBogusDataTemplateClass';
            $notification = new Batman_Notification();
            $notification->setDataTemplate($dataTemplate);
        } catch(Batman_Notification_Exception $e) {
            return;
        }
        
        $this->fail('Exception hasn\'t been raised');
    }
}