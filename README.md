#  Índice

* Descrição
* Condições do Projeto
* Instalação
* Execução
* Autor

#  Descrição

Nessa fase os candidatos enviam um CRUD de produtos.

Os atributo desses produtos são:

- Nome
- Preço
- Descrição
- Imagem

#  Condições do Projeto

   - Intenção é analisar código e criatividade no desenvolvimento. Escreva o menor número de linhas possível e use o máximo de conhecimento que você tem;
   - Não pode usar nenhum framework PHP. O teste deve ser feito usando PHP puro;
   - Não precisa se preocupar com frontend. Pode apresentar o teste usando Bootstrap ou qualquer outro framework css de sua preferencia;

#  Instalação

Faça o download ou clone o repositório
https://github.com/daniloaldm/crudPHP.git


Agora você está pronto para executar, mas lembre-se de alterar suas credenciais de banco de dados dentro de classes/config.php:

```
define('DB_HOST', 'localhost');
define('DB_NAME', 'ecommerce');
define('DB_USER', 'root');
define('DB_PASS', '');
```

# Execução

Navegue até a pasta do projeto via terminal, e execute o comando
```
php -S localhost:8080
```
Acesse http://localhost/8080 no browser

No próprio repositório tem um documento .SQL, que é o script pro banco de dados, basta importar ele no seu banco de dados,e utilizá-lo para a aplicação.

# Autor

**Danilo Alexandrino de Miranda** - [GitHub](https://github.com/daniloaldm) - Email: [danilo.alexandrinodm@gmail.com](danilo.alexandrinodm@gmail.com)


# crudPHP
