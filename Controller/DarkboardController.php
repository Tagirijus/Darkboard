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
            'global_color_theme' => $this->configModel->get('darkboard_global_color_theme', 'dark-default'),
            'global_smaller_scrollbars' => $this->configModel->get('darkboard_global_smaller_scrollbars', 1),
            'global_sidebar_font_smaller' => $this->configModel->get('darkboard_global_sidebar_font_smaller', 1),
            'global_tasklist_font_bigger' => $this->configModel->get('darkboard_global_tasklist_font_bigger', 1),
            'global_tasklist_details_weaken' => $this->configModel->get('darkboard_global_tasklist_details_weaken', 1),
            'global_modal_padding' => $this->configModel->get('darkboard_global_modal_padding', 1),

            // board
            'board_dim_columns' => $this->configModel->get('darkboard_board_dim_columns', ''),
            'board_hide_first_taskcounter' => $this->configModel->get('darkboard_board_hide_first_taskcounter', 1),
            'board_hide_swimlane_counters' => $this->configModel->get('darkboard_board_hide_swimlane_counters', 1),
            'board_margin_left_on_taskcount' => $this->configModel->get('darkboard_board_margin_left_on_taskcount', 1),

            // card
            'card_zoom_on_hover' => $this->configModel->get('darkboard_card_zoom_on_hover', 1),
            'card_font_smaller' => $this->configModel->get('darkboard_card_font_smaller', ''),
            'card_font_more_contrast' => $this->configModel->get('darkboard_card_font_more_contrast', 1),
            'card_no_border' => $this->configModel->get('darkboard_card_no_border', 1),
            'card_background_alpha' => $this->configModel->get('darkboard_card_background_alpha', 1),

            // task
            'task_comment_align_center' => $this->configModel->get('darkboard_task_comment_align_center', 1),
            'task_dim_accordion' => $this->configModel->get('darkboard_task_dim_accordion', 1),
            'task_better_contrast_title' => $this->configModel->get('darkboard_task_better_contrast_title', 1),
            'task_summary_without_border' => $this->configModel->get('darkboard_task_summary_without_border', 1),

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
            'darkboard_global_color_theme' => $form['global_color_theme'],
            'darkboard_global_smaller_scrollbars' => isset($form['global_smaller_scrollbars']) ? 1 : 0,
            'darkboard_global_sidebar_font_smaller' => isset($form['global_sidebar_font_smaller']) ? 1 : 0,
            'darkboard_global_tasklist_font_bigger' => isset($form['global_tasklist_font_bigger']) ? 1 : 0,
            'darkboard_global_tasklist_details_weaken' => isset($form['global_tasklist_details_weaken']) ? 1 : 0,
            'darkboard_global_modal_padding' => isset($form['global_modal_padding']) ? 1 : 0,

            // board
            'darkboard_board_dim_columns' => $form['board_dim_columns'],
            'darkboard_board_hide_first_taskcounter' => isset($form['board_hide_first_taskcounter']) ? 1 : 0,
            'darkboard_board_hide_swimlane_counters' => isset($form['board_hide_swimlane_counters']) ? 1 : 0,
            'darkboard_board_margin_left_on_taskcount' => isset($form['board_margin_left_on_taskcount']) ? 1 : 0,

            // card
            'darkboard_card_zoom_on_hover' => isset($form['card_zoom_on_hover']) ? 1 : 0,
            'darkboard_card_font_smaller' => $form['card_font_smaller'],
            'darkboard_card_font_more_contrast' => isset($form['card_font_more_contrast']) ? 1 : 0,
            'darkboard_card_no_border' => isset($form['card_no_border']) ? 1 : 0,
            'darkboard_card_background_alpha' => isset($form['card_background_alpha']) ? 1 : 0,

            // task
            'darkboard_task_comment_align_center' => isset($form['task_comment_align_center']) ? 1 : 0,
            'darkboard_task_dim_accordion' => isset($form['task_dim_accordion']) ? 1 : 0,
            'darkboard_task_better_contrast_title' => isset($form['task_better_contrast_title']) ? 1 : 0,
            'darkboard_task_summary_without_border' => isset($form['task_summary_without_border']) ? 1 : 0,

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
        $theme = $this->configModel->get('darkboard_global_color_theme', 'dark-default');
        $theme_path = $path . '../theme/' . $theme . '.min.css';
        if (file_exists($theme_path)) {
            $css .= file_get_contents($theme_path);
        }
        if ($this->configModel->get('darkboard_global_color_theme', 'dark-default') == 1) {
        }
        if ($this->configModel->get('darkboard_global_smaller_scrollbars', 1) == 1) {
            $css .= file_get_contents($path . 'global_smaller_scrollbars.min.css');
        }
        if ($this->configModel->get('darkboard_global_sidebar_font_smaller', 1) == 1) {
            $css .= file_get_contents($path . 'global_sidebar_font_smaller.min.css');
        }
        if ($this->configModel->get('darkboard_global_tasklist_font_bigger', 1) == 1) {
            $css .= file_get_contents($path . 'global_tasklist_font_bigger.min.css');
        }
        if ($this->configModel->get('darkboard_global_tasklist_details_weaken', 1) == 1) {
            $css .= file_get_contents($path . 'global_tasklist_details_weaken.min.css');
        }
        if ($this->configModel->get('darkboard_global_modal_padding', 1) == 1) {
            $css .= file_get_contents($path . 'global_modal_padding.min.css');
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
        if ($this->configModel->get('darkboard_board_margin_left_on_taskcount', 1) == 1) {
            $css .= file_get_contents($path . 'board_margin_left_on_taskcount.min.css');
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
        if ($this->configModel->get('darkboard_card_font_more_contrast', 1) == 1) {
            $css .= file_get_contents($path . 'card_font_more_contrast.min.css');
        }
        if ($this->configModel->get('darkboard_card_no_border', 1) == 1) {
            $css .= file_get_contents($path . 'card_no_border.min.css');
        }
        if ($this->configModel->get('darkboard_card_background_alpha', 1) == 1) {
            $css .= file_get_contents($path . 'card_background_alpha.min.css');
        }
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
        if ($this->configModel->get('darkboard_task_better_contrast_title', 1) == 1) {
            $css .= file_get_contents($path . 'task_better_contrast_title.min.css');
        }
        if ($this->configModel->get('darkboard_task_summary_without_border', 1) == 1) {
            $css .= file_get_contents($path . 'task_summary_without_border.min.css');
        }
        return $css;
    }
}
