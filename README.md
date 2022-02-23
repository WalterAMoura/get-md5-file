## :heavy_check_mark:  <font color='#007a83'>GET MD5 File</font>

## :rocket: <font color='#007a83'>Resumo</font>

> Script simples em PHP para receber um arquivo via *form_data*, e devolver o valor md5 do arquivo enviado no form.


## :pushpin: <font color='#007a83'>Exemplos</font>

* Rodar o serviço PHP:

```
php -S localhost:8080
```

* Usar o curl abaixo para realizar uma chamada via postman:

```
curl --location --request POST 'http://localhost:8080?path=upload' \
--header 'Content-Type: application/json' \
--form 'file=@"/C:/Users/Fulano/Pictures/teste.png"'
```

* Response:

```
{
    "file_md5": "139d04978f6be8bfde5d853b228d52ae"
}
```
