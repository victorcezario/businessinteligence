<div class="modal fade" id="Dados" tabindex="-1" role="dialog" aria-labelledby="ModalDados" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="myModalLabel">Selecionar Dados</h4>
            </div>
            <form method="POST" action="Modulo/Post">
            <div class="modal-body">
                <h5 class="m-t-lg with-border">Seletor de Dados</h5>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group input-group">
                            <input type="hidden" name="tipo" value="DADOS">
                            <select class="select2 select2-hidden-accessible" name="DADOS[]" multiple="" tabindex="-1" aria-hidden="true">
                                <?php echo $dados; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-rounded btn-primary">Atualizar Dados</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="Valores" tabindex="-1" role="dialog" aria-labelledby="ModalValores" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="myModalLabel">Selecionar Valores</h4>
            </div>
            <form method="POST" action="Modulo/Post">
            <div class="modal-body">
                <h5 class="m-t-lg with-border">Seletor de Valores</h5>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group input-group">
                            <input type="hidden" name="tipo" value="VALORES">
                            <select class="select2 select2-hidden-accessible" name="VALORES[]" multiple="" tabindex="-1" aria-hidden="true">
                                <?php echo $valores; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-rounded btn-primary">Atualizar Valores</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#campo').on('change',function(){
            var retorno = $(this).val();
            if(retorno){
                $.ajax({
                    type:'GET',
                    url:'<?php base_url(); ?>/Modulo/BuscaSubFiltro/'+retorno,
                    success:function(html){
                        $('#retorno').html(html);
                    }
                });
            }else{
                $('#retorno').html('<option value="">Selecione o campo primeiramente</option>');
            }
        });
    });
</script>
<div class="modal fade" id="Filtros" tabindex="-1" role="dialog" aria-labelledby="ModalFiltros" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="myModalLabel">Selecionar Filtros</h4>
            </div>
            <form method="POST" action="Modulo/Post">
                <div class="modal-body">
                    <h5 class="m-t-lg with-border">Seletor de Filtros</h5>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group input-group">
                                <input type="hidden" name="tipo" value="FILTROS">
                                <label>Campo</label>
                                <select class="form-control" id="campo" name="FILTRO">
                                    <?php echo $filtros; ?>
                                </select>
                            </div>
                            <select class="form-control" name="condicao" id="condicao">
                                <option value="">IGUAL</option>
                                <option value="">DIFERENTE</option>
                            </select>
                            <select class="form-control" name="retorno" id="retorno">
                                <option value="">Selecione um campo...</option>
                            </select>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-rounded btn-primary">Atualizar Valores</button>
                </div>
            </form>
        </div>
    </div>
</div>