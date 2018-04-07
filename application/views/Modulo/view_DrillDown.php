
<script>

$(document).ready(function(){
  $("a.drilldown").click(function(){
    $('[class="drilldowne"]').attr('url', $(this).attr("url"));
    $('[class="drilldowne"]').attr('valores', $(this).attr("valores"));
    $('[class="drilldowne"]').attr('filtros', $(this).attr("filtros"));
    jQuery.noConflict(); 
    $('#modal-drilldown').modal('show'); 
  });
});
$(document).ready(function(){
$("a.drilldowne").click(function(){
    var url = $(this).attr("url");
    var dados = $(this).attr("op");
    var valores = $(this).attr("valores");
    var filtros = $(this).attr("filtros");
    var redirect = url +"d="+ dados +"&v="+ valores +"&f="+ filtros;
    //alert("Button Clicado foi: " + redirect); 
     window.location.href = redirect;
  });
});
</script>
 <div class="modal fade" id="modal-drilldown" role="dialog" tabindex="-1" aria-labelledby="modal-drilldown" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">DrillDown</h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">
                    <ul class="lista-campos lista-drill">
                    <?php echo $this->mModulo->ListarDrillDown($modulo_id); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>