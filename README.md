# Controle de Frota em PHP
O objetivo desse projeto é servir de base para estudo da linguagem php com mysql usando o framework [Code Igniter](https://codeigniter.com/).

##Instalação

Para instalar, basta copiar os arquivos para dentro de um servidor http que aceite PHP, como por exemplo o [Apache](https://httpd.apache.org/)

##Banco de dados
O banco de dados utililzado na aplicação é o [mysql](https://www.mysql.com/)

para configurar o banco, rode o script **database/controle_frota.sql**

Para configurar a conexão com o banco edite o arquivo **/application/config/database.php**

    $active_group = 'default';
    $active_record = TRUE;
    $db['default']['hostname'] = 'localhost';
    $db['default']['username'] = 'usuario';
    $db['default']['password'] = 'senha';
    $db['default']['database'] = 'controle_frota';
    $db['default']['dbdriver'] = 'mysql';
    $db['default']['dbprefix'] = '';
    $db['default']['pconnect'] = TRUE;
    $db['default']['db_debug'] = TRUE;
    $db['default']['cache_on'] = FALSE;
    $db['default']['cachedir'] = '';
    $db['default']['char_set'] = 'utf8';
    $db['default']['dbcollat'] = 'utf8_general_ci';
    $db['default']['swap_pre'] = '';
    $db['default']['autoinit'] = TRUE;
    $db['default']['stricton'] = FALSE;




CREDITOS: https://github.com/ramonsilvanet

OBS: O código estava incompleto, conforme conversado com o Ramon.
Fiz as alterações e implementações necessárias para o mesmo "rodar".


