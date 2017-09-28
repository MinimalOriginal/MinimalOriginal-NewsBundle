MinimalOriginal NewsBundle
========

The news bundle for Minimal

Register bundle
========
$bundles = [
    ...
    new MinimalOriginal\NewsBundle\MinimalNewsBundle(),
];

Register routes
========
minimal_news:
    resource: "@MinimalNewsBundle/Resources/config/routing.yml"
    prefix:   /

Command to launch
========
bin/console minimal_news:create-first-news
