
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-sm-4">

  <h4>Todos os cursos</h4>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">           
      <canvas id="usuariosGrafic" width="50" height="37"></canvas>  
    </li>
     <li class="list-group-item">  

    <canvas id="totalGrafic" width="50" height="30"></canvas>
 
     </li>

  </ul>
  


    

        </div>

<div class="col-sm-4">



 <h4>Detalhes por curso</h4>
 <ul class="list-group list-group-flush">
<li class="list-group-item">
 <form class="load_cursos" action="" method="POST">
 <select class="form-control" name="cursos" id="cursos">
  <option value="" selected="">Selecione o curso</option>
   <?php foreach ($cursos as $curso) {
echo "<option value='".$curso->id."'>".$curso->descricao."</option>";
     
   }?>
</select>

 <input type="submit" class="btn-success" value="Buscar" name="btn_curso" id="btn_curso">

</form>
<canvas id="cursosGrafic" width="50" height="30"></canvas>
</li>
</ul> 

</div>
<div class="col-sm-4">
<h4>Provas impressas</h4>
<ul class="list-group list-group-flush">
 <li class="list-group-item">
<canvas id="provasGrafic" width="50" height="37"></canvas>
 </li>
<li class="list-group-item">
 <canvas id="provasGrafic2" width="50" height="30"></canvas>
</li> 

</ul> 
</div>


    </div>
    </div>
  
</div>




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

           var ctx = document.getElementById("totalGrafic");
           var myBarChart = new Chart(ctx, {
             type: 'bar',
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

          if (data.curso_enviados !='0' || data.curso_enviados !='0' || data.cursos_aceitos !='0') {
           
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
          
          }else{
          
          
          var data2 = {
              labels: ['Enviadas', 'Aprovadas', 'Rejeitadas'],
              datasets: [
                {
              data :[0,0, 0],
                  backgroundColor: ['#ffa726', '#26a69a', '#7e57c2'],
                  hoverBackgroundColor: ['#ffb74d', '#4db6ac', '#9575cd']
                }
              ]
             
          };
          } // fim do if


          var canvas = document.getElementById("cursosGrafic");
          

          if (window.bar != undefined)
            window.bar.destroy();

        window.bar = new Chart(canvas, {
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


<script type="text/javascript">
 var dataPrints = {
              labels: ['Impressas','Não impressas', 'Aguardando'],
              datasets: [
                {
              data :[<?php echo $Totimpressas ?>, <?php echo $Totnao_impressas ?>, <?php echo $Totaguardando ?>],
                  backgroundColor: ['#ffa726', '#26a69a', '#7e57c2'],
                  hoverBackgroundColor: ['#ffb74d', '#4db6ac', '#9575cd']
                }
              ]
             
          }; 
 var ctx = document.getElementById("provasGrafic");
  var myBarChart = new Chart(ctx, {
    type: 'pie',
    data: dataPrints,
    options: {
     responsive: true,
      maintainAspectRatio: true,

    }
});

 var ctx = document.getElementById("provasGrafic2");
  var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: dataPrints,
    options: {
     responsive: true,
      maintainAspectRatio: true,

    }
});
</script>