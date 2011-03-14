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
 * @version 0.1.1
 */
abstract class Batman_Notification_Sender_Abstract
{
    /**
     * Template file name
     * 
     * @var string
     */
    protected $_templateName = null;

    /**
     * Template path
     *
     * @var string
     */
    protected $_templatePath = null;

    /**
     * @var Zend_View_Interface
     */
    protected $_view = null;

    /**
     * @param mixed $options
     */
    public function __construct($options = null)
    {
        if($options instanceof Zend_Config) {
            $this->setOptions($options->toArray());
        }
        elseif(is_array($options)) {
            $this->setOptions($options);
        }
    }

    /**
     * Assign variable to Zend_View object (@see Zend_View_Interface)
     *
     * @param string $name Variable name
     * @param string $value Variable value
     * @return void
     */
    public function __set($name, $value)
    {
        $this->getView()->$name = $value;
    }

    /**
     * Return variable value
     *
     * @param string $name Variable name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->getView()->$name;
    }

    /**
     * Set options from options array
     *
     * @throws Batman_Notification_Exception
     * @param array|null $options
     * @return Batman_Notification_Sender_Abstract
     */
    public function setOptions(array $options = null)
    {
        foreach($options as $option => $value) {

            if($option == 'templateData') {
                $prefix = 'add';
            }
            else {
                $prefix = 'set';
            }

            $method = $prefix . ucfirst($option);

            if(!method_exists($this, $method)) {
                throw new Batman_Notification_Exception('Invalid method: ' . $method);
            }

            $this->$method($value);
        }

        return $this;
    }

    /**
     * Set options from Zend_Config object
     *
     * @param Zend_Config $config
     * @return Batman_Notification_Sender_Abstract
     */
    public function setConfig(Zend_Config $config)
    {
        $this->setOptions($config->toArray());
        return $this;
    }

    /**
     * Set template file name
     *
     * @param string $template
     * @return Batman_Notification_Sender_Abstract
     */
    public function setTemplateName($template)
    {
        $this->_templateName = $template;
        return $this;
    }

    /**
     * Get template file name
     *
     * @return null|string
     */
    public function getTemplateName()
    {
        return $this->_templateName;
    }

    /**
     * Set template path
     *
     * @param string $path
     * @return Batman_Notification_Sender_Abstract
     */
    public function setTemplatePath($path)
    {
        $this->_templatePath = $path;
        return $this;
    }

    /**
     * Get template path
     *
     * @return null|string
     */
    public function getTemplatePath()
    {
        return $this->_templatePath;
    }

    /**
     * Assign Zend_View variables (@see Zend_View_Interface)
     * @param array $data
     * @return Batman_Notification_Sender_Abstract
     */
    public function addTemplateData(array $data)
    {
        $this->getView()->assign($data);
        return $this;
    }

    /**
     * Set custom Zend_View object (@see Zend_View_Interface)
     * 
     * @param Zend_View_Interface $view
     * @return Batman_Notification_Sender_Abstract
     */
    public function setView(Zend_View_Interface $view)
    {
        $this->_view = $view;
        return $this;
    }

    /**
     * Get Zend_View object (@see Zend_View_Interface)
     *
     * @return Zend_View_Interface
     */
    public function getView()
    {
        if($this->_view === null) {
            $this->_view = new Zend_View();
        }
        return $this->_view;
    }

    /**
     * Render output based on template file and assigned variables
     *
     * @throws Batman_Notification_Exception
     * @return string
     */
    protected function _render()
    {
        if($this->getTemplateName() === null) {
            throw new Batman_Notification_Exception('Invalid template file');
        }

        if($this->getTemplatePath() === null) {
            throw new Batman_Notification_Exception('Invalid template path');
        }

        $view = $this->getView();

        if(!in_array($this->getTemplatePath(), $view->getScriptPaths())) {
            $view->addScriptPath($this->getTemplatePath());
        }

        return $view->render($this->getTemplateName());
    }

    abstract function send();
}