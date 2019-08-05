# graphql-kit

Here is a little library that'll help you develop an API using GraphQL and Symfony without 
worrying about implementing a whole GraphQL server.

It uses the powerful [graphql-php](https://github.com/webonyx/graphql-php) library.

## Installation

Using composer, in your symfony project you can issue this command:

```
composer require bcerati/graphql-kit
```

Then register the routing. It'll create a GraphQL server for the `POST` endpoint `/api`:

```
api:
    resource: '@BceratiGraphqlKitBundle/Resources/config/routing.yaml'
```

or if you want to change this endpoint:

```
api:
    path: /lala
    controller: 'Bcerati\GraphqlKit\Api\Server'
```

Finally, register the new installed bundle by adding this in your `bundles.php` file:

```
    Bcerati\GraphqlKit\BceratiGraphqlKitBundle::class => ['all' => true],
```

# Usage