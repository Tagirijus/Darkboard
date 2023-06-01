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

            // global
            'global_smaller_scrollbars' => $this->configModel->get('darkboard_global_smaller_scrollbars', 1),
            'global_sidebar_font_smaller' => $this->configModel->get('darkboard_global_sidebar_font_smaller', 1),
            'global_tasklist_font_bigger' => $this->configModel->get('darkboard_global_tasklist_font_bigger', 1),

            // board
            'board_dim_columns' => $this->configModel->get('darkboard_board_dim_columns', ''),
            'board_hide_first_taskcounter' => $this->configModel->get('darkboard_board_hide_first_taskcounter', 1),
            'board_hide_swimlane_counters' => $this->configModel->get('darkboard_board_hide_swimlane_counters', 1),

            // card
            'card_zoom_on_hover' => $this->configModel->get('darkboard_card_zoom_on_hover', 1),
            'card_font_smaller' => $this->configModel->get('darkboard_card_font_smaller', ''),

            // task
            'task_comment_align_center' => $this->configModel->get('darkboard_task_comment_align_center', 1),
            'task_dim_accordion' => $this->configModel->get('darkboard_task_dim_accordion', 1),

        ]));
    }

    /**
     * Save the setting for Darkboard.
     */
    public function saveConfig()
    {
        $form = $this->request->getValues();

        $values = [
            // global
            'darkboard_global_smaller_scrollbars' => isset($form['global_smaller_scrollbars']) ? 1 : 0,
            'darkboard_global_sidebar_font_smaller' => isset($form['global_sidebar_font_smaller']) ? 1 : 0,
            'darkboard_global_tasklist_font_bigger' => isset($form['global_tasklist_font_bigger']) ? 1 : 0,

            // board
            'darkboard_board_dim_columns' => $form['board_dim_columns'],
            'darkboard_board_hide_first_taskcounter' => isset($form['board_hide_first_taskcounter']) ? 1 : 0,
            'darkboard_board_hide_swimlane_counters' => isset($form['board_hide_swimlane_counters']) ? 1 : 0,

            // card
            'darkboard_card_zoom_on_hover' => isset($form['card_zoom_on_hover']) ? 1 : 0,
            'darkboard_card_font_smaller' => $form['card_font_smaller'],

            // comments
            'darkboard_task_comment_align_center' => isset($form['task_comment_align_center']) ? 1 : 0,
            'darkboard_task_dim_accordion' => isset($form['task_dim_accordion']) ? 1 : 0,

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

        $css .= $this->createCSSGlobal($path . 'global/');
        $css .= $this->createCSSBoard($path . 'board/');
        $css .= $this->createCSSCard($path . 'card/');
        $css .= $this->createCSSTask($path . 'task/');

        return $this->response->css($css);
    }

    /**
     * Create the CSS part for the global.
     *
     * @param string $path
     * @return string
     */
    public function createCSSGlobal($path)
    {
        $css = '';
        if ($this->configModel->get('darkboard_global_smaller_scrollbars', 1) == 1) {
            $css .= file_get_contents($path . 'global_smaller_scrollbars.min.css');
        }
        if ($this->configModel->get('darkboard_global_sidebar_font_smaller', 1) == 1) {
            $css .= file_get_contents($path . 'global_sidebar_font_smaller.min.css');
        }
        if ($this->configModel->get('darkboard_global_tasklist_font_bigger', 1) == 1) {
            $css .= file_get_contents($path . 'global_tasklist_font_bigger.min.css');
        }
        return $css;
    }

    /**
     * Create the CSS part for the board.
     *
     * @param string $path
     * @return string
     */
    public function createCSSBoard($path)
    {
        $css = '';
        $css .= $this->cssBoardDimColumns($path);
        if ($this->configModel->get('darkboard_board_hide_first_taskcounter', 1) == 1) {
            $css .= file_get_contents($path . 'board_hide_first_taskcounter.min.css');
        }
        if ($this->configModel->get('darkboard_board_hide_swimlane_counters', 1) == 1) {
            $css .= file_get_contents($path . 'board_hide_swimlane_counters.min.css');
        }
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
    public function cssBoardDimColumns($path)
    {
        $css = '';
        $user = explode(',', $this->configModel->get('darkboard_board_dim_columns', ''));
        foreach ($user as $column) {
            $col = trim($column);
            if (is_numeric($col)) {
                $css .= str_replace('$NUMBER$', $col, file_get_contents($path . 'board_dim_columns.min.css'));
            }
        }
        return $css;
    }

    /**
     * Create the CSS part for the cards.
     *
     * @param string $path
     * @return string
     */
    public function createCSSCard($path)
    {
        $css = '';
        if ($this->configModel->get('darkboard_card_zoom_on_hover', 1) == 1) {
            $css .= file_get_contents($path . 'card_zoom_on_hover.min.css');
        }
        $css .= $this->cssCardFontSmallerColumns($path);
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
    public function cssCardFontSmallerColumns($path)
    {
        $css = '';
        $user = explode(',', $this->configModel->get('darkboard_card_font_smaller', ''));
        foreach ($user as $column) {
            $col = trim($column);
            if (is_numeric($col)) {
                $css .= str_replace('$NUMBER$', $col, file_get_contents($path . 'card_font_smaller.min.css'));
            }
        }
        return $css;
    }

    /**
     * Create the CSS part for the task site.
     *
     * @param string $path
     * @return string
     */
    public function createCSSTask($path)
    {
        $css = '';
        if ($this->configModel->get('darkboard_task_comment_align_center', 1) == 1) {
            $css .= file_get_contents($path . 'task_comment_align_center.min.css');
        }
        if ($this->configModel->get('darkboard_task_dim_accordion', 1) == 1) {
            $css .= file_get_contents($path . 'task_dim_accordion.min.css');
        }
        return $css;
    }
}
