<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'among-tusk');

// Project repository
set('repository', 'git@github.com:cranch-crown/among-tusk.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
add('shared_files', []);
add('shared_dirs', ['vendor']);

// Writable dirs by web server
add('writable_dirs', ['storage']);


// Hosts
host('160.251.55.88')
    ->user('login_user')
    ->identityFile('~/.ssh/id_ed25519')
    ->set('deploy_path', '/var/www/{{application}}');

// Tasks

//task('build', function () {
//    run('cd {{release_path}} && build');
//});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

//before('deploy:symlink', 'artisan:migrate');

