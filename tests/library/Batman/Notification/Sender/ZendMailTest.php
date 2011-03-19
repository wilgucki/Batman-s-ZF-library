<?php
class Batman_Notification_Sender_ZendMailTest extends PHPUnit_Framework_TestCase
{
    public function testImplementsInterface()
    {
        $sender = new Batman_Notification_Sender_ZendMail();
        $this->assertTrue($sender instanceof Batman_Notification_Sender_Interface);
    }
    
    public function testSetInvalidDataTemplate()
    {
        $sender = new Batman_Notification_Sender_ZendMail();
        $dataTemplate = new stdClass();
        try {
            $sender->setDataTemplate($dataTemplate);
        } catch(Exception $e) {
            return;
        }

        $this->fail('Exception hasn\'t been raised');
    }
    
    public function testSetDataTemplate()
    {
        $notificationZendMail = new Batman_Notification_Sender_ZendMail();
        $dataTemplate = new Batman_Notification_DataTemplate_ZendView();
        $out = $notificationZendMail->setDataTemplate($dataTemplate);
        $this->assertTrue($out instanceof Batman_Notification_Sender_ZendMail);
    }

    public function testGetTemplatePath()
    {
        $notificationZendMail = new Batman_Notification_Sender_ZendMail();
        $this->assertTrue(null === $notificationZendMail->getDataTemplate());
        $dataTemplate = new Batman_Notification_DataTemplate_ZendView();
        $notificationZendMail->setDataTemplate($dataTemplate);
        $this->assertTrue($notificationZendMail->getDataTemplate() instanceof Batman_Notification_DataTemplate_Interface);
    }
}