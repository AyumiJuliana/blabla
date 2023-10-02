<?php //Atualiza dados a partit do id
    // mostra erros do php
   ini_set ( 'display_errors' , 1); 
   error_reporting (E_ALL);

   include("util.php");
 
   $conn = conecta("pgsql:host=localhost; dbname=turma72b; user=mcperes; 
                    password=ct1ct1");
     
   $id = $_GET['id']; 

   $sql = "select * from julianaayumi where id=$id";
     
   // faz um select basico
   $select = $conn->query($sql)->fetch();

   $id        = $select['id'];
   $nome      = $select['nome'];
   $matricula = $select['matricula'];
   $email     = $select['email'];
   $nascimento= $select['nascimento'];
     
   $varHTML = "
    <form action='salvarDados.php' method='post'>
      <br>Id<br>
      <input type='text' name='id' value=$id required>
      
      <br>Nome<br>
      <input type='text' name='nome' value=$nome required>

      <br>Matricula<br>
      <input type='text' name='matricula' value=$matricula required>
      
      <br>E-mail<br>
      <input type='email' name='email' value=$email>

      <br>Data Nascimento<br>
      <input type='text' name='nascimento' value=$nascimento >

       <input type='submit' value='Salvar'>
     </form>
     ";
     
   echo $varHTML;
?>