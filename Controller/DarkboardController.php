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

            // animation
            'animation_hover_card' => $this->configModel->get('darkboard_animation_hover_card', 1),

            // layout
            'layout_smaller_scrollbars' => $this->configModel->get('darkboard_layout_smaller_scrollbars', 1),
            'layout_comment_mid' => $this->configModel->get('darkboard_layout_comment_mid', 1),

            // font
            'font_sidebar_smaller' => $this->configModel->get('darkboard_font_sidebar_smaller', 1),

            // color
            'color_scrollbars' => $this->configModel->get('darkboard_color_scrollbars', 0),
            'color_weaken_column_1' => $this->configModel->get('darkboard_color_weaken_column_1', 0),
            'color_weaken_column_2' => $this->configModel->get('darkboard_color_weaken_column_2', 0),
            'color_weaken_column_3' => $this->configModel->get('darkboard_color_weaken_column_3', 0),
            'color_weaken_column_4' => $this->configModel->get('darkboard_color_weaken_column_4', 0),
            'color_weaken_column_5' => $this->configModel->get('darkboard_color_weaken_column_5', 0),

        ]));
    }

    /**
     * Save the setting for Darkboard.
     */
    public function saveConfig()
    {
        $form = $this->request->getValues();

        $values = [
            // animation
            'darkboard_animation_hover_card' => isset($form['animation_hover_card']) ? 1 : 0,

            // layout
            'darkboard_layout_smaller_scrollbars' => isset($form['layout_smaller_scrollbars']) ? 1 : 0,
            'darkboard_layout_comment_mid' => isset($form['layout_comment_mid']) ? 1 : 0,

            // font
            'darkboard_font_sidebar_smaller' => isset($form['font_sidebar_smaller']) ? 1 : 0,

            // color
            'darkboard_color_scrollbars' => isset($form['color_scrollbars']) ? 1 : 0,
            'darkboard_color_weaken_column_1' => isset($form['color_weaken_column_1']) ? 1 : 0,
            'darkboard_color_weaken_column_2' => isset($form['color_weaken_column_2']) ? 1 : 0,
            'darkboard_color_weaken_column_3' => isset($form['color_weaken_column_3']) ? 1 : 0,
            'darkboard_color_weaken_column_4' => isset($form['color_weaken_column_4']) ? 1 : 0,
            'darkboard_color_weaken_column_5' => isset($form['color_weaken_column_5']) ? 1 : 0,
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
        if ($this->configModel->get('darkboard_animation_hover_card', 1) == 1) {
            $css .= file_get_contents($path . 'darkboard_animation_hover_card.min.css');
        }

        // Layout
        if ($this->configModel->get('darkboard_layout_smaller_scrollbars', 1) == 1) {
            $css .= file_get_contents($path . 'darkboard_layout_smaller_scrollbars.min.css');
        }
        if ($this->configModel->get('darkboard_layout_comment_mid', 1) == 1) {
            $css .= file_get_contents($path . 'darkboard_layout_comment_mid.min.css');
        }

        // font
        if ($this->configModel->get('darkboard_font_sidebar_smaller', 1) == 1) {
            $css .= file_get_contents($path . 'darkboard_font_sidebar_smaller.min.css');
        }

        // color
        if ($this->configModel->get('darkboard_color_scrollbars', 0) == 1) {
            $css .= file_get_contents($path . 'darkboard_color_scrollbars.min.css');
        }
        if ($this->configModel->get('darkboard_color_weaken_column_1', 0) == 1) {
            $css .= file_get_contents($path . 'darkboard_color_weaken_column_1.min.css');
        }
        if ($this->configModel->get('darkboard_color_weaken_column_2', 0) == 1) {
            $css .= file_get_contents($path . 'darkboard_color_weaken_column_2.min.css');
        }
        if ($this->configModel->get('darkboard_color_weaken_column_3', 0) == 1) {
            $css .= file_get_contents($path . 'darkboard_color_weaken_column_3.min.css');
        }
        if ($this->configModel->get('darkboard_color_weaken_column_4', 0) == 1) {
            $css .= file_get_contents($path . 'darkboard_color_weaken_column_4.min.css');
        }
        if ($this->configModel->get('darkboard_color_weaken_column_5', 0) == 1) {
            $css .= file_get_contents($path . 'darkboard_color_weaken_column_5.min.css');
        }

        return $this->response->css($css);
    }
}