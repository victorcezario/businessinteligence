<?php
class MMenu extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function ListarMenuDashboard(){
        $query = $this->db->query("SELECT * FROM BI_DASHBOARDS WHERE STATUS = '1'");
        $data = '';
        foreach ($query->result() as $x)
        {
            $data .= '<li>
                          <a href="'.base_url().'dashboard/visualizar/'.$x->ID.'">
                                <i class="'.$x->ICONE.'"></i>
                                <span class="menu-title">
									<strong>'.$x->NOME.'</strong>
								</span>
                          </a>
                      </li>';
        }
        return $data;

    }
    public function ListarMenuModulo(){
        $query = $this->db->query("SELECT * FROM BI_MODULOS WHERE STATUS = '1'");
        $data = '';
        foreach ($query->result() as $x)
        {
            $data .= '<li>
                          <a href="'.base_url().'modulo/visualizar/'.$x->ID.'">
                                <i class="'.$x->ICONE.'"></i>
                                <span class="menu-title">
									<strong>'.$x->NOME.'</strong>
								</span>
                          </a>
                      </li>';
        }
        return $data;
    }
    public function ListarMenuConfiguracao(){
        $data = '';
        //Adicionar Dashboard
        $data .= '<li>
                          <a data-target="#modal-dashboard" data-toggle="modal">
                                <i class="fa fa-plus"></i>
                                <span class="menu-title">
									<strong>Criar Dashboard</strong>
								</span>
                          </a>
                      </li>';
        return $data;

    }
    public function ListarModalConfiguracao(){
        $data = '';
        $data = '    <div class="modal fade" id="modal-dashboard" role="dialog" tabindex="-1" aria-labelledby="modal-dashboard" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Criar Nova Dashboard</h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">
                    <p class="text-semibold text-main">Bootstrap Modal Vertical Alignment Center</p>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                    <br>
                    <p class="text-semibold text-main">Popover in a modal</p>
                    <p>This
                        <button class="btn btn-sm btn-warning demo-modal-popover add-popover" data-toggle="popover" data-trigger="focus" data-content="And here\'s some amazing content. It\'s very engaging. right?" data-original-title="Popover Title">button</button>
                        should trigger a popover on click.
                    </p>
                    <br>
                    <p class="text-semibold text-main">Tooltips in a modal</p>
                    <p>
                        <a class="btn-link text-bold add-tooltip" href="#" data-original-title="Tooltip">This link</a> and
                        <a class="btn-link text-bold add-tooltip" href="#" data-original-title="Tooltip">that link</a> should have tooltips on hover.
                    </p>
                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Fechar</button>
                    <button class="btn btn-primary">Criar Dashboard</button>
                </div>
            </div>
        </div>
    </div>';
        return $data;
    }
}