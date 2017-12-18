<?php

// configure your app for the production environment
use Dflydev\Provider\DoctrineOrm\DoctrineOrmServiceProvider;
use Silex\Provider\SecurityServiceProvider;
use Symfony\Component\Security\Core\Encoder\PlaintextPasswordEncoder;
use Silex\Provider\FormServiceProvider;
use Silex\Provider\CsrfServiceProvider;

$app['locale'] = 'en_en';
$app['twig.path'] = array(__DIR__.'/../templates');
$app['twig.options'] = array('cache' => __DIR__.'/../var/cache/twig');

$app->register(
    new Silex\Provider\DoctrineServiceProvider(),
    [
        'db.options' => [
            'driver'   => 'pdo_mysql',
            'dbname'   => 'michelm_tequiladb',
            'host'     => 'wf3.progweb.fr',
            'user'     => 'michelm',
            'password' => 'webforce3',
            'driverOptions' =>
            [
                1002 => 'SET NAMES utf8'
            ]
        ]
    ]
);

$app->register(
    new DoctrineOrmServiceProvider(),
    [
        'orm.proxies.dir' => sys_get_temp_dir(),
        'orm.em.options' => [
            'mappings' => [
                [
                    'type' => 'annotation',
                    'namespace' => 'Models',
                    'path' => __DIR__.'/../src/Models'
                ]
            ]
        ]
    ]
);

$app->register(
    new SecurityServiceProvider(),
    [
        'security.firewalls'=> [
            'admin'=>[                   // Name of firewall
                'pattern'=>'^/',    // firewall scope
                'anonymous' => true,

                'logout' => [
                    'logout_path'=> '/logout',
                    'invalidate_session' => true,
                    'target_url' => '/'
                ],
                'form' => [
                    'login_path' => '/signin',
                    'check_path' =>'/login_check'
                ]
            ]
        ],


        'security.default_encoder'=> function(){      // it's a service = imutable and share in all application
            return new PlaintextPasswordEncoder();
        },
    ]

);

$app->register(new Silex\Provider\ValidatorServiceProvider());
$app->register(new FormServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'translator.domains' => array(),
));
$app->register(new CsrfServiceProvider());
$app->register(new Silex\Provider\SessionServiceProvider());


$app->register(new \Silex\Provider\SessionServiceProvider());

