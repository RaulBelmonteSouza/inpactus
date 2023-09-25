<?php
date_default_timezone_set('America/Sao_Paulo');
require_once '../model/solicitacaoOrcamento.php';
require_once '../PHPMailer/PHPMailer-master/src/SMTP.php';
require_once '../PHPMailer/PHPMailer-master/src/PHPMailer.php';
require_once '../PHPMailer/PHPMailer-master/src/Exception.php';
$slcOrcamento = new solicitacaoOrcamento();

if (!empty($_POST['acao']) and $_POST['acao'] == 'orcamento'){

    $slcOrcamento->setNome($_POST['nomeorcamento']);
    $slcOrcamento->setNomeEmpresa($_POST['empresa']);
    $slcOrcamento->setEmail($_POST['emailorcamento']);
    $slcOrcamento->setTelefone($_POST['telefoneorcamento']);
    $slcOrcamento->setRamo($_POST['ramo']);
    $slcOrcamento->setDetalhes($_POST['detalhes']);
    $slcOrcamento->setInvestimento($_POST['investimento']);
    $slcOrcamento->setDataSolicitacao(date('Y-m-d H:i:s'));

    /*Enviando e-mail para a inpactus*/
    if ($slcOrcamento->insert()){

        /*REDIRECIONANDO DADOS PARA A INPACTUS*/
        $senha = "xxx";
        $mailer = new \PHPMailer\PHPMailer\PHPMailer();
        $mailer->isSMTP();
        $mailer->CharSet = "utf8";
        $mailer->SMTPDebug = false;
        $mailer->SMTPAuth = true;
        $mailer->SMTPSecure = 'tls';
        $mailer->Host="smtp.gmail.com";
        $mailer->Port = 587;
        $mailer->Username = "inpactustecnologia@gmail.com";
        $mailer->Password = $senha;
        $mailer->FromName = $slcOrcamento->getNome();
        $mailer->From = "inpactustecnologia@gmail.com";
        $mailer->addAddress("inpactustecnologia@gmail.com", 'Inpactus');
        $mailer->isHTML(true);



        $dataContatacao = date('d/m/Y H:m');
        $mailer->Subject = "Solicitação de orçamento - ". $slcOrcamento->getNome()."  ". $dataContatacao;


        $mailer->Body =
            "E-mail enviado por: ".$slcOrcamento->getNome()." da empresa ".$slcOrcamento->getNomeEmpresa()."<br/>".
            "Telefone para contato: ".$slcOrcamento->getTelefone()."<br/>".
            "E-mail para contato: ".$slcOrcamento->getEmail()."<br/>".
            "Ramo de atuação: ".$slcOrcamento->getRamo()."<br/>".
            "Investimento inicial: ".$slcOrcamento->getInvestimento()."<br/>".
            "<strong>Detalhes:</strong><br/>".
            "<p style='margin: 5px;'>". $slcOrcamento->getDetalhes(). "</p>";

        /*Enviando e-mail*/
        if ($mailer->send()){
            /*ENVIANDO E-MAIL DE CONFIRMAÇÃO AO CLIENTE*/
            $senha = "xxx";
            $mailer = new \PHPMailer\PHPMailer\PHPMailer();
            $mailer->isSMTP();
            $mailer->CharSet = "utf8";
            $mailer->SMTPDebug = false;
            $mailer->SMTPAuth = true;
            $mailer->SMTPSecure = 'tls';
            $mailer->Host="smtp.gmail.com";
            $mailer->Port = 587;
            $mailer->Username = "inpactustecnologia@gmail.com";
            $mailer->Password = $senha;
            $mailer->FromName = "Inpactus Tecnologia.";
            $mailer->From = "inpactustecnologia@gmail.com";
            $mailer->addAddress($slcOrcamento->getEmail());
            $mailer->isHTML(true);
            $mailer->Subject = "Agradecimento - Recebemos sua solicitação ". $slcOrcamento->getNome();


            $mailer->Body =
                "<strong>INPACTUS TECNOLOGIA</strong>".
                "<p>Olá ".$slcOrcamento->getNome()."!</p>".
                "<p>Recebemos a sua solicitação, em breve entraremos em contato com você. Muito obrigado por nos escolher!</p>".
                "<p>Estamos a sua disposição, qualquer dúvida você pode entrar em contato conosco!</p>".
                "<p>Pelo telefone: (55)9 8466-1059</p>".
                "<p>Ou pelo E-mail: inpactustecnologia@gmail.com</p>".
                "<p>Tenha um bom dia, atenciosamente <strong>Inpactus Tecnologia</strong></p>".
                "<strong style='margin: 5px'><i>Está mensagem é gerada automaticamente, por favor não responda.</i></strong>";

            if ($mailer->send()){
                $respostaAjax = 'true';
                echo $respostaAjax;
            }else{
                $respostaAjax = 'false';
                echo $respostaAjax;
            }

        }else{
            $respostaAjax = 'false';
            echo $respostaAjax;
        }

    }else{
        $respostaAjax = 'false';
        echo $respostaAjax;
    }


}else{
    $respostaAjax = 'false';
    echo $respostaAjax;
}