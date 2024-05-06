<div class="page-header">
    <h2><?= t('Darkboard configuration') ?></h2>
</div>
<form method="post" action="<?= $this->url->href('DarkboardController', 'saveConfig', ['plugin' => 'Darkboard']) ?>" autocomplete="off">
    <?= $this->form->csrf() ?>

    <br>



    <!-- Global -->

    <p>
        <h2><?= t('Global') ?></h2>
    </p>

    <div class="task-form-container">

        <div class="task-form-main-column">
            <table>

                <tr>
                    <td>
                        <?= $this->form->label(t('Color theme'), 'global_color_theme') ?>
                    </td>
                    <td>
                        <?= $this->form->select(
                            'global_color_theme',
                            [
                                'dark-default' => 'Dark (default)',
                                'dark-blue' => 'Dark Blue',
                            ],
                            [
                                'global_color_theme' => $global_color_theme
                            ]
                        ) ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <?= $this->form->label(t('Smaller scroll bars'), 'global_smaller_scrollbars') ?>
                    </td>
                    <td>
                        <?= $this->form->checkbox('global_smaller_scrollbars', t('enabled'), 1, $global_smaller_scrollbars) ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <?= $this->form->label(t('Smaller font in the sidebar'), 'global_sidebar_font_smaller') ?>
                    </td>
                    <td>
                        <?= $this->form->checkbox('global_sidebar_font_smaller', t('enabled'), 1, $global_sidebar_font_smaller) ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <?= $this->form->label(t('Bigger font in the tasklist'), 'global_tasklist_font_bigger') ?>
                    </td>
                    <td>
                        <?= $this->form->checkbox('global_tasklist_font_bigger', t('enabled'), 1, $global_tasklist_font_bigger) ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <?= $this->form->label(t('Weaken the tasklist details'), 'global_tasklist_details_weaken') ?>
                    </td>
                    <td>
                        <?= $this->form->checkbox('global_tasklist_details_weaken', t('enabled'), 1, $global_tasklist_details_weaken) ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <?= $this->form->label(t('Give modals a padding'), 'global_modal_padding') ?>
                    </td>
                    <td>
                        <?= $this->form->checkbox('global_modal_padding', t('enabled'), 1, $global_modal_padding) ?>
                    </td>
                </tr>

            </table>
        </div>

    </div>

    <br>
    <br>



    <!-- Board -->

    <p>
        <h2><?= t('Board') ?></h2>
    </p>

    <div class="task-form-container">

        <div class="task-form-main-column">
            <table>

                <tr>
                    <td>
                        <?= $this->form->label(t('Weaken specific columns') . '. ' . t('Write the column numbers comma separated'), 'board_dim_columns') ?>
                    </td>
                    <td>
                        <?= $this->form->text('board_dim_columns', ['board_dim_columns' => $board_dim_columns], [], [
                            'style="width:auto;"'
                        ]) ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <?= $this->form->label(t('CSS for weakening the columns'), 'board_dim_columns_css_weak') ?>
                    </td>
                    <td>
                        <?= $this->form->text('board_dim_columns_css_weak', ['board_dim_columns_css_weak' => $board_dim_columns_css_weak], [], [
                            'style="width:auto;"'
                        ]) ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <?= $this->form->label(t('CSS for hovering the columns'), 'board_dim_columns_css_hover') ?>
                    </td>
                    <td>
                        <?= $this->form->text('board_dim_columns_css_hover', ['board_dim_columns_css_hover' => $board_dim_columns_css_hover], [], [
                            'style="width:auto;"'
                        ]) ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <?= $this->form->label(t('Hide the first unnecessary taskcounter in table header'), 'board_hide_first_taskcounter') ?>
                    </td>
                    <td>
                        <?= $this->form->checkbox('board_hide_first_taskcounter', t('enabled'), 1, $board_hide_first_taskcounter) ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <?= $this->form->label(t('Hide counters in brackets, which are supposed to sum tasks / score over the swimlanes'), 'board_hide_swimlane_counters') ?>
                    </td>
                    <td>
                        <?= $this->form->checkbox('board_hide_swimlane_counters', t('enabled'), 1, $board_hide_swimlane_counters) ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <?= $this->form->label(t('Add left margin on second taskcounter'), 'board_margin_left_on_taskcount') ?>
                    </td>
                    <td>
                        <?= $this->form->checkbox('board_margin_left_on_taskcount', t('enabled'), 1, $board_margin_left_on_taskcount) ?>
                    </td>
                </tr>

            </table>
        </div>

    </div>

    <br>
    <br>



    <!-- Card -->

    <p>
        <h2><?= t('Card') ?></h2>
    </p>

    <div class="task-form-container">

        <div class="task-form-main-column">
            <table>

                <tr>
                    <td>
                        <?= $this->form->label(t('Slight zoom animation on hovering over cards'), 'card_zoom_on_hover') ?>
                    </td>
                    <td>
                        <?= $this->form->checkbox('card_zoom_on_hover', t('enabled'), 1, $card_zoom_on_hover) ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <?= $this->form->label(t('Smaller font for cards in specific columns') . '. ' . t('Write the column numbers comma separated'), 'card_font_smaller') ?>
                    </td>
                    <td>
                        <?= $this->form->text('card_font_smaller', ['card_font_smaller' => $card_font_smaller], [], [
                            'style="width:auto;"'
                        ]) ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <?= $this->form->label(t('More contrast for the font on the cards'), 'card_font_more_contrast') ?>
                    </td>
                    <td>
                        <?= $this->form->checkbox('card_font_more_contrast', t('enabled'), 1, $card_font_more_contrast) ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <?= $this->form->label(t('No border and slightly more padding on cards'), 'card_no_border') ?>
                    </td>
                    <td>
                        <?= $this->form->checkbox('card_no_border', t('enabled'), 1, $card_no_border) ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <?= $this->form->label(t('Change background color alpha on cards') . ' (WIP)', 'card_background_alpha') ?>
                    </td>
                    <td>
                        <?= $this->form->checkbox('card_background_alpha', t('enabled'), 1, $card_background_alpha) ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <?= $this->form->label(t('Make score on card bolder'), 'card_score_bolder') ?>
                    </td>
                    <td>
                        <?= $this->form->checkbox('card_score_bolder', t('enabled'), 1, $card_score_bolder) ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <?= $this->form->label(t('Disable that a click on the card opens the task'), 'card_disable_click_opens_task') ?>
                    </td>
                    <td>
                        <?= $this->form->checkbox('card_disable_click_opens_task', t('enabled'), 1, $card_disable_click_opens_task) ?>
                    </td>
                </tr>

            </table>
        </div>

    </div>

    <br>
    <br>



    <!-- Task -->

    <p>
        <h2><?= t('Task') ?></h2>
    </p>

    <div class="task-form-container">

        <div class="task-form-main-column">
            <table>

                <tr>
                    <td>
                        <?= $this->form->label(t('Put comments on the task site in the middle of the screen'), 'task_comment_align_center') ?>
                    </td>
                    <td>
                        <?= $this->form->checkbox('task_comment_align_center', t('enabled'), 1, $task_comment_align_center) ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <?= $this->form->label(t('Dim the accordion header on the task site, yet maybe also on other places on Kanboard'), 'task_dim_accordion') ?>
                    </td>
                    <td>
                        <?= $this->form->checkbox('task_dim_accordion', t('enabled'), 1, $task_dim_accordion) ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <?= $this->form->label(t('Optimize the contrast for the task title'), 'task_better_contrast_title') ?>
                    </td>
                    <td>
                        <?= $this->form->checkbox('task_better_contrast_title', t('enabled'), 1, $task_better_contrast_title) ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <?= $this->form->label(t('Task summary without border and a bit more padding'), 'task_summary_without_border') ?>
                    </td>
                    <td>
                        <?= $this->form->checkbox('task_summary_without_border', t('enabled'), 1, $task_summary_without_border) ?>
                    </td>
                </tr>

            </table>
        </div>

    </div>

    <br>
    <br>



    <div class="task-form-bottom">
        <?= $this->modal->submitButtons() ?>
    </div>

</form>
