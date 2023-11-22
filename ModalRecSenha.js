// script.js

$(document).ready(function(){
    // Função para enviar e-mail de recuperação de senha
    function enviarEmailRecuperacao() {
      var email = $("#emailInput").val();
  
      // Validar o formato do e-mail 
      if (!isValidEmail(email)) {
        alert("Por favor, insira um endereço de e-mail válido.");
        return;
      }
  
      // Enviar o e-mail para o servidor para processamento
      $.ajax({
        type: "POST",
        url: "RecSenha.php", // caminho do script PHP que processa a recuperação
        data: { email: email },
        success: function(response){
          alert(response); // Exibir a resposta do servidor (pode ser uma mensagem de sucesso)
          $("#meuModal").modal("hide"); // Fechar o modal após o envio
        },
        error: function(xhr, status, error){
          console.error("Erro ao enviar e-mail: " + error);
          alert("Erro ao enviar e-mail. Por favor, tente novamente mais tarde.");
        }
      });
    }
  
    // Associar a função ao clique do botão "Gerar"
    $("#RecSenha").click(enviarEmailRecuperacao);
  
    // Função simples para validar o formato do e-mail
    function isValidEmail(email) {
      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
    }
  });
  