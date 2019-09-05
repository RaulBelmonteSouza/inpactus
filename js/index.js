/*Funções para botões de contato*/
$(".orcamento").on("click",function () {
    $('#tab-orcamento').click();
});

$(".btn-orcamento").on('click',function () {
    $('#tab-contato').click();
});
$(".sv-box").on('click',function () {
   $('#tab-orcamento').click();
});

/*Efeitos de scroll*/
// Smooth scrolling
var scrollLink = $('.scroll');
scrollLink.click(function(e) {
    e.preventDefault();
    $('body,html').animate({
        scrollTop: $(this.hash).offset().top
    }, 1000 );
});

/*scroll top*/
$(document).on('scroll',function () {
    if ($(window).scrollTop() > 200){
        $('#scroll-top').slideDown(200);
    }else {
        $('#scroll-top').slideUp(200);
    }


});

$('#scroll-top').click(function (e) {
    e.preventDefault();
    $('body,html').animate({
        scrollTop : 0
    }, 1000)
});

/*masks*/
$(document).ready(function(){

    $('#telefone').mask('(99) 99999-9999');
    $('#telefoneorcamento').mask("(99) 99999-9999")

});

$(function () {
    $('#form-contato').validate({

        rules: {

            nome:{
              required: true,
              minlength:3
            },

            email:{
                required: true,
                minlength: 6
            },

            telefone:{
                required: true,
                minlength: 14
            },

            assunto:{
                required:true,
            },

            mensagem:{
                required:true
            }

        },

        messages: {

            nome:{
                required:"Por favor informe o seu nome!",
                minlength:"Informe um nome válido"
            },

            email: {
                required:"Por favor informe o seu E-mail!",
                minlength:"Por favor informe um E-mail válido!"
            },

            telefone: {
                required:"Por favor informe um telefone para contato!",
                minlength:"Por favor informe um telefone válido"
            },
            assunto: {
                required:"Por favor informe o assunto!"
            },
            mensagem: {
                required:"Por favor escreva uma mensagem!"
            }
        }

    })
});

$(function () {
    $("#form-orcamento").validate({

        rules: {

            nomeorcamento:{
                required: true,
                minlength:3
            },

            emailorcamento:{
                required: true,
                minlength: 6
            },

            telefoneorcamento:{
                required: true,
                minlength: 14
            },

            ramo:{
                required:true
            },

            detalhes:{
                required:true
            },

            investimento:{
                required:true
            }

        },

        messages: {

            nomeorcamento:{
                required:"Por favor informe o seu nome.",
                minlength:"Por favor informe um nome válido."
            },

            emailorcamento: {
                required:"Por favor informe um e-mail.",
                minlength:"Por favor informe um e-mail válido."
            },
            telefoneorcamento: {
                required:"Por favor informe um número para contato.",
                minlength:"Por favor informe um número válido."
            },
            ramo: {
                required:"Por favor informe o seu ramo de atuação.",
            },
            detalhes: {
                required:"Por favor informe os detalhes do seu projeto."
            },
            investimento: {
                required: "Por favor informe a sua expectativa de investimento."
            }

        }

    })
});

/*Contato*/
$('#form-contato').on('submit',function (event) {
    event.preventDefault();
    var acao = $('#acao').val();
    var nome = $('#nome').val();
    var email = $('#email').val();
    var telefone = $('#telefone').val();
    var assunto = $('#assunto').val();
    var mensagem = $('#mensagem').val();

    $.ajax({
            url: 'controller/ContatoController.php',
            type: 'POST',
            data: {acao:acao, nome:nome, email:email, telefone:telefone, assunto:assunto, mensagem:mensagem},
            beforeSend: function () {
                $('#btn-submit-contato').slideUp('slow');
                $('#spinner').slideDown('slow');
            },
            success: function (data) {
                if (data == 'true'){
                    $('#spinner').slideUp('slow');
                    $('#msg-sucesso').slideDown('slow');
                    setTimeout(function(){
                        $('#msg-sucesso').slideUp('slow');
                        $('#btn-submit-contato').slideDown('slow');
                    }, 8000);
                }else {
                    $('#spinner').slideUp('slow');
                    $('#msg-erro').slideDown(650);
                    setTimeout(function(){
                        $('#msg-erro').slideUp('slow');
                        $('#btn-submit-contato').slideDown('slow');
                    }, 8000);
                }
            },
            error: function (jqXHR, status, error) {

            }
        });


});

/*Orçamento*/
$('#form-orcamento').on('submit',function (event) {
    event.preventDefault();
    var acao = $('#acao-orcamento').val();
    var nomeorcamento = $('#nomeorcamento').val();
    var empresa = $('#empresa').val();
    var emailorcamento = $('#emailorcamento').val();
    var telefoneorcamento = $('#telefoneorcamento').val();
    var ramo = $('#ramo').val();
    var detalhes = $('#detalhes').val();
    var investimento = $('#investimento').val();

    $.ajax({
        url: 'controller/solicitacaoOrcamentoController.php',
        type: 'POST',
        data: {acao:acao, nomeorcamento:nomeorcamento, empresa:empresa, emailorcamento:emailorcamento, telefoneorcamento:telefoneorcamento, ramo:ramo, detalhes:detalhes, investimento:investimento},
        beforeSend: function () {
            $('#btn-submit-orcamento').slideUp('slow');
            $('#spinner-orcamento').slideDown('slow');
        },
        success: function (data) {
            if (data == 'true'){
                $('#spinner-orcamento').slideUp('slow');
                $('#msg-sucesso-orcamento').slideDown('slow');
                setTimeout(function(){
                    $('#msg-sucesso-orcamento').slideUp('slow');
                    $('#btn-submit-orcamento').slideDown('slow');
                }, 8000);
            }else {
                $('#spinner-orcamento').slideUp('slow');
                $('#msg-erro-orcamento').slideDown(650);
                setTimeout(function(){
                    $('#msg-erro-orcamento').slideUp('slow');
                    $('#btn-submit-orcamento').slideDown('slow');
                }, 8000);
            }
        },
        error: function (jqXHR, status, error) {

        }
    });


});



