<?php
/**
 * @var \App\View\AppView $this
 */

if ($loggedUser) {
    echo $this->Html->link(__('Logout') . ' ' . $loggedUser['username'], ['controller' => 'Users', 'action' => 'logout'], ['class' => 'credential-link']);
} else {
    echo $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login'], ['class' => 'credential-link']);
}