<?php

namespace App\Http\Controllers;

use App\Http\Requests\Helpdesk\frmUticRequest;
use Illuminate\Http\Request;
use App\API\Entity\HelpCRM as Help;
use App\API\Entity\cpfSAS;
use App\Http\Requests\Helpdesk\frmConveniosContratos;
use App\Http\Requests\Helpdesk\frmGabinenteDirex;
use App\Http\Requests\Helpdesk\frmOuvidoria;
use App\Http\Requests\Helpdesk\frmUacCanaisRemotos;
use App\Http\Requests\Helpdesk\frmUgocPadrao;
use App\Http\Requests\Helpdesk\frmUgpPsicologo;
use App\Http\Requests\Helpdesk\frmUsrEmpretecRequest;
use App\Http\Requests\Helpdesk\frmUsrMarketingCloud;
use App\Http\Requests\Helpdesk\frmUsrLoja;
use App\Http\Requests\Helpdesk\frmUsrPadrao;
use App\Http\Requests\Helpdesk\frmUacPadrao;
use App\Http\Requests\Helpdesk\frmUas;
use App\Http\Requests\Helpdesk\frmUmc;
use App\Http\Requests\Helpdesk\frmUsrProdutosInstataneos;
use App\Http\Requests\Helpdesk\frmUticPadraoRequest;
use App\Http\Requests\Helpdesk\frmUticGestaoUsuarioRequest;
use App\Models\Helpdesk\Acao;

class CriarHelp extends Controller
{
    public function criarHelp(){
        return view('Logado.Helpdesk.CriarHelp');
    }

