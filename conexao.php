<?php
   class conexao {
                private static $instancia = null;
    public static function getConexao(){
        if(self::$instancia===null){
            try{
                self::$instancia=new PDO("mysql:host=localhost;dbname=novo;charset=utf8", "rennan", "012831");
                self::$instancia->setAttribut(PDO::ATTR::errmode,PDO::errmode_exception);
            }catch (PDOexception $e){
                die("erro na conexao ao bd:". $e -> getMessage());
            }
        }
        return self::$instancia;
    }
}   
?>  