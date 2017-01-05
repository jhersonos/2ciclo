<?php 
	include("../conexion/conexion.php");

	$tipo=$_REQUEST["tipo"];
		$lab="";
		if ($tipo=="1") {
		
     				$lab="Laboratorio";
     				$cu="SELECT * FROM  aula WHERE nombre LIKE  '%lab%'";
					$rcu=mysql_query($cu,$con);
                }
		
		if ($tipo=="2") {
			
			$lab="Aula";
     		$cu="SELECT * FROM  aula";
			$rcu=mysql_query($cu,$con);
		
		}
 ?>

 <label for="select" class="col-lg-2 control-label"><?php echo $lab; ?></label>
            <div class="col-lg-10">
              <select required class="form-control" id="select" name="laboratorios">
              <option value="">-- Seleccione <?php echo $lab; ?> --</option>
              <?php  
                
                while ($fcu=mysql_fetch_array($rcu)) {?>
                    <option value="<?php echo $fcu['id'] ?>"><?php echo $fcu['nombre']." ".$fcu['pabe']; ?></option>
               
            </div>	  
            <?php } ?>   	
            </select>