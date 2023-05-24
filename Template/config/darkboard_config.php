<div class="page-header">
    <h2><?= t('Darkboard configuration') ?></h2>
</div>
<form method="post" action="<?= $this->url->href('DarkboardController', 'saveConfig', ['plugin' => 'Darkboard']) ?>" autocomplete="off">
    <?= $this->form->csrf() ?>

    <br>

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

    <p>
        <h2><?= t('Layout') ?></h2>
    </p>

    <div class="task-form-container">

        <div class="task-form-main-column">
            <?= $this->form->label(t('Smaller scroll bars'), 'layout_smaller_scrollbars') ?>
            <?= $this->form->checkbox('layout_smaller_scrollbars', t('enabled'), 1, $layout_smaller_scrollbars) ?>
        </div>

    </div>

    <br>
    <br>

    <p>
        <h2><?= t('Color') ?></h2>
    </p>

    <div class="task-form-container">

        <div class="task-form-main-column">
            <?= $this->form->label(t('Colorize scrollbars'), 'color_scrollbars') ?>
            <?= $this->form->checkbox('color_scrollbars', t('enabled'), 1, $color_scrollbars) ?>
        </div>

    </div>

    <br>
    <br>


    <div class="task-form-bottom">
        <?= $this->modal->submitButtons() ?>
    </div>

</form>
