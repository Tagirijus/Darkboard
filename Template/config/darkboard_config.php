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
                        <?= $this->form->label(t('Smaller scroll bars'), 'global_smaller_scrollbars') ?>
                    </td>
                    <td>
                        <?= $this->form->checkbox('global_smaller_scrollbars', t('enabled'), 1, $global_smaller_scrollbars) ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <?= $this->form->label(t('Colorize scrollbars'), 'global_colorize_scrollbars') ?>
                    </td>
                    <td>
                        <?= $this->form->checkbox('global_colorize_scrollbars', t('enabled'), 1, $global_colorize_scrollbars) ?>
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

            </table>
        </div>

    </div>

    <br>
    <br>



    <!-- Comment -->

    <p>
        <h2><?= t('Comment') ?></h2>
    </p>

    <div class="task-form-container">

        <div class="task-form-main-column">
            <table>

                <tr>
                    <td>
                        <?= $this->form->label(t('Put comments on the task site in the middle of the screen'), 'comment_align_center') ?>
                    </td>
                    <td>
                        <?= $this->form->checkbox('comment_align_center', t('enabled'), 1, $comment_align_center) ?>
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
