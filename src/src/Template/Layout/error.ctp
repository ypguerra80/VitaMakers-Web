<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <title>
        <?= __('VitaMakers') ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('jquery-ui.min.css') ?>
    <?= $this->Html->css('jquery.ui.theme.css') ?>
    <?= $this->Html->css('site.css') ?>

    <?= $this->Html->script('jquery-1.12.4.min.js') ?>
    <?= $this->Html->script('jquery-ui-1.10.3.custom.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<nav class="top-bar expanded" data-topbar role="navigation">
    <ul class="title-area large-3 medium-4 columns">
        <li class="name">
            <h1><?= $this->Html->link(__('VitaMakers'), ['controller' => 'Pages', 'action' => 'display']) ?></h1>
        </li>
    </ul>
    <div class="top-bar-section">
        <ul class="right">
            <li><?= $this->element('credentials') ?></li>
        </ul>
    </div>
</nav>
<?= $this->element('actions') ?>
<div class="container clearfix">
    <div id="container">
        <div id="header">
            <h1><?= __('Error') ?></h1>
        </div>
        <div id="content">
            <?= $this->Flash->render() ?>

            <?= $this->fetch('content') ?>
        </div>
        <div id="footer">
            <?= $this->Html2->iconlink(__('Back'), 'ui-icon-arrowreturnthick-1-w', 'javascript:history.back();') ?>
        </div>
    </div>
</div>
</body>
</html>
