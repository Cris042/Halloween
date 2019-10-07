<?php
    
	namespace models;
	
	
    class bd
    {
		

        public static function select($table,$query = '',$arr = '')
		{
			if($query != false)
			{
				$sql = \MySql::conectar()->prepare("SELECT * FROM $table WHERE $query");
				$sql->execute($arr);
			}
			else
			{
				$sql =\MySql::conectar()->prepare("SELECT * FROM $table");
				$sql->execute();
			}
			return $sql->fetch();
        }
        
        public static function selectAll($table,$query = '',$order = '',$arr = '')
		{
			if($query != false)
			{
				$sql = \MySql::conectar()->prepare("SELECT * FROM $table WHERE $query ORDER BY $order ASC");
				$sql->execute($arr);
			}
			else
			{
				$sql = \MySql::conectar()->prepare("SELECT * FROM $table ");
				$sql->execute();
			}
			
			return $sql->fetchAll();

		}
	
		public static function selectlimit($table,$query = null,$start,$end)
		{
			if($query != null)
			    $sql = \MySql::conectar()->prepare("SELECT * FROM $table $query LIMIT $start,$end");
			else
			    $sql = \MySql::conectar()->prepare("SELECT * FROM $table LIMIT $start,$end");
	
			$sql->execute();

			
			return $sql->fetchAll();

		}

		
		
        public static function excluir($table,$query,$arry)
		{			
			 $sql = \MySql::conectar()->prepare("DELETE FROM  $table  WHERE $query ");
			 $sql->execute($arry);
		}

		public static function excluir_varios($table,$itens)
		{			
			 foreach($itens as $id)
			 {
				$sql = \MySql::conectar()->prepare("DELETE FROM  $table  WHERE id = ? ");
				$sql->execute(array($id));
			 }
		}

		public static function editar($table,$atributo,$arr,$id)
		{			 
            
		     $sql = \MySql::conectar()->prepare("UPDATE $table SET $atributo WHERE id = $id ");
		     $sql->execute($arr);
															
        }
        
        public static function verifica($table,$query,$arr)
		{
			
			 $verifica = self::select($table,$query,$arr);			
			 
			 if($verifica != null)
				$result = false;
			 else
				$result = true;
				
			 return $result;
		}

		public static function inserir($table,$arr,$arr_values)
		{
			
			$sql = \MySql::conectar()->prepare("INSERT iNTO $table VALUES(null,$arr)");
			$sql->execute($arr_values);
         
		}
		public static function msn($msn,$estado)
		{
			$_SESSION['mensagen'] = true;
			if($estado == 1)
			   $_SESSION['msn'] = '<div class = "box-sucesso text-center"><i class="fa fa-check"></i><span>'.$msn.'</div>';
			else
			   $_SESSION['msn'] = '<div class = "box-erro text-center"><i class="fa fa-times"></i>'.$msn.'</div>';
		}

		public static function pesquisa($table,$query)
		{
			
			$sql = \MySql::conectar()->prepare("SELECT * FROM `$table` $query ");
			$sql->execute();		
			return $sql->fetchAll();

		}
		
	

    }
?>