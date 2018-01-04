# Run
Update .env files for your personal settings,
run the following CLI scripts to update project packages and build default DB tables and values

- composer install
- php artisan migrate
- php artisan db:seed


# GraphQL
http://graphql.org/

##### chrome plugin
https://chrome.google.com/webstore/detail/altair-graphql-client/flnheeellpciglgpaodhkhmapeljopja/related

##### Laravel package
https://github.com/Folkloreatelier/laravel-graphql

##### GraphQL access URI
```
    http://{domain}/graphql
```

```
    http://{domain}/graphql?XDEBUG_SESSION_START=PHP_STORM
```

##### Examples
```
{
  taxonomies{
    slug,
    label,
    children{
      slug, 
      label
    }
  }
}

{
  taxonomy(id:1){
    id,
    slug,
    label
  }
}
```