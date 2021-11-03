# SISPEP

## O que é?
---

O **SISPEP** é m sistema de prontuário eletrônica desenvolvido para a cadeira de NOME DA CADEIRA, na faculdade NOME DA FACULDADE, com o intuito de estudar OBJETIVO DO ESTUDO.
Para o desenvolvimento desse sistema foram utilizados:

- PHP
- HTML5
- Javascript

## Como rodar o sistema
---

1. Para que o sistema funcione em sua máquina, é necessário a instalação do [XAMPP](https://www.apachefriends.org/pt_br/index.html).
1. Após a intalção, faça um clone do repósitorio na pasta **htdcos** que pode ser encontrada seguindo: 
	C:/
		xampp/
			htdocs/
1. Após as devidas intalações inicialize o **Apache** e o **MySQL** no ainel de controle do XAMPP.
1. Em seguida acesse o [banco de dados](localhost/phpmyadmin) e importe o arquivo que contem o banco de dados.
1. Após finalizar o passo acima, o sistema já estara pronto para acesso. 
	1. Para acessar a página de login [CLIQUE AQUI](localhost/sispep-v2) ou entre pelo link [localhost/sispep-v2](localhost/sispep-v2).
	1. Para acessar a página de retirada do totem [CLIQUE AQUI](localhost/sispep-v2/app/view/totem/pagina_totem.php) ou entre pelo link [localhost/sispep-v2/app/view/totem/pagina_totem.php](localhost/sispep-v2/app/view/totem/pagina_totem.php).

## Usuário Para Teste
---

- Enfermeiro.
	- Login: enf
	- Senha: enf
- Médico.
	- Login: med
	- Senha: med
- Laboratório.
	- Login: lab
	- Senha: lab