<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div id="menu-header" class="">
    <a id="menu-header-button" href="javaScript:void(0);">
        <div id="menu-header-button-icon" class="">
            <div class="colored"></div>
            <div class="empty"></div>
            <div class="colored"></div>
            <div class="empty"></div>
            <div class="colored"></div>
        </div>
    </a>
    <script>
        $(function () {
            $("#menu-header-button-icon")
                .click(function (e) {
                    e.preventDefault();

                    var menu = $("#actions-sidebar");
                    if (menu.hasClass("main-menu"))
                        menu.removeClass("main-menu");
                    else
                        menu.addClass("main-menu");

                    var $this = $(this);
                    if ($this.hasClass('inverted'))
                        $this.removeClass('inverted');
                    else
                        $this.addClass('inverted');
                });
        });
    </script>
</div>
<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <!--        <li class="heading">--><? //= __('Actions') ?><!--</li>-->

        <?php if($loggedUser && $loggedUser['accountant'] == 0): ?>
        <strong>App Operations</strong>
            <hr>

        <li><?= $this->Html2->iconlink(__('List Publicities'), 'ui-icon-search', ['controller' => 'Publicities', 'action' => 'index']) ?></li>

        <li><?= $this->Html2->iconlink(__('List Registrations'), 'ui-icon-search', ['controller' => 'Registrations', 'action' => 'index']) ?></li>

        <li><?= $this->Html2->iconlink(__('List Concerts'), 'ui-icon-search', ['controller' => 'Events', 'action' => 'index']) ?></li>

        <li><?= $this->Html2->iconlink(__('List Event Dates'), 'ui-icon-search', ['controller' => 'EventDates', 'action' => 'index']) ?></li>

        <li><?= $this->Html2->iconlink(__('List Event Weekly Schedules'), 'ui-icon-search', ['controller' => 'EventWeeklySchedules', 'action' => 'index']) ?></li>

        <li><?= $this->Html2->iconlink(__('List Musical Genre'), 'ui-icon-search', ['controller' => 'MusicalCategories', 'action' => 'index']) ?></li>

        <li><?= $this->Html2->iconlink(__('List Locals'), 'ui-icon-search', ['controller' => 'Locals', 'action' => 'index']) ?></li>



        <?php
            if ($loggedUser['admin'] == 1) {
        ?>

            <li><?= $this->Html2->iconlink(__('List Categories'), 'ui-icon-search', ['controller' => 'Categories', 'action' => 'index']) ?></li>

            <li><?= $this->Html2->iconlink(__('List Countries'), 'ui-icon-search', ['controller' => 'Countries', 'action' => 'index']) ?></li>

            <li><?= $this->Html2->iconlink(__('List Users'), 'ui-icon-search', ['controller' => 'Users', 'action' => 'index']) ?></li>
            
          
            
        <?php
            }
        ?>
        <strong>Exports Actions</strong>
            <hr>
        <li><?= $this->Html2->iconlink(__('Export'), 'ui-icon-transfer-e-w', ['controller' => 'Exports', 'action' => 'index']) ?></li>
        <?php endif; ?>
        <?php
            if ($loggedUser && ($loggedUser['admin'] == 1 || $loggedUser['accountant'] == 1)) {
        ?>

            <strong>Accounting</strong>
            <hr>
            <li><?= $this->Html2->iconlink(__('Generate Bill'), 'ui-icon-search', ['controller' => 'Bills', 'action' => 'emission']) ?></li>
            <li><?= $this->Html2->iconlink(__('Collect Bill'), 'ui-icon-search', ['controller' => 'Bills', 'action' => 'collection']) ?></li>
            <li><?= $this->Html2->iconlink(__('Spends'), 'ui-icon-search', ['controller' => 'Spends', 'action' => 'index']) ?></li>
            <li><?= $this->Html2->iconlink(__('Main Report'), 'ui-icon-search', ['controller' => 'Reports', 'action' => 'main']) ?></li>
            <li><?= $this->Html2->iconlink(__('Balance Report'), 'ui-icon-search', ['controller' => 'Reports', 'action' => 'balance']) ?></li>
        <?php
            }
        ?>
    </ul>
</nav>


