<?php

namespace Kanboard\Plugin\Darkboard\Controller;




class DarkboardController extends \Kanboard\Controller\PluginController
{
    /**
     * Settins page for the Darkboard plugin.
     *
     * @return HTML response
     */
    public function show()
    {
        $this->response->html($this->helper->layout->config('Darkboard:config/darkboard_config', [
            'title' => t('Darkboard') . ' &gt; ' . t('Settings'),
            'card_hover_animation_zoom' => $this->configModel->get('darkboard_card_hover_animation_zoom', 1),
            'smaller_scrollbars' => $this->configModel->get('darkboard_smaller_scrollbars', 1),
        ]));
    }

    /**
     * Save the setting for Darkboard.
     */
    public function saveConfig()
    {
        $form = $this->request->getValues();

        $values = [
            'darkboard_card_hover_animation_zoom' => isset($form['card_hover_animation_zoom']) ? 1 : 0,
            'darkboard_smaller_scrollbars' => isset($form['smaller_scrollbars']) ? 1 : 0,
        ];

        $this->languageModel->loadCurrentLanguage();

        if ($this->configModel->save($values)) {
            $this->flash->success(t('Settings saved successfully.'));
        } else {
            $this->flash->failure(t('Unable to save your settings.'));
        }

        return $this->response->redirect($this->helper->url->to('DarkboardController', 'show', ['plugin' => 'Darkboard']), true);
    }

    /**
     * Create a combined CSS from the CSS modules
     * with the given user config.
     *
     * @return CSS Response
     */
    public function createCSS()
    {
        $path = __DIR__ . '/../Assets/css/';
        $css = '';

        // Animation
        if ($this->configModel->get('darkboard_card_hover_animation_zoom', 1) == 1) {
            $css .= file_get_contents($path . 'darkboard_card_hover_animation_zoom.min.css');
        }

        // Layout
        if ($this->configModel->get('darkboard_smaller_scrollbars', 1) == 1) {
            $css .= file_get_contents($path . 'darkboard_smaller_scrollbars.min.css');
        }

        return $this->response->css($css);
    }
}