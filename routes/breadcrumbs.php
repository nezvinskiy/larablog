<?php

Breadcrumbs::for('home', function ($trail) {
    $trail->push(__('Home'), route('home'));
});
