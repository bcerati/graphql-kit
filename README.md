# GraphQL Kit Bundle

```
composer require bcerati/graphql-kit
```

Add this in your routing file

```
api:
    resource: '@BceratiGraphqlKitBundle/Resources/config/routing.yaml'
```

and this in your bundles.php

```
    Bcerati\GraphqlKit\BceratiGraphqlKitBundle::class => ['all' => true],
```
