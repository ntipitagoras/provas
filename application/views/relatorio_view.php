
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
<div id="page-wrapper">
    <div class="row">
        <div class="col-sm-4">
          <h4>Provas enviadas</h4>
           <canvas id="usuariosGrafic" width="400" height="400"></canvas>
   <script>
          var data = {
              labels: ['Enviadas', 'Aprovadas', 'Rejeitadas'],
              datasets: [
                {
                  data: [<?php echo $enviadas ?>, <?php echo $aceitas ?>,<?php echo $rejeitadas ?>],
                  backgroundColor: ['#ffa726', '#26a69a', '#7e57c2'],
                  hoverBackgroundColor: ['#ffb74d', '#4db6ac', '#9575cd']
                }
              ]
          };
          var ctx = document.getElementById("usuariosGrafic");
          var myDoughnutChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: true,
            }
          });
    </script> 
  
   <script type="text/javascript">

$(function(){      //inicializa jQuery
   $('.load_cursos').submit(function(){    //nome do form no evento submit identificado por class
      $.ajax({
         url: 'relatorio/getDetails',
         type: 'POST',
         dataType: 'json',
         data: $('.load_cursos').serialize(),

         success: function( data ){ 
                        //Se o resultado for sucesso
            var data2 = {
              labels: ['Enviadas', 'Aprovadas', 'Rejeitadas'],
              datasets: [
                {
                  data :[data.curso_enviados, data.cursos_aceitos
, data.cursos_rejeitado],
                  backgroundColor: ['#ffa726', '#26a69a', '#7e57c2'],
                  hoverBackgroundColor: ['#ffb74d', '#4db6ac', '#9575cd']
                }
              ]
             
          };
          var ctx = document.getElementById("cursosGrafic");
          var myDoughnutChart = new Chart(ctx, {
            type: 'pie',
            data: data2,
            options: {
                responsive: true,
                maintainAspectRatio: true,
            }
          });           
         },
         beforeSend: function(){       //Evento que será executado antes de enviar os dados com o ajax
            $("#btn_curso").attr('value', 'Buscando');   // Renomear butão enquanto estiver enviando
        },
        complete: function(msg){     //Evento que será executado após finalizar a solicitação ajax
            $("#btn_curso").attr('value', 'Buscar');  //renomear botão           
        }
      });
    return false; //não recarregar a página
   });
});
</script> 
    

        </div>

         <div class="col-sm-4">



 <h4>Detalhes por curso</h4>
 <form class="load_cursos" action="" method="POST">
 <select class="form-control" name="cursos" id="cursos">
  <option value="" selected="">Selecione o curso</option>
   <?php foreach ($cursos as $curso) {
echo "<option value='".$curso->id."'>".$curso->descricao."</option>";
     
   }?>
</select>

 <input type="submit" class="btn-success" value="Buscar" name="btn_curso" id="btn_curso">

</form>
<canvas id="cursosGrafic" width="400" height="400"></canvas>



 <script>
          
  </script> 



         </div>
    </div>
</div>


