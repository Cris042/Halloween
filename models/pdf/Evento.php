<?php
  session_start();

  if($_GET['id'])
     $_SESSION['IdEvento'] = (int)$_GET['id'];

  include('../../lib/vendor/autoload.php');
   
	ob_start();
		include('../../views/pages/pdf/Evento.php' );
		$conteudo = ob_get_contents();
	ob_end_clean();

	$mpdf = new \Mpdf\Mpdf();
	$mpdf->WriteHTML($conteudo);
	$mpdf->Output('Evento.pdf','D');
?>
