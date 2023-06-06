<?php

namespace Kanboard\Plugin\Darkboard;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;
// use Kanboard\Plugin\Darkboard\AgeHelper;  // Helper Class and Filename should be exact
// use Kanboard\Helper;  // Add core Helper for using forms etc. inside external templates
// use Kanboard\Model\TaskModel;


class Plugin extends Base
{
    public function initialize()
    {
        // CSS - Asset Hook
        $this->template->hook->attach('template:layout:head', 'Darkboard:darkboard_css');

        // Template Override
        $this->template->setTemplateOverride('board/table_column', 'Darkboard:board/table_column');

        // View - Template Hook
        $this->template->hook->attach(
            'template:config:sidebar', 'Darkboard:config/darkboard_config_sidebar');

        // Extra Page - Routes
        $this->route->addRoute('/darkboard/css', 'DarkboardController', 'createCSS', 'Darkboard');
        $this->route->addRoute('/darkboard/config', 'DarkboardController', 'show', 'Darkboard');
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
    }

    public function getPluginName()
    {
        return 'Darkboard';
    }

    public function getPluginDescription()
    {
        return t('This plugin slighlty changes the dark theme of the Kanboard installation.');
    }

    public function getPluginAuthor()
    {
        return 'Tagirijus';
    }

    public function getPluginVersion()
    {
        return '1.0.0';
    }

    public function getCompatibleVersion()
    {
        // Examples:
        // >=1.0.37
        // <1.0.37
        // <=1.0.37
        return '>=1.2.29';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/Tagirijus/Darkboard';
    }
}
