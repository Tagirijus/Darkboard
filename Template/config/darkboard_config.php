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
            <?= $this->form->label(t('Slight zoom animation on hovering over cards'), 'card_hover_animation_zoom') ?>
            <?= $this->form->checkbox('card_hover_animation_zoom', t('enabled'), 1, $card_hover_animation_zoom) ?>
        </div>

    </div>

    <br>
    <br>

    <p>
        <h2><?= t('Layout') ?></h2>
    </p>

    <div class="task-form-container">

        <div class="task-form-main-column">
            <?= $this->form->label(t('Smaller scroll bars'), 'smaller_scrollbars') ?>
            <?= $this->form->checkbox('smaller_scrollbars', t('enabled'), 1, $smaller_scrollbars) ?>
        </div>

    </div>

    <br>
    <br>


    <div class="task-form-bottom">
        <?= $this->modal->submitButtons() ?>
    </div>

</form>
