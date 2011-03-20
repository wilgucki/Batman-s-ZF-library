<?php
class Batman_NotificationTest extends PHPUnit_Framework_TestCase
{
    public function testInvalidSenderInConstructor()
    {
        try {
            $sender = 'SomeBogusSenderClass';
            $notification = new Batman_Notification($sender);
        } catch(Batman_Notification_Exception $e) {
            return;
        }
        
        $this->fail('Exception hasn\'t been raised');
    }
    
    public function testInvalidDataTemplateInConstructor()
    {
        try {
            $dataTemplate = 'SomeBogusDataTemplateClass';
            $notification = new Batman_Notification(null, $dataTemplate);
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
    
    public function testSetValidSenderFromObject()
    {
        $sender = new Batman_Notification_Sender_ZendMail();
        $notification = new Batman_Notification();
        $notification->setSender($sender);
        $this->assertTrue($notification->getSender() instanceof Batman_Notification_Sender_Interface);
    }
    
    public function testSetValidSenderFromString()
    {
        $sender = 'Batman_Notification_Sender_ZendMail';
        $notification = new Batman_Notification();
        $notification->setSender($sender);
        $this->assertTrue($notification->getSender() instanceof Batman_Notification_Sender_Interface);
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
    
    public function testSetValidDataTemplateFromObject()
    {
        $dataTemplate = new Batman_Notification_DataTemplate_ZendView();
        $notification = new Batman_Notification();
        $notification->setDataTemplate($dataTemplate);
        $this->assertTrue($notification->getDataTemplate() instanceof Batman_Notification_DataTemplate_Interface);
    }
    
    public function testSetValidDataTemplateFromString()
    {
        $dataTemplate = 'Batman_Notification_DataTemplate_ZendView';
        $notification = new Batman_Notification();
        $notification->setDataTemplate($dataTemplate);
        $this->assertTrue($notification->getDataTemplate() instanceof Batman_Notification_DataTemplate_Interface);
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