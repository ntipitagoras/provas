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
           var ctx = document.getElementById("cursosGrafic");
          var myDoughnutChart = new Chart(ctx, {
            type: 'pie',
            data: data2,
            options: {
                responsive: true,
                maintainAspectRatio: true,
            }
          });
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
           var ctx = document.getElementById("cursosGrafic");
          var myDoughnutChart = new Chart(ctx, {
            type: 'pie',
            data: data2,
            options: {
                responsive: true,
                maintainAspectRatio: true,
            }
          });



          } // fim do if
            
                    
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