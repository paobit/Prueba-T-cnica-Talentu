# api-docker-php

Read one item with ID:
```
GET http://localhost/api/usuarios/oferta_laboral/read_one?id=XXX
```

Search for a item with search string:
```
GET http://localhost/api/usuarios/oferta_laboral/search?s=XXX
```

Read all items:
```
GET http://localhost/api/usuarios/oferta_laboral/read
```

Read all items that are in stock:
```
GET http://localhost/api/usuarios/read_in_candidatos
```

Ordering one item with ID:
```
POST http://localhost/api/usuario/order
```
Body
```
{
    "nombre" : "1"
}
```
Proxy With Caddyfile

docu https://caddyserver.com/docs/caddyfile

docker hub image https://hub.docker.com/r/abiosoft/caddy

https://hub.docker.com/_/adminer