    public function criarHelpPost(Request $request){

        switch($request->input('unidade')){
            case 'Help Desk - UGP Pessoal':
                $this->ugpPessoal($request);
                break;

            case 'Help Desk - UTIC':
                switch($request->input('tipo')){
                    case 'Padrão':
                        app(frmUticPadraoRequest::class);
                        validator()->make($request->only('tipo','descricao'), frmUticPadraoRequest::rules());
                        $this->uticPadrao($request);
                        break;
                    case 'gestaoUsuario':
                        app(frmUticGestaoUsuarioRequest::class);
                        validator()->make($request->all(), frmUticGestaoUsuarioRequest::rules());
                        $this->uticGestaoUsuario($request);
                        break;
                }
                break;

            case 'Help Desk - USR':
                switch($request->input('tipo')){
                    case 'Empretec/SGF';
                        app(frmUsrEmpretecRequest::class);
                        validator()->make($request->all(), frmUsrEmpretecRequest::rules());
                        $this->usrEmpretec($request);
                        break;

                    case 'Marketing-Cloud':
                        /*
                        Será necessário verificar qual o Publico Geral para enviar o Publico espécifico correto,
                        já que está enviando todos os selecionados por grupos de publico geral

                        publico-geral => publico-especifico-pj/pf/todos
                         */
                        app(frmUsrMarketingCloud::class);
                        validator()->make($request->all(), frmUsrMarketingCloud::rules());
                        $this->usrMarketingCloud($request);
    
                        break;

                    case 'Loja':
                        app(frmUsrLoja::class);
                        validator()->make($request->all(), frmUsrLoja::rules());
                        $this->usrLoja($request);
                        break;

                    case 'Produtos Instantâneos':
                        app(frmUsrProdutosInstataneos::class);
                        validator()->make($request->all(), frmUsrProdutosInstataneos::rules());
                        $this->usrProdutosInstantaneos($request);
                        break;

                    case 'Padrão':
                        app(frmUsrPadrao::class);
                        validator()->make($request->all(), frmUsrPadrao::rules());
                        $this->padrao($request);
                        break;
                    }
                break;

            case 'Help Desk - UGP Psicólogo':
                app(frmUgpPsicologo::class);
                validator()->make($request->only(['tipo', 'descricao']), frmUgpPsicologo::rules());
                switch($request->input('tipo')){
                    case 'Padrão':
                        $this->padrao($request);
                        break;
                }
                break;
            
            case 'Help Desk - UGOC':
                app(frmUgocPadrao::class);
                validator()->make($request->only(['tipo', 'descricao']), frmUgocPadrao::rules());

                switch($request->input('tipo')){
                    case 'Padrão':
                        $this->padrao($request);
                        break;
                }
                break;

            case 'Help Desk - UAC':
                switch($request->input('tipo')){
                    case 'Padrão':
                        app(frmUacPadrao::class);
                        validator()->make($request->all(), frmUacPadrao::rules());
                        $this->padrao($request);
                        break;
                    
                    case 'Canais Remotos':
                        app(frmUacCanaisRemotos::class);
                        validator()->make($request->all(), frmUacCanaisRemotos::rules());
                        print_r($request->all());
                        break;
                }
                break;
            
            case 'Help Desk - OUVIDORIA':
                app(frmOuvidoria::class);
                validator()->make($request->only(['tipo', 'descricao']), frmOuvidoria::rules());
                switch($request->input('tipo')){
                    case 'Padrão':
                        $this->padrao($request);
                        break;
                }
                break;

            case 'Help Desk - Gabinete Direx':
                app(frmGabinenteDirex::class);
                validator()->make($request->only(['tipo', 'descricao']), frmGabinenteDirex::rules());
                switch($request->input('tipo')){
                    case 'Padrão':
                        $this->padrao($request);
                        break;
                }
                break;

            case 'Help Desk - Convênios/Contratos':
                app(frmConveniosContratos::class);
                validator()->make($request->only(['tipo', 'descricao']), frmConveniosContratos::rules());
                switch($request->input('tipo')){
                    case 'Padrão':
                        $this->padrao($request);
                        break;
                }
                break;
            
            case 'Help Desk - UMC':
                app(frmUmc::class);
                validator()->make($request->only(['tipo', 'descricao']), frmUmc::rules());
                switch($request->input('tipo')){
                    case 'Padrão':
                        $this->padrao($request);
                        break;
                }
                break;

            case 'Help Desk - UAS':
                app(frmUas::class);
                validator()->make($request->only(['tipo', 'descricao']), frmUas::rules());
                switch($request->input('tipo')){
                    case 'Padrão':
                        $this->padrao($request);
                        break;
                }
                break;
                

        }

        return redirect()->route('criarHelp')->with(['message'=>'Help criado com sucesso!']);
    }




//função de preenchimento automático de cada unidade
    public function preencherUtic($cpf){
        header('Content-Type: application/json');
        $sasCpf = new cpfSAS();
        $array = $sasCpf->getCpf($cpf);
        $return = [
            'NOME_COMPLETO' => $array['NomeRazaoSocial'],
            'DATA_NASCIMENTO' => $array['DataNasc'],
            'GENERO' => $array['Genero'],
            'CELULAR' => (empty($array['ListaInformacoesContato'])) ? null : $array['ListaInformacoesContato'][0]['Numero']
        ];

        json_encode($return);
        return $return;
    }


//Função que captura ação por projeto
    public function capturarAcao($projeto){
        header('Content-Type: application/json');
        $acao = new acao;
        $acao = $acao->select('ACAO')->where('PROJETO',strval($projeto))->pluck('ACAO')->toArray();
        $json = json_encode($acao);
        return $json;
    }

//Função de helpdesk para cada unidade
    public function ugpPessoal(Request $request){
        $data = [
            'entityTypeId' => 132,
            'fields' => [
                'title' => 'HELP DESK - PADRÃO - UGP',
                'company_id' => 0,
                'contactId' => 0,
                'createdBy' => app('userBitrix')['ID'],
                'ufCrm6_1717789650' => $request->input('descricao'),
            ],
        ];

        $help = new Help($data);
        $help->method_add_crm();
    }

