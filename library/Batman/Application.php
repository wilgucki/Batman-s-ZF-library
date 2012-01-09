<?php
class Batman_Application extends Zend_Application
{
    /**
     * @var null|Zend_Cache_Core
     */
    private $_cache = null;

    /**
     * @var null|string
     */
    private $_configFile = null;

    /**
     * @param string $file
     */
    public function setConfigFile($file)
    {
        $this->_configFile = $file;
    }

    /**
     * @return null|string
     */
    public function getConfigFile()
    {
        if($this->_configFile === null) {
            $this->_configFile = APPLICATION_PATH . '/configs/application.ini';
        }
        return $this->_configFile;
    }

    /**
     * @param Zend_Cache_Core $cache
     */
    public function setCache(Zend_Cache_Core $cache)
    {
        $this->_cache = $cache;
    }

    /**
     * @return null|Zend_Cache_Core
     */
    public function getCache()
    {
        if($this->_cache === null) {
            $this->_cache = Zend_Cache::factory(
                'File',
                'File',
                array(
                    'master_files' => array($this->getConfigFile()),
                    'automatic_serialization' => true,
                    'lifetime' => null
                ),
                array(
                    'cache_dir' => APPLICATION_PATH . '/data/cache'
                )
            );
        }
        return $this->_cache;
    }

    protected function _loadConfig($file)
    {
        if($this->_configFile === null) {
            $this->setConfigFile($file);
        }

        $cache = $this->getCache();
        $config = $cache->load('config_cache');
        if(!$config) {
            $config = parent::_loadConfig($file);
            $cache->save($config, 'config_cache');
        }

        return $config;
    }
}