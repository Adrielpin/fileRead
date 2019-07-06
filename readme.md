<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1400 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).


# Prova Técnica para o Cargo de Programador Web

## Descição do Problema
Construa um sistema em PHP para análise de dados, onde o mesmo deverá permitir:  
 - Importar arquivos de texto
 - ler e analisar os dados dos arquivos
 - gerar um relatorio

## Orientações
Deve existir 3 tipos de entidades dentro desses arquivos, onde para cada tipo temos um layout diferente, são eles:  

Entidade | ID | Formato
--- | --- | ---
Salesman | 001 | 001,CPF,Name,Salary
Customer | 002 | 002,CNPJ,Name, Business Area
Sales | 003 | 003,Sale ID,[Item ID-Item Quantity-Item Price],Salesman ID*

*observe no formato a lista de itens estruturado por colchetes

## Exemplo de dados das entidades (apenas um exemplo)

```
001,1234567891234,Steve,80000
001,3245678865434,Elias,60000.99
002,2345675434544345,Rita Ruggs,Rural
002,2345675433444345,Dianne Bragg,Rural
003,10,[1­10­100, 2­30­2. 50, 3­40­3. 10] ,Steve
003,08,[1­34­10, 2­33­1. 50, 3­40­0. 10] ,Elias
```

## Processamento dos dados
O sistema deve ler somente arquivos com extensão `.dat`, localizados em um diretório, localizado em `data/in`. Depois de processados, o sistema deve gerar um arquivo de saída seguindo o formato `{file_name}.done.dat` em outro diretório, localizado em `data/out`.

## Resultado
O arquivo processado deve apresentar como resultados a quantidade de clientes e de vendedores informados na entrada, a média salarial dos vendedores, o ID da venda masis cara, bem como o pior vendedor.

*IMPORTANTE:* Você poderá usar qualquer programa no desenvolvimento da prova, bem como escolher qualquer biblioteca externa se precisar. Os critérios de avaliação que usaremos para avaliar seu teste serão a lógica de programação, clean code e código otimizado.
