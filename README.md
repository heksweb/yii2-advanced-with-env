<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">App based on Yii 2 Advanced Project Template</h1>
    <br>
</p>

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![build](https://github.com/yiisoft/yii2-app-advanced/workflows/build/badge.svg)](https://github.com/yiisoft/yii2-app-advanced/actions?query=workflow%3Abuild)

DIRECTORY STRUCTURE
-------------------

```
app
    common
        config/              contains shared configurations
        mail/                contains view files for e-mails
        models/              contains model classes used in both backend and frontend
        tests/               contains tests for common classes    
    console
        config/              contains console configurations
        controllers/         contains console controllers (commands)
        migrations/          contains database migrations
        models/              contains console-specific model classes
        runtime/             contains files generated during runtime
    admin
        assets/              contains application assets such as JavaScript and CSS
        config/              contains backend configurations
        controllers/         contains Web controller classes
        models/              contains backend-specific model classes
        runtime/             contains files generated during runtime
        tests/               contains tests for backend application    
        views/               contains view files for the Web application
        web/                 contains the entry script and Web resources
    site
        assets/              contains application assets such as JavaScript and CSS
        config/              contains frontend configurations
        controllers/         contains Web controller classes
        models/              contains frontend-specific model classes
        runtime/             contains files generated during runtime
        tests/               contains tests for frontend application
        views/               contains view files for the Web application
        web/                 contains the entry script and Web resources
        widgets/             contains frontend widgets
    vendor/                  contains dependent 3rd-party packages
    environments/            contains environment-based overrides
env
    dev
        certificates/        contains local certificates for https connection
        dumps/               contains mysql dumps files
        mysql/               contains mysql dbbase files
        nginx/               contains configuration files for nginx server
        php/                 contains configuration files for php docker image
    prod
    test
```

DEPLOY DEV ENVIRONMENT
---------------------------

1. `cd env/dev/certificates` and Generate certificates "admin.api.loc" and "site.api.loc" using `mkcert`
   1. `mkcert admin.api.loc`
   2. `mkcert site.api.loc`
2. `cd .. && cp .env.example .env` and change params in .env file for environment, if you need in this action
3. `cd ../../app && cp .env.example .env` and change params in .env file for app, if you need in this action
4. `cd ../env/dev && docker-compose build --no-cache && docker-compose up -d`
5. `docker exec -it my_project_php ./init`
6. `docker exec -it my_project_php composer install`
7. `docker exec -it my_project_php ./yii migrate`