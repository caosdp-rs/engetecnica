<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                       
                        <a href="<?php echo base_url('ativo_veiculo'); ?>">
                        <button class="au-btn au-btn-icon au-btn--blue">
                        <i class="zmdi zmdi-arrow-left"></i>todos</button></a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title-1 m-b-25">Veículos</h2>

                    <div class="card">
                        <div class="card-header"><?php echo isset($detalhes) && isset($detalhes->id_ativo_veiculo) ? "Editar" : "Novo"; ?> Veículo</div>
                        <div class="card-body">

                            <form id="ativo_veiculo_form" action="<?php echo base_url('ativo_veiculo/salvar'); ?>" method="post" enctype="multipart/form-data">

                                <?php if(isset($detalhes) && isset($detalhes->id_ativo_veiculo)){?>
                                <input type="hidden" name="id_ativo_veiculo" id="id_ativo_veiculo" value="<?php echo $detalhes->id_ativo_veiculo; ?>" v-model="id_ativo_veiculo" >
                                <?php } ?>

                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="tipo_veiculo" class=" form-control-label">Tipo</label>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <select <?php echo !isset($detalhes) && !isset($detalhes->id_ativo_veiculo) ? 'required="required"' : ''?> class="form-control selectpicker" 
                                            id="tipo_veiculo" name="tipo_veiculo" data-live-search="true" v-model="tipo_veiculo"
                                            value="<?php echo isset($detalhes) && isset($detalhes->tipo_veiculo) ? $detalhes->tipo_veiculo : '';?>"
                                        >
                                            <option value="">Tipo</option>
                                            <option <?php echo isset($detalhes) && isset($detalhes->tipo_veiculo) && $detalhes->tipo_veiculo == "moto"  ? 'selected="selected"' : '';?> value="moto">Moto</option>
                                            <option <?php echo isset($detalhes) && isset($detalhes->tipo_veiculo) && $detalhes->tipo_veiculo == "carro"  ? 'selected="selected"' : '';?> value="carro">Carro</option>
                                            <option <?php echo isset($detalhes) && isset($detalhes->tipo_veiculo) && $detalhes->tipo_veiculo == "caminhao"  ? 'selected="selected"' : '';?> value="caminhao">Caminhão</option>
                                            <option <?php echo isset($detalhes) && isset($detalhes->tipo_veiculo) && $detalhes->tipo_veiculo == "maquina"  ? 'selected="selected"' : '';?> value="maquina">Máquina</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <select <?php echo !isset($detalhes) && !isset($detalhes->id_ativo_veiculo) ? 'required="required"' : ''?> class="form-control selectpicker" id="id_marca" name="id_marca" data-live-search="true">
                                            <option value="">Marca</option>
                                            <?php if(isset($detalhes) && isset($detalhes->id_marca) && isset($detalhes->marca)) { ?>
                                            <option selected="selected"  value="<?php echo $detalhes->id_marca ?>"><?php echo $detalhes->marca ?></option>
                                            <?php } else { ?>
                                            <option selected="selected"  value="">Selecione uma Marca</option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <select <?php echo !isset($detalhes) && !isset($detalhes->id_ativo_veiculo) ? 'required="required"' : ''?> class="form-control selectpicker" id="id_modelo" name="id_modelo" data-live-search="true">
                                            <option value="">Modelo</option>
                                            <?php if(isset($detalhes) && isset($detalhes->id_modelo) && isset($detalhes->modelo)) { ?>
                                            <option selected="selected"  value="<?php echo $detalhes->id_modelo ?>"><?php echo $detalhes->modelo ?></option>
                                            <?php } else { ?>
                                            <option selected="selected"  value="">Selecione um Modelo</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="tipo_veiculo" class=" form-control-label">Ano/Modelo</label>
                                    </div>                                    
                                    
                                    <div class="col-12 col-md-3">
                                        <select <?php echo !isset($detalhes) && !isset($detalhes->id_ativo_veiculo) ? 'required="required"' : ''?> class="form-control selectpicker" id="ano" name="ano" data-live-search="true">
                                            <option value="">Ano</option>
                                            <?php if(isset($detalhes) && isset($detalhes->ano)) { ?>
                                            <option selected="selected"  value="<?php echo $detalhes->ano ?>"><?php echo explode('-', $detalhes->ano)[0] ?></option>
                                            <?php } else { ?>
                                            <option selected="selected"  value="">Selecione o Ano</option>
                                            <?php } ?>

                                        </select>
                                    </div>

                                    <div class="col-12 col-md-7">
                                        <select <?php echo !isset($detalhes) && !isset($detalhes->id_ativo_veiculo) ? 'required="required"' : ''?> class="form-control" id="veiculo" name="veiculo">
                                            <option value="">Veículo</option>
                                            <?php if(isset($detalhes) && isset($detalhes->id_modelo) && isset($detalhes->modelo)) { ?>
                                            <option selected="selected"  value="<?php echo $detalhes->id_modelo ?>"><?php echo $detalhes->modelo ?></option>
                                            <?php } else { ?>
                                            <option selected="selected"  value="">...</option>
                                            <?php } ?>
                                        </select>
                                    </div>                                    

                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="valor_fipe" class=" form-control-label">Valor Fipe</label>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <input :required="!show_custom_fields" type="text" id="valor_fipe" name="valor_fipe" placeholder="0,00" class="valor form-control" 
                                        value="<?php echo isset($detalhes) && isset($detalhes->valor_fipe) ? $detalhes->valor_fipe : '' ?>" :readonly="!show_custom_fields">
                                    </div>

                                    <div class="col-12 col-md-3">
                                        <input :required="!show_custom_fields" type="text" id="codigo_fipe" name="codigo_fipe" placeholder="Cód Fipe" class="form-control" 
                                        value="<?php echo isset($detalhes) && isset($detalhes->codigo_fipe) ? $detalhes->codigo_fipe : '' ?>" :readonly="!show_custom_fields">
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <input :required="!show_custom_fields" type="text" id="fipe_mes_referencia" name="fipe_mes_referencia" placeholder="Referência" style="text-transform: uppercase;" class="form-control" 
                                        value="<?php echo isset($detalhes) && isset($detalhes->fipe_mes_referencia) ? $detalhes->fipe_mes_referencia : '' ?>" :readonly="!show_custom_fields">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div v-if="!show_custom_fields" class="col col-md-2">
                                        <label for="veiculo_placa" class=" form-control-label">Placa</label>
                                    </div>
                                    <div v-if="!show_custom_fields" class="col-12 col-md-3">
                                        <input  
                                            type="text" id="veiculo_placa" name="veiculo_placa" placeholder="PLA-0C00" @blur=""
                                            class="form-control veiculo_placa"  :class="{'invalid-input': edit_custom_fields_msg != null}" v-model="veiculo_placa"
                                            value="<?php echo isset($detalhes) && isset($detalhes->veiculo_placa) ? $detalhes->veiculo_placa : '' ?>" 
                                        >
                                        <div class="invalid-text">{{edit_custom_fields_msg}}</div>
                                    </div>

                                    <div v-if="show_custom_fields" class="col col-md-2">
                                        <label for="id_interno_maquina" class=" form-control-label">ID Interna Máquina</label>
                                    </div>
                                    <div v-if="show_custom_fields" class="col-12 col-md-3">
                                        <input  
                                            type="text" id="id_interno_maquina" name="id_interno_maquina" placeholder="Identificação Interna" @blur.lazy="buscarVeiculo('id_interno_maquina', id_interno_maquina)"
                                            class="form-control id_interno_maquina"  :class="{'invalid-input': edit_custom_fields_msg != null}" v-model="id_interno_maquina"
                                            value="<?php echo isset($detalhes) && isset($detalhes->id_interno_maquina) ? $detalhes->id_interno_maquina : '' ?>" 
                                        >
                                        <div  class="invalid-text">{{edit_custom_fields_msg}}</div>
                                    </div>

                                    <div class="col-12 col-md-3">
                                        <input type="text" id="veiculo_renavam" name="veiculo_renavam" placeholder="Renavam" class="form-control" 
                                        value="<?php echo isset($detalhes) && isset($detalhes->veiculo_renavam) ? $detalhes->veiculo_renavam : '' ?>">
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <input type="text" id="veiculo_observacoes" name="veiculo_observacoes" placeholder="Observações" class="form-control" 
                                        value="<?php echo isset($detalhes) && isset($detalhes->veiculo_observacoes) ? $detalhes->veiculo_observacoes : '' ?>">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="veiculo_km" class=" form-control-label">Quilometragem</label>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <input required="required" type="number" id="veiculo_km" name="veiculo_km" placeholder="KM" class="form-control" 
                                        value="<?php echo isset($detalhes) && isset($detalhes->veiculo_km) ? $detalhes->veiculo_km : '' ?>"
                                        <?php if (isset($km_inicial) && (int) $km_inicial > 0) echo "max=\"{$km_inicial}\" min=\"{$km_inicial}\"";?> >
                                    </div>

                                    <div class="col-12 col-md-3">
                                        <input required="required" type="text" id="valor_funcionario" name="valor_funcionario" placeholder="Valor Funcionário" class="form-control valor" 
                                        value="<?php echo isset($detalhes) && isset($detalhes->valor_funcionario) ? $detalhes->valor_funcionario : '' ?>">
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <input required="required" type="text" id="valor_adicional" name="valor_adicional" placeholder="Valor Adicional" class="form-control valor" 
                                        value="<?php echo isset($detalhes) && isset($detalhes->valor_adicional) ? $detalhes->valor_adicional : '' ?>">
                                    </div>                                    
                                </div>


                                <div class="row form-group">
                                    <div class="col col-md-2">
                                        <label for="situacao" class=" form-control-label">Data de Inclusão</label>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <input required="required" type="date" id="veiculo_km_data" name="veiculo_km_data" class="form-control" 
                                        value="<?php echo isset($detalhes) && isset($detalhes->data) ? date("Y-m-d", strtotime($detalhes->data)) : date("Y-m-d"); ?>">
                                    </div>

                                    <div class="col-12 col-md-2">
                                        <select name="situacao" id="situacao" class="form-control">
                                            <option <?php echo (isset($detalhes) && isset($detalhes->situacao)) && $detalhes->situacao == '0' ? 'selected="selected"' : '' ?> value="0">Ativo</option>
                                            <option <?php echo (isset($detalhes) && isset($detalhes->situacao)) && $detalhes->situacao == '1' ? 'selected="selected"' : '' ?> value="1">Inativo</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <hr>
                                <div class="pull-left">
                                    <button :disabled="!enable_form" class="btn btn-primary">                                                    
                                        <i class="fa fa-send "></i>&nbsp;
                                        <span id="submit-form">Salvar</span>
                                    </button>
                                    <a href="<?php echo base_url('ativo_veiculo');?>">
                                    <button class="btn btn-secondary" type="button">                                   
                                        <i class="fa fa-ban "></i>&nbsp;
                                        <span id="cancelar-form">Cancelar</span>
                                    </button>                              
                                    </a>
                                </div>

                                <?php if (isset($detalhes) && isset($detalhes->id_ativo_veiculo)) { ?>
                                <div class="pull-right">
                                        <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button" class="btn btn-outline-info btn-md dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Gerenciar Veículo
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                <a class="dropdown-item " href="<?php echo base_url("ativo_veiculo/gerenciar/quilometragem/{$detalhes->id_ativo_veiculo}"); ?>"><i class="fa fa-car"></i>&nbsp; Quilometragem</a>
                                                <div class="dropdown-divider"></div>
                                                <?php if ($detalhes->tipo_veiculo == "maquina") {?>
                                                    <a class="dropdown-item " href="<?php echo base_url("ativo_veiculo/gerenciar/operacao/{$detalhes->id_ativo_veiculo}"); ?>"><i class="fa fa-industry"></i>&nbsp; Operação</a>
                                                    <div class="dropdown-divider"></div>
                                                <?php } ?>
                                                <!-- <a class="dropdown-item " href="<?php echo base_url("ativo_veiculo/gerenciar/abastecimento/{$detalhes->id_ativo_veiculo}"); ?>"><i class="fas fa-gas-pump"></i>&nbsp; Abastecimento</a>
                                                <div class="dropdown-divider"></div> -->
                                                <a class="dropdown-item " href="<?php echo base_url("ativo_veiculo/gerenciar/manutencao/{$detalhes->id_ativo_veiculo}"); ?>"><i class="fas fa-wrench"></i> Manutenção</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item " href="<?php echo base_url("ativo_veiculo/gerenciar/ipva/{$detalhes->id_ativo_veiculo}"); ?>"><i class="fa fa-id-card"></i> IPVA</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item " href="<?php echo base_url("ativo_veiculo/gerenciar/seguro/{$detalhes->id_ativo_veiculo}"); ?>"><i class="fa fa-lock"></i> Seguro</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item " href="<?php echo base_url("ativo_veiculo/gerenciar/depreciacao/{$detalhes->id_ativo_veiculo}"); ?>"><i class="fa fa-sort-amount-asc"></i> Depreciação</a>
                                            </div>
                                        </div>
                                </div>
                                <?php } ?>
                            </form>

                        </div>
                    </div>

                    <?php if (isset($anexos)) { ?>
                    <div id="anexos" class="row">
                        <div class="col-12">
                            <?php $this->load->view('anexo/index', ['show_header' => false, 'permit_delete' => true]); ?>
                        </div>
                    </div>
                    <?php } ?>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © <?php echo date("Y"); ?>. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('anexo/index_form_modal', ["show_header" => false]); ?>
<!-- END MAIN CONTENT-->
<!-- END PAGE CONTAINER-->

<script>
    var ativo_veiculo_form = new Vue({
        el: "#ativo_veiculo_form",
        data(){
            return {
                id_ativo_veiculo: null,
                tipo_veiculo: null,
                veiculo_placa: null,
                id_interno_maquina: null,
                show_custom_fields: false,
                edit_custom_fields_msg: null,
            }
        },
        computed: {
            enable_form(){
                return [
                    this.edit_custom_fields_msg === null,
                    this.tipo_veiculo != null,
                ].every(v => v)
            }
        },
        watch : {
            tipo_veiculo() {
                if (this.tipo_veiculo == 'maquina') this.show_custom_fields = true
                else this.show_custom_fields = false
            },
            id_interno_maquina(){
                if(this.id_interno_maquina) {
                    this.veiculo_placa = null
                    this.buscarVeiculo('id_interno_maquina', this.id_interno_maquina)
                }
            },
            veiculo_placa(){
                if(this.veiculo_placa) {
                    this.id_interno_maquina = null
                    this.buscarVeiculo('veiculo_placa', this.veiculo_placa)
                }
            }
        },
        methods: {
            async buscarVeiculo(coluna, valor){
                var regex_placa = '[A-Z]{3}[0-9][0-9A-Z][0-9]{2}'
                if ((coluna == "veiculo_placa" && valor.replace('-', '').match(regex_placa)) || (coluna && valor.length > 0) ) {
                    let veiculo_dados = await axios
                    .get(`${window.base_url}/ativo_veiculo/buscar_veiculo/${coluna}/${valor.trim()}`)
                    .then(function(response) { return (response.status == 200) ? response.data : null})
                    
                    this.edit_custom_fields_msg = null
                    if ((veiculo_dados && (this.id_ativo_veiculo != null && this.id_ativo_veiculo != veiculo_dados.id_ativo_veiculo)) || 
                        veiculo_dados && this.id_ativo_veiculo == null)
                        this.edit_custom_fields_msg = "Dado já existe para outro veículo!"
                }
             },
        },
        beforeMount(){
            this.id_ativo_veiculo = '<?php echo isset($detalhes) && isset($detalhes->id_ativo_veiculo) ? $detalhes->id_ativo_veiculo : '';?>' || null
            this.tipo_veiculo = '<?php echo isset($detalhes) && isset($detalhes->tipo_veiculo) ? $detalhes->tipo_veiculo : '';?>' || ''
            this.veiculo_placa = '<?php echo isset($detalhes) && isset($detalhes->veiculo_placa) ? $detalhes->veiculo_placa : '';?>' || ''
            this.id_interno_maquina = '<?php echo isset($detalhes) && isset($detalhes->id_interno_maquina) ? $detalhes->id_interno_maquina : '';?>' || ''
        }
    })
</script>
