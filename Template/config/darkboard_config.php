<div class="page-header">
    <h2><?= t('Darkboard configuration') ?></h2>
</div>
<form method="post" action="<?= $this->url->href('DarkboardController', 'saveConfig', ['plugin' => 'Darkboard']) ?>" autocomplete="off">
    <?= $this->form->csrf() ?>

    <br>



    <!-- Animation -->

    <p>
        <h2><?= t('Animation') ?></h2>
    </p>

    <div class="task-form-container">

        <div class="task-form-main-column">
            <?= $this->form->label(t('Slight zoom animation on hovering over cards'), 'animation_hover_card') ?>
            <?= $this->form->checkbox('animation_hover_card', t('enabled'), 1, $animation_hover_card) ?>
        </div>

    </div>

    <br>
    <br>



    <!-- Layout -->

    <p>
        <h2><?= t('Layout') ?></h2>
    </p>

    <div class="task-form-container">

        <div class="task-form-main-column">
            <?= $this->form->label(t('Smaller scroll bars'), 'layout_smaller_scrollbars') ?>
            <?= $this->form->checkbox('layout_smaller_scrollbars', t('enabled'), 1, $layout_smaller_scrollbars) ?>
        </div>

        <div class="task-form-main-column">
            <?= $this->form->label(t('Put comments on the task site in the middle of the screen'), 'layout_comment_mid') ?>
            <?= $this->form->checkbox('layout_comment_mid', t('enabled'), 1, $layout_comment_mid) ?>
        </div>

    </div>

    <br>
    <br>



    <!-- Font -->

    <p>
        <h2><?= t('Font') ?></h2>
    </p>

    <div class="task-form-container">

        <div class="task-form-main-column">
            <?= $this->form->label(t('Smaller font in the sidebar'), 'font_sidebar_smaller') ?>
            <?= $this->form->checkbox('font_sidebar_smaller', t('enabled'), 1, $font_sidebar_smaller) ?>
        </div>

        <div class="task-form-main-column">
            <?= $this->form->label(t('Smaller font for specific columns'), 'font_smaller_column_1') ?>
            <?= $this->form->checkbox('font_smaller_column_1', '1', 1, $font_smaller_column_1) ?>
            <?= $this->form->checkbox('font_smaller_column_2', '2', 1, $font_smaller_column_2) ?>
            <?= $this->form->checkbox('font_smaller_column_3', '3', 1, $font_smaller_column_3) ?>
            <?= $this->form->checkbox('font_smaller_column_4', '4', 1, $font_smaller_column_4) ?>
            <?= $this->form->checkbox('font_smaller_column_5', '5', 1, $font_smaller_column_5) ?>
            <?= $this->form->checkbox('font_smaller_column_6', '6', 1, $font_smaller_column_6) ?>
        </div>

    </div>

    <br>
    <br>



    <!-- Color -->

    <p>
        <h2><?= t('Color') ?></h2>
    </p>

    <div class="task-form-container">

        <div class="task-form-main-column">
            <?= $this->form->label(t('Colorize scrollbars'), 'color_scrollbars') ?>
            <?= $this->form->checkbox('color_scrollbars', t('enabled'), 1, $color_scrollbars) ?>
        </div>

        <div class="task-form-main-column">
            <?= $this->form->label(t('Weaken specific columns'), 'color_weaken_column_1') ?>
            <?= $this->form->checkbox('color_weaken_column_1', '1', 1, $color_weaken_column_1) ?>
            <?= $this->form->checkbox('color_weaken_column_2', '2', 1, $color_weaken_column_2) ?>
            <?= $this->form->checkbox('color_weaken_column_3', '3', 1, $color_weaken_column_3) ?>
            <?= $this->form->checkbox('color_weaken_column_4', '4', 1, $color_weaken_column_4) ?>
            <?= $this->form->checkbox('color_weaken_column_5', '5', 1, $color_weaken_column_5) ?>
            <?= $this->form->checkbox('color_weaken_column_6', '6', 1, $color_weaken_column_6) ?>
        </div>

    </div>

    <br>
    <br>



    <div class="task-form-bottom">
        <?= $this->modal->submitButtons() ?>
    </div>

</form>
