                <section class="welcome p-t-10" style="margin-top: 100px">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="title-4">
                                    Bem vindo
                                    <span style="color: orange;"><b><?php echo $this->session->userdata('logado')->usuario; ?>!</b></span>
                                </h1>
                                <p>Hoje é dia <?php echo date("d/m"); ?> - <?php echo $_SERVER['REMOTE_ADDR']; ?></p>
                                <hr class="line-seprate" />
                            </div>
                        </div>
                    </div>
                </section>

                <section class="statistic statistic2">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item statistic__item--green">
                                    <h2 class="number"><?php echo $clientes; ?></h2>
                                    <span class="desc">Clientes</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-account-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item statistic__item--orange">
                                    <h2 class="number"><?php echo $colaboradores; ?></h2>
                                    <span class="desc">Colaboradores</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-shopping-cart"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item statistic__item--blue">
                                    <h2 class="number"><?php echo $veiculos_manutencao; ?></h2>
                                    <span class="desc">veículos na manutenção</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                </div>
                            </div>
                            <?php if($user->nivel == 1){ ?>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item statistic__item--red">
                                    <h2 class="number"><?php echo $estoque; ?></h2>
                                    <span class="desc">Itens em Estoque</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-money"></i>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </section>

                <?php if($user->nivel == 1){ ?>
                <section class="statistic-chart">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="title-4 m-b-35">Estatísticas</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-md-6">
                                <div class="statistic-chart-1">
                                    <h3 class="title-3 m-b-30">Crescimento da Empresa</h3>
                                    <div class="chart-wrap">
                                        <canvas id="crecimento_empresa" width="400" height="400"></canvas>
                                    </div>
                                    
                                    <div class="statistic-chart-1-note">
                                        <span class="big">Taxa</span>
                                        <span>% em Porcentagem para cada mês do último ano</span>
                                    </div>
                                    
                                </div>
                            </div>

                            <!-- class="col-md-6 col-lg-4" -->
                            <div class="col col-md-6">
                                <div class="top-campaign">
                                    <h3 class="title-3 m-b-10">Requisições Pendentes</h3>

                                    <?php if (!empty($requisicoes_pendentes)) { ?>
                                    <table class="table table-responsive table-borderless table-striped  table-top-campaign">
                                        <thead>
                                            <th scope="col" width="40%">Requisição/Solicitante</th> 
                                            <th scope="col" width="40%">Status</th>
                                            <th scope="col" width="40%">Data</th>
                                        </thead>

                                        <tbody>
                                            <?php
                                             foreach($requisicoes_pendentes as $requisicao) {   
                                                 $usuario = ucwords($requisicao->solicitante); 
                                                 $date = date('d/m/Y', strtotime($requisicao->data_inclusao));
                                                 $status = $this->status($requisicao->status);;
                                            ?>
                                            <tr>
                                                <td>
                                                    <a  href="<?php echo base_url("ferramental_requisicao/detalhes/{$requisicao->id_requisicao}");?>">
                                                        <?php echo "{$requisicao->id_requisicao} - {$usuario}";?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <span class="badge badge-<?php echo $status['class'];?>"><?php echo $status['texto'];?></span>
                                                </td>
                                                <td>
                                                    <?php echo $date; ?>
                                                </td>
                                            </tr>
                                            <?php }  ?>
                                        </tbody>
                                    </table>

                                    <div class="col-8 pull-left m-t-40"> 
                                        <?php echo count($requisicoes_pendentes); ?> 
                                        De 
                                        <?php echo $requisicoes_pendentes_total; ?> 
                                        Requisições Pendêntes
                                    </div>

                                    <a class="col-4 pull-right m-t-40 btn btn-sm btn-outline-primary"  href="<?php echo base_url("ferramental_requisicao/"); ?>" >Ver Todas</a> 

                                    <?php } else { ?>
                                        <p>Nehuma Requisicão Pendente</p>
                                    <?php } ?>
                                </div>
                            </div>
                            
                            <!--
                            <div class="col-md-6 col-lg-4">
                                <div class="chart-percent-2">
                                    <h3 class="title-3">Volume de Pedidos</h3>
                                    <div class="chart-wrap">
                                        <canvas id="percent-chart2"></canvas>
                                        <div id="chartjs-tooltip">
                                            <table></table>
                                        </div>
                                    </div>
                                    <div class="chart-info">
                                        <div class="chart-note">
                                            <span class="dot dot--blue"></span>
                                            <span>products</span>
                                        </div>
                                        <div class="chart-note">
                                            <span class="dot dot--red"></span>
                                            <span>Services</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            -->
                        </div>
                    </div>
                </section>
                <?php } ?>

                

                <hr class="line-seprate" />                
                <section class="p-t-20">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="title-4 m-b-35">Amostra de Patrimônio </h3>
                                <?php foreach($patrimonio->obras as $obra) { ?>
                                    <div class="table--no-card m-b-40">
                                        <h4 class="title-5 m-b-10">Ferramentas</h4>
                                        <?php if(count($obra->ferramentas) > 0) { ?>
                                        <table class="table table-responsive table-borderless table-striped table-earning" id="lista">
                                            <thead>
                                                <tr>
                                                    <th scope="col" width="30%">ID</th>
                                                    <th scope="col" width="30%">Código</th>
                                                    <th scope="col" width="30%">Nome</th>
                                                    <th scope="col" width="30%">Registro</th>
                                                    <th scope="col" width="30%">Descarte</th>
                                                    <th scope="col" width="30%">Situação</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($obra->ferramentas as $ferramenta) { ?>
                                                <tr>
                                                    <td><?php echo $ferramenta->id_ativo_externo; ?></td>
                                                    <td><?php echo $ferramenta->codigo; ?></td>
                                                    <td><?php echo $ferramenta->nome; ?></td>
                                                    <td><?php echo date('d/m/Y H:i:s', strtotime($ferramenta->data_inclusao)); ?></td>
                                                    <td><?php echo isset($ferramenta->data_descarte) ? date('d/m/Y H:i:s', strtotime($ferramenta->data_descarte)) : '-'; ?></td>
                                                    <td>
                                                    <?php $situacao = $this->status($ferramenta->situacao);?>
                                                        <span class="badge badge-<?php echo $situacao['class']; ?>"><?php echo $situacao['texto']; ?></span>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <?php } else { ?>
                                            <p>Nenhuma Ferramenta registrada no Local</p>
                                        <?php } ?>
                                    </div>

                                    <div class="table--no-card m-b-40">
                                        <h4 class="title-5 m-b-10">Equipamentos</h4>
                                        <?php if(count($obra->equipamentos) > 0) { ?>
                                            <table class="table table-responsive table-borderless table-striped table-earning" id="lista2">
                                            <thead>
                                                <tr>
                                                    <th scope="col" width="30%">ID</th>
                                                    <th scope="col" width="30%">Nome</th>
                                                    <th scope="col" width="30%">Registro</th>
                                                    <th scope="col" width="30%">Descarte</th>
                                                    <th scope="col" width="30%">Situação</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($obra->equipamentos as $equipamento) { ?>
                                                <tr>
                                                    <td><?php echo $equipamento->id_ativo_interno; ?></td>
                                                    <td><?php echo $equipamento->nome; ?></td>
                                                    <td><?php echo date('d/m/Y H:i:s', strtotime($equipamento->data_inclusao)); ?></td>
                                                    <td><?php echo isset($equipamento->data_descarte) ? date('d/m/Y H:i:s', strtotime($equipamento->data_descarte)) : '-'; ?></td>
                                                    <td>
                                                    <?php $situacao = $this->get_situacao($equipamento->situacao);?>
                                                    <span class="badge badge-<?php echo $situacao['class']; ?>"><?php echo $situacao['texto']; ?></span>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <?php } else { ?>
                                            <p>Nenhum Equipamento registrado no Local</p>
                                        <?php } ?>
                                    </div>

                                     <?php if($user->nivel == 1) { ?>   
                                        <div class="table--no-card m-b-40">
                                            <h4 class="title-5 m-b-10">Veículos</h4>
                                            <?php if(count($patrimonio->veiculos) > 0) { ?>
                                                <table class="table table-responsive table-borderless table-striped table-earning" id="lista3">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" width="30%">ID</th>
                                                        <th scope="col" width="30%">Placa</th>
                                                        <th scope="col" width="30%">Tipo</th>
                                                        <th scope="col" width="30%">Marca/Modelo</th>
                                                        <th scope="col" width="30%">Kilometragem</th>
                                                        <th scope="col" width="30%">Situação</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($patrimonio->veiculos as $j => $veiculo) { ?>
                                                    <tr>
                                                        <td><?php echo $veiculo->id_ativo_veiculo; ?></td>
                                                        <td><?php echo $veiculo->veiculo_placa; ?></td>
                                                        <td><?php echo ucfirst($veiculo->tipo_veiculo);?> </td>
                                                        <td><?php echo $veiculo->veiculo;?> </td>
                                                        <td><?php echo $veiculo->veiculo_km; ?></td>
                                                        <td>
                                                        <?php $situacao = $this->get_situacao($veiculo->situacao);?>
                                                        <span class="badge badge-<?php echo $situacao['class']; ?>"><?php echo $situacao['texto']; ?></span>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                            <?php } else { ?>
                                                <p>Nenhum Veículo registrado</p>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>   
                                <!--
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>Data</th>
                                                <th>#</th>
                                                <th>#</th>
                                                <th>#</th>
                                                <th>#</th>
                                                <th>#</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="tr-shadow">
                                                <td>23/03/2021 12:00</td>
                                                <td>1221</td>
                                                <td class="desc">R$ 0,00</td>
                                                <td>R$ 0,00</td>
                                                <td>R$ 0,00</td>
                                                <td>R$ 0,00</td>
                                                <td>R$ 0,00</td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                        </tbody>
                                    </table>
                                </div>
                                -->
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </section>
                


                <section class="p-t-60 p-b-20">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © <?php echo date("Y"); ?>. All rights reserved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