    public function uticPadrao(Request $request){
        $data = [
            'entityTypeId' => 132,
            'fields' => [
                'title' => 'HELP DESK - PADRÂO - UTIC',
                'company_id' => 0,
                'contactId' => 0,
                'createdBy' => app('userBitrix')['ID'],
                'ufCrm6_1710355684' => $request->input('descricao'),
                'ufCrm6_1709310414' => app('userBitrix')['ID'],
                'ufCrm6_1718048016' => $request->input('unidade')
            ],
        ];

        $help = new Help($data);
        $help->method_add_crm();
    }

    public function uticGestaoUsuario(Request $request){
        $data = [
            'entityTypeId' => 132,
            'fields' => [
                'title' => 'HELP DESK - GESTÃO DE USUÁRIO - UTIC',
                'company_id' => 0,
                'contactId' => 0,
                'createdBy' => app('userBitrix')['ID'],
                'ufCrm6_1710355684' => $request->input('descricao'),
                'ufCrm6_1718048016' => $request->input('unidade'),
                'ufCrm6_1717790089' => $request->input('cpf'),
                'ufCrm6_1717790131' => $request->input('data_nascimento'),
                'ufCrm6_1717790190' => $request->input('celular'),
                'ufCrm6_1717790220' => $request->input('nome_completo'),
                'ufCrm6_1717790255' => $request->input('coligada'),
                'ufCrm6_1717790276' => $request->input('sexo')
            ],
        ];

        $help = new Help($data);
        $help->method_add_crm();
    }

    public function usrEmpretec(Request $request){
        $data = [
            'entityTypeId' => 132,
            'fields' => [
                'title' => 'HELP DESK - EMPRETEC - USR',
                'company_id' => 0,
                'contactId' => 0,
                'createdBy' => app('userBitrix')['ID'],
                'ufCrm6_1718048016' => $request->input('unidade'),
                'ufCrm6_1717790327' => $request->input('responsável'),
                'ufCrm6_1718047121' => $request->input('servico'),
                'ufCrm6_1718047136' => $request->input('valor-total'),
                'ufCrm6_1718047171' => $request->input('data_inicio'),
                'ufCrm6_1718047190' => $request->input('objeto'),
                'ufCrm6_1718047208' => $request->input('justificativa'),
                'ufCrm6_1718902198' => $request->input('publico-alvo'),
                'ufCrm6_1718047266' => $request->input('pessoas-atendidas'),
                'ufCrm6_1718047294' => $request->input('local-servico'),
                'ufCrm6_1718047314' => $request->input('produto-servico'),
                'ufCrm6_1718047335' => $request->input('projeto'),
                'ufCrm6_1718047373' => $request->input('acao')
            ],
        ];

        $help = new Help($data);
        $help->method_add_crm();
    }

    public function usrMarketingCloud(Request $request){

        $publicoGeral = $request->input('publico-geral');
        $publicoEspecifico = ($publicoGeral == 'Pessoa Física') ? implode(',',$request->input('publico-especifico-pf'))
                          : (($publicoGeral == 'Pessoa Jurídica') ? implode(',',$request->input('publico-especifico-pj'))
                         : ($publicoGeral == 'Todos' ? implode(',',$request->input('publico-especifico-todos')) : 'Erro em validar público específico'));

        $data = [
            'entityTypeId' => 132,
            'fields' => [
                'title' => 'HELP DESK - MARKETING CLOUD - USR',
                'company_id' => 0,
                'contactId' => 0,
                'createdBy' => app('userBitrix')['ID'],
                'ufCrm6_1718048016' => $request->input('unidade'),
                'ufCrm6_1718047405' => $request->input('codigo-sas'),
                'ufCrm6_1711389512' => $request->input('evento'),
                'ufCrm6_1718134613' => implode(',',$request->input('tipo-acao')),
                'ufCrm6_1718134015' => $request->input('publico-geral'),
                'ufCrm6_1718134627' => $publicoEspecifico,
                'ufCrm6_1711478209' => $request->input('objetivo'),
                'ufCrm6_1718047527' => $request->input('divulgacao-link'),
                'ufCrm6_1718134035' => $request->input('quantidade-disparos-semana'),
                'ufCrm6_1718134663' => implode(',',$request->input('dias')),
                'ufCrm6_1718134676' => implode(',',$request->input('turno')),
                'ufCrm6_1718134061' => $request->input('antecedencia-disparos'),
            ],
        ];

        $help = new Help($data);
        $help->method_add_crm();
    }
    
    public function usrLoja(Request $request){

        $data = [
            'entityTypeId' => 132,
            'fields' => [
                'title' => 'HELP DESK - LOJA - USR',
                'company_id' => 0,
                'contactId' => 0,
                'createdBy' => app('userBitrix')['ID'],
                'ufCrm6_1718048016' => $request->input('unidade'),
                'ufCrm6_1718134073' => $request->input('gestor-responsavel'),
                'ufCrm6_1718134082' => $request->input('canal'),
                'ufCrm6_1711116178' => $request->input('acao'),
                'ufCrm6_1711117619' => $request->input('codsas-nome'),
                'ufCrm6_1718134090' => $request->input('modo'),
                'ufCrm6_1718047997' => $request->input('investimento'),
                'ufCrm6_1718047335' => $request->input('loja-projeto'),
                'ufCrm6_1718132479' => $request->input('loja-acao'),
                'ufCrm6_1718133416' => $request->input('loja-unidade'),
                'ufCrm6_1718048029' => $request->input('link-evento-loja'),
                'ufCrm6_1718048044' => $request->input('loja-alterar')
            ],
        ];

        $help = new Help($data);
        $help->method_add_crm();
    }

    public function usrProdutosInstantaneos(Request $request){

        $data = [
            'entityTypeId' => 132,
            'fields' => [
                'title' => 'HELP DESK - PRODUTOS INSTANTANEOS - USR',
                'company_id' => 0,
                'contactId' => 0,
                'createdBy' => app('userBitrix')['ID'],
                'ufCrm6_1718048016' => $request->input('unidade'),
                'ufCrm6_1718132543' => $request->input('instrumento'),
                'ufCrm6_1718048076' => $request->input('modalidade'),
                'ufCrm6_1718048090' => $request->input('argumento'),
                'ufCrm6_1718048110' => $request->input('conteudo-progamatico'),
                'ufCrm6_1718048131' => $request->input('tema'),
                'ufCrm6_1718048146' => $request->input('publico'),
                'ufCrm6_1718048159' => $request->input('subtema'),
                'ufCrm6_1718134098' => $request->input('emite-certificado'),
                'ufCrm6_1718134105' => $request->input('pago'),
                'ufCrm6_1718213234' => $request->input('valor-pago'),
            ],
        ];

        $help = new Help($data);
        $help->method_add_crm();
    }

    public function uacCanaisRemotos(Request $request){

        $data = [
            'entityTypeId' => 132,
            'fields' => [
                'title' => 'HELP DESK - CANAIS REMOTOS - UAC',
                'company_id' => 0,
                'contactId' => 0,
                'createdBy' => app('userBitrix')['ID'],
                'ufCrm6_1718048016' => $request->input('unidade'),
                'ufCrm6_1718047335' => $request->input('projeto-uac'),
                'ufCrm6_1718902198' => $request->input('publico-alvo-uac')[0],
                'ufCrm6_1718134613' => $request->input('tipo-acao'),
                'ufCrm6_1699451737804' => $request->input('descricao'),
            ],
        ];

        $help = new Help($data);
        $help->method_add_crm();
    }


    public function padrao(Request $request){

        $data = [
            'entityTypeId' => 132,
            'fields' => [
                'title' => 'HELP DESK - PADRÃO',
                'company_id' => 0,
                'contactId' => 0,
                'createdBy' => app('userBitrix')['ID'],
                'ufCrm6_1718048016' => $request->input('unidade'),
                'ufCrm6_1717789650' => $request->input('descricao')
            ],
        ];

        $help = new Help($data);
        $help->method_add_crm();
    }
    
}