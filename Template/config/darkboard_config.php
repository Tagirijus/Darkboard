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
            <?= $this->form->label(t('Smaller font for cards in specific columns') . '. ' . t('Write the column numbers comma separated'), 'font_smaller_card_in_column') ?>
            <?= $this->form->text('font_smaller_card_in_column', ['font_smaller_card_in_column' => $font_smaller_card_in_column]) ?>
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
            <?= $this->form->label(t('Weaken specific columns') . '. ' . t('Write the column numbers comma separated'), 'color_dim_columns') ?>
            <?= $this->form->text('color_dim_columns', ['color_dim_columns' => $color_dim_columns]) ?>
        </div>

    </div>

    <br>
    <br>



    <div class="task-form-bottom">
        <?= $this->modal->submitButtons() ?>
    </div>

</form>
