

## Como rodar o sistema

1. Para que o sistema funcione em sua máquina, é necessário a instalação do [XAMPP](https://www.apachefriends.org/pt_br/index.html).
1. Após a intalção, faça um clone do repósitorio na pasta **htdcos** que pode ser encontrada seguindo: 
   C:/xampp/htdocs/
1. Após as devidas intalações inicialize o **Apache** e o **MySQL** no painel de controle do XAMPP.
1. Em seguida acesse o banco de dados pelo link [localhost/phpmyadmin](localhost/phpmyadmin) e importe o arquivo que contem o banco de dados. Criar um novo banco com o hostname sispepv1 e importat os dados.
1. Após finalizar o passo acima, o sistema já estara pronto para acesso. 
	1. Para acessar a página de login [CLIQUE AQUI](localhost/sispep-v2) ou entre pelo link [localhost/sispep-v2](localhost/sispep-v2).
	1. Para acessar a página de retirada do totem [CLIQUE AQUI](localhost/sispep-v2/app/view/totem/pagina_totem.php) ou entre pelo link [localhost/sispep-v2/app/view/totem/pagina_totem.php](localhost/sispep-v2/app/view/totem/pagina_totem.php).

## Usuários Para Teste

- Enfermeiro.
	- Login: enf
	- Senha: enf
- Médico.
	- Login: med
	- Senha: med
- Laboratório.
	- Login: lab
	- Senha: lab

## Carteiras Disponiveis para Teste

Na tela do Prontuario do Enfermeiro sera necessario informar a carteira do paciente, essa informacao encontra-se gravada no banco de dados, tabela carteira. 

1. 21,24,25,26,27,28,29,30,31,32,33,34,35,36,,37,38
   

Todo paciente possui um carteira!

## Link para o primeiro Repositorio do Projeto SISPEP (inicio de 14/09/2021).

https://github.com/joseflaviosouzajr/SISPEV-V21/