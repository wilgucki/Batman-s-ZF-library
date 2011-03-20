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
    
    public function testRenderWithValidData()
    {
        $dataTemplate = new Batman_Notification_DataTemplate_ZendView();
        $dataTemplate->setTemplateName('test-template.phtml');
        $dataTemplate->setTemplatePath(APPLICATION_PATH . '/../tests/library/Batman/_files');
        $out = $dataTemplate->render();
        $this->assertTrue('string' === gettype($out));
    }
    
    public function testRenderWithNoTemplateName()
    {
        $dataTemplate = new Batman_Notification_DataTemplate_ZendView();
        $dataTemplate->setTemplatePath(APPLICATION_PATH . '/../tests/library/Batman/_files');
        try {
            $dataTemplate->render();
        } catch(Exception $e) {
            return;
        }

        $this->fail('Exception hasn\'t been raised');
    }
    
    public function testRenderWithNoTemplatePath()
    {
        $dataTemplate = new Batman_Notification_DataTemplate_ZendView();
        $dataTemplate->setTemplateName('test-template.phtml');
        try {
            $dataTemplate->render();
        } catch(Exception $e) {
            return;
        }

        $this->fail('Exception hasn\'t been raised');
    }
}