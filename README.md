<p align="center">
  <a href="" rel="noopener">
 <img width=200px height=200px src="https://i.imgur.com/6wj0hh6.jpg" alt="Project logo"></a>
</p>

<h3 align="center">Sistema de Livros</h3>

<div align="center">

[![Status](https://img.shields.io/badge/status-active-success.svg)]()
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](/LICENSE)

</div>

---

<p align="center"> Sistema de cadastro de livros
    <br> 
</p>

## 📝 Table of Contents

- [Sobre](#about)
- [Início](#getting_started)
- [Usage](#usage)
- [Built Using](#built_using)
- [Authors](#authors)

## 🧐 Sobre <a name = "about"></a>

Sistema de cadastro de livros - Criado para teste técnico

## 🏁 Início <a name = "getting_started"></a>

Instruções para baixar e executar o projeto em sua maquina

### Pré requisitos

Necessário ter instalado na maquina:

```
- Git
- NPM
- MySQL
- SGDB (Sistema de gerenciamento de banco de dados, eu utilizei o HeidiSQL, mas você pode utilizar o da sua preferencia)
```

## 🎈 Como utilizar <a name="usage"></a>

- Baixar o projeto através do git utilizando o comando
```
git clone https://github.com/AguiarDG/ProjetoTecnicoSistemaDeLivros.git
```

- Depois de baixar o projeto, rodar o comando para instalar as dependencias:
```
npm install
```

- Agora duplique e renomeie o arquivo <b>.env.example</b> para <b>.env</b> e altere para as suas configurações;
- Rode o comando abaixo para gerar o <b>APP_KEY</b> do arquivo <b>.env</b>
```
php artisan key:generate
```

- Crie um banco de dados chamado sistema_livros (como especificado no arquivo .env) e depois execute o migrate (Cria as tabelas)
- Caso não queira rodar o migrate, na raiz do projeto tem um dump do banco de dados
```
php artisan migrate
```

- Realizar o build do Frontend
```
npm run build
```

- Executar o projeto
```
php artisan serve
```

Agora o projeto já esta configurado e acessivel no seu localhost:
```
http://127.0.0.1:8000
```

Antes de cadastrar o livro você precisa cadastrar pelo menos 1 assunto e 1 autor.
É possivel tirar um relatorio por cada uma das telas que forem navegadas e na tela principal é possivel retirar um relatório geral.

## ⛏️ Built Using <a name = "built_using"></a>

- [MySQL](https://www.mysql.com/) - Database
- [Laravel 11](https://www.laravel.com/) - Web Framework
- [Bootstrap](https://getbootstrap.com) - Frontend Toolkit
- [DomPDF](https://dompdf.github.io) - PDF Report (HTML to PDF converter)
- [Vite](https://vitejs.dev) - Compile Frontend Toolkit

## ✍️ Authors <a name = "authors"></a>

- [@AguiarDG](https://github.com/AguiarDG)
