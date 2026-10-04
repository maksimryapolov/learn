<?php

use App\Http\Actions\HomeAction;
use Slim\App;

return static function(App $app): void {
    $app->get('/', HomeAction::class);
};
