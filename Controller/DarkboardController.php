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
            'font_smaller_card_in_column' => $this->configModel->get('darkboard_font_smaller_card_in_column', ''),

            // color
            'color_scrollbars' => $this->configModel->get('darkboard_color_scrollbars', 0),
            'color_dim_columns' => $this->configModel->get('darkboard_color_dim_columns', ''),

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
            'darkboard_font_smaller_card_in_column' => $form['font_smaller_card_in_column'],

            // color
            'darkboard_color_scrollbars' => isset($form['color_scrollbars']) ? 1 : 0,
            'darkboard_color_dim_columns' => $form['color_dim_columns'],
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

        $css .= $this->createCSSAnimation($path);
        $css .= $this->createCSSLayout($path);
        $css .= $this->createCSSFont($path);
        $css .= $this->createCSSColor($path);

        return $this->response->css($css);
    }

    /**
     * Create the CSS part for the animations.
     *
     * @param string $path
     * @return string
     */
    public function createCSSAnimation($path)
    {
        $css = '';
        if ($this->configModel->get('darkboard_animation_hover_card', 1) == 1) {
            $css .= file_get_contents($path . 'darkboard_animation_hover_card.min.css');
        }
        return $css;
    }

    /**
     * Create the CSS part for the layout.
     *
     * @param string $path
     * @return string
     */
    public function createCSSLayout($path)
    {
        $css = '';
        if ($this->configModel->get('darkboard_layout_smaller_scrollbars', 1) == 1) {
            $css .= file_get_contents($path . 'darkboard_layout_smaller_scrollbars.min.css');
        }
        if ($this->configModel->get('darkboard_layout_comment_mid', 1) == 1) {
            $css .= file_get_contents($path . 'darkboard_layout_comment_mid.min.css');
        }
        return $css;
    }

    /**
     * Create the CSS part for the font.
     *
     * @param string $path
     * @return string
     */
    public function createCSSFont($path)
    {
        $css = '';
        if ($this->configModel->get('darkboard_font_sidebar_smaller', 1) == 1) {
            $css .= file_get_contents($path . 'darkboard_font_sidebar_smaller.min.css');
        }
        $css .= $this->cssFontSmallerColumns($path);
        return $css;
    }

    /**
     * Generate the Font-Smaller-Columns CSS with the given user
     * config string, which basically is a comma separated
     * string containing the column numbers.
     *
     * @param  string $path
     * @return string
     */
    public function cssFontSmallerColumns($path)
    {
        $css = '';
        $user = explode(',', $this->configModel->get('darkboard_font_smaller_card_in_column', ''));
        foreach ($user as $column) {
            $col = trim($column);
            if (is_numeric($col)) {
                $css .= str_replace('$NUMBER$', $col, file_get_contents($path . 'darkboard_font_smaller_card_in_column.min.css'));
            }
        }
        return $css;
    }

    /**
     * Create the CSS part for the colors.
     *
     * @param string $path
     * @return string
     */
    public function createCSSColor($path)
    {
        $css = '';
        if ($this->configModel->get('darkboard_color_scrollbars', 0) == 1) {
            $css .= file_get_contents($path . 'darkboard_color_scrollbars.min.css');
        }
        $css .= $this->cssColorDimColumns($path);
        return $css;
    }

    /**
     * Generate the Color-Dim-Columns CSS with the given user
     * config string, which basically is a comma separated
     * string containing the column numbers.
     *
     * @param  string $path
     * @return string
     */
    public function cssColorDimColumns($path)
    {
        $css = '';
        $user = explode(',', $this->configModel->get('darkboard_color_dim_columns', ''));
        foreach ($user as $column) {
            $col = trim($column);
            if (is_numeric($col)) {
                $css .= str_replace('$NUMBER$', $col, file_get_contents($path . 'darkboard_color_dim_columns.min.css'));
            }
        }
        return $css;
    }
}