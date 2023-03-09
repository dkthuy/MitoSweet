<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'git@github.com:dkthuy/MitoSweet.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('159.223.62.192')
    ->set('remote_user', 'root')
    ->set('identity_file', '~/.ssh/id_rsa')
    ->set('deploy_path', '/var/www/MitoSweet');

// Hooks

after('deploy:failed', 'deploy:unlock');
