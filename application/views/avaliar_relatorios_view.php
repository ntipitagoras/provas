
<div id="page-wrapper"><br>
    <div class="row">
        <div class="col-lg-12">


            <div class="panel panel-default">
                <div class="panel-heading">
                    Avaliação de Desempenho
                </div>
                
                    <div class="panel-body">

                        <form method="post" action="<?php echo base_url(); ?>relatorio/coordenadores">
                            <input type="hidden" name="click" value="sim" >
                            <input type="submit" name="gerarRelatorio" value="Gerar Relatório Excel" >
                        </form>
                        <!-- <div id="chartContainer"></div> -->

                    </div>
            </div>

        </div>
    </div>
</div>




<script type="text/javascript">
FusionCharts.ready(function () {
    var revenueChart = new FusionCharts({
        "type": "column3d",
        "renderAt": "chartContainer",
        "width": "800",
        "height": "400",
        "dataFormat": "json",
        "dataSource": {
           "chart": {
              "caption": "Avaliação Coordenadores",
              "subCaption": "",
              "xAxisName": "Coordenadores",
              "yAxisName": "Pontuação %",
              "theme": "fint"
           },
           "data": [
              <?php
                echo $explode;
              ?>
            ]
        }

    });
    revenueChart.render();
});
</script>
