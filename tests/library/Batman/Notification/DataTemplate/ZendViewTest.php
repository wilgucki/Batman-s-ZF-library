<?php
class Batman_Notification_DataTemplate_ZendViewTest extends PHPUnit_Framework_TestCase
{
    public function testImplementsInterface()
    {
        $dataTemplate = new Batman_Notification_DataTemplate_ZendView();
        $this->assertTrue(($dataTemplate instanceof Batman_Notification_DataTemplate_Interface));
    }
    
    public function testSetTemplateName()
    {
        $dataTemplate = new Batman_Notification_DataTemplate_ZendView();
        $out = $dataTemplate->setTemplateName('template_name');
        $this->assertTrue(($out instanceof Batman_Notification_DataTemplate_ZendView));
    }
    
    public function testGetTemplateName()
    {
        $dataTemplate = new Batman_Notification_DataTemplate_ZendView();
        $this->assertTrue((null === $dataTemplate->getTemplateName()));
        $dataTemplate->setTemplateName('template_name');
        $this->assertTrue('string' == gettype($dataTemplate->getTemplateName()));
    }
    
    public function testSetTemplatePath()
    {
        $dataTemplate = new Batman_Notification_DataTemplate_ZendView();
        $out = $dataTemplate->setTemplatePath('template_path');
        $this->assertTrue(($out instanceof Batman_Notification_DataTemplate_ZendView));
    }
    
    public function testGetTemplatePath()
    {
        $dataTemplate = new Batman_Notification_DataTemplate_ZendView();
        $this->assertTrue((null === $dataTemplate->getTemplatePath()));
        $dataTemplate->setTemplatePath('template_path');
        $this->assertTrue('string' == gettype($dataTemplate->getTemplatePath()));
    }
}