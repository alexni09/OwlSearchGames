<?php 

namespace App\UserClasses;

use App\Models\Score;
use App\UserClasses\Misc;

class LanguagePt extends BaseLanguage {
    protected static $lang = [
        'action' => 'Ação',
        'actions' => 'Ações',
        'alreadyRegistered' => 'Já está registado(a)?',
        'category' => 'Categoria',
        'categoryChoose' => 'Escolha a categoria',
        'categoryFilter' => 'Filtrar por categoria',
        'categoryNotFilter' => 'NÃO filtrar por categoria',
        'congratulations' => 'Parabéns!',
        'content' => 'Conteúdo',
        'contentPlaceholder' => 'Insira o conteúdo...',
        'country' => 'País',
        'countrySelect' => 'Nenhum País Selecionado',
        'createdAt' => 'Criado em',
        'currentLocale' => 'Linguagem Atual',
        'dashboard' => 'Painel',
        'delete' => 'Apagar',
        'deleteModalCancelButtonText' => 'Não - cancelar.',
        'deleteModalConfirmButtonText' => 'Sim - Apagar!',
        'deleteModalTitle' => 'Tens certeza?',
        'deleteModalText' => 'Não será possível reverter essa ação!',
        'deleteUserAccount' => 'Remover esta conta de usuário',
        'difficulty0' => 'Fácil.',
        'difficulty1' => 'Médio.',
        'difficulty2' => 'Difícil.',
        'difficulty3' => 'Muito difícil.',
        'difficulty4' => 'Insano!',
        'difficultyLevelPredicted' => 'Nível de Dificuldade Previsto:',
        'difficultyWordsDifficult' => 'Preferir as palavras mais difíceis.',
        'difficultyWordsEasy' => 'Preferir as palavras mais fáceis.',
        'difficultyWordsMiddle' => 'Tanto faz palavras fáceis ou difíceis.',
        'directDb' => 'Direct DB',
        'edit' => 'Editar',
        'email' => 'Email',
        'emailPlaceholder' => 'Digite um email válido...',
        'emailVerification' => 'Verificação de Email',
        'emailVerificationAction' => 'Verificar Endereço de Email',
        'emailVerificationBigMessage' => 'Obrigado por se registar! Antes de começar, poderia verificar o seu endereço de email clicando no link que acabamos de enviar? Se não recebeu o email, enviaremos outro.',
        'emailVerificationGreeting' => 'Olá',
        'emailVerificationInError' => 'Se recebeu esta mensagem sem a ter solicitado, nenhuma outra ação se faz necessária.',
        'emailVerificationLine01' => 'Recebeu este email porque solicitou inscrição em nosso sítio.',
        'emailVerificationLine02' => 'Clique no botão abaixo para verificar seu endereço de email.',
        'emailVerificationLine03' => 'Recebeu este email porque solicitou alteração do seu endereço de email em nosso sítio.',
        'emailVerificationLineBelow' => 'Se encontrou dificuldade em apertar o botão acima, copie e cole a URL seguinte em seu navegador:',
        'emailVerificationMessageBelowDomains1' => 'Ou adicione',
        'emailVerificationMessageBelowDomains2' => 'à',
        'emailVerificationMessageBelowDomains3' => 'lista de emails seguros',
        'emailVerificationMessageBelowDomains4' => 'do seu provedor de email.',
        'emailVerificationMessageBelowNoReply1' => 'Ou adicione',
        'emailVerificationMessageBelowNoReply2' => 'à',
        'emailVerificationMessageBelowNoReply3' => 'lista de contactos',
        'emailVerificationMessageBelowNoReply4' => 'do seu provedor de email.',
        'emailVerificationMessageBelowNotes' => 'Observações:',
        'emailVerificationMessageBelowSpam' => 'Se não recebe nossos emails, por favor verifique sua caixa de spam.',
        'emailVerificationResend' => 'Reenviar Email de Verificação',
        'emailVerificationSalutation' => 'Cordiais Saudações,',
        'emailVerificationSmallMessage' => 'Um novo link de verificação foi enviado ao endereço de email informado durante o registro.',
        'emailVerificationSubject' => 'Verifique o Endereço de Email',
        'error' => 'ERRO',
        'execute' => 'executar',
        'forgotMyPassword' => 'Esqueci a minha palavra-passe',
        'forgotPasswordMainRule' => 'Palavra-Passe antiga não encontrada.',
        'forgotPasswordOf' => 'de',
        'forgotPasswordOption' => 'Opção',
        'forgotPasswordPlaceholderEmail' => 'Digite um endereço de email válido...',
        'forgotPasswordPlaceholderPassword' => 'Digite uma palavra-passe antiga...',
        'forgotPasswordPlaceholderUserId' => 'Digite uma ID de usuário...',
        'forgotYourPassword' => 'Esqueceu sua palavra-passe?',
        'forgotYourPasswordEmail' => 'Digite o endereço de email que utilizou ao se registar em nosso sítio:',
        'forgotYourPasswordNoProblem' => 'Sem problemas!',
        'forgotYourPasswordOldPassword' => 'Digite sua ID de usuário e alguma palavra-passe antiga que se lembre nos campos abaixo:',
        'forgotYourPasswordTrySomethingElse' => 'Tentar Algo Diferente',
        'forgotYourPasswordUserId' => 'Digite a sua ID de Usuário no campo abaixo:',
        'gainedALevel' => 'Ganhou um Nível!',
        'gameCompleted' => 'Completou este jogo!',
        'generateNewGame' => 'Gerar Novo Jogo',
        'generateQuickGame' => 'Gerar Jogo Rápido',
        'genericError' => 'Algo correu mal com o seu pedido.',
        'genericFieldError' => 'Campo Inválido!',
        'guest' => 'Convidado(a)',
        'helloWorld' => 'Olá Mundo',
        'home' => 'Página Inicial',
        'id' => 'id',
        'infoNotUpdateProfile' => 'Perfil não atualizado.',
        'information' => 'Informação',
        'lightBulbPopupBecameDonor1' => 'Muito Obrigado pela sua doação!',
        'lightBulbPopupGainAdvanced1' => 'Acedeu ao ',
        'lightBulbPopupGainAdvanced2' => 'Nível Avançado!',
        'lightBulbPopupGainAdvanced3' => 'Este nível inclui:',
        'lightBulbPopupGainAdvanced4' => '• Telas de fundo exclusivas!',
        'lightBulbPopupGainAdvanced5' => '• Jogos muito difíceis!',
        'lightBulbPopupGainAdvanced6' => 'Aproveite!',
        'lightBulbPopupGainPremium1' => 'Acedeu ao ',
        'lightBulbPopupGainPremium2' => 'Nível Premium!',
        'lightBulbPopupGainPremium3' => 'Este nível inclui:',
        'lightBulbPopupGainPremium4' => '• Telas de fundo exclusivas!',
        'lightBulbPopupGainPremium5' => '• Jogos insanamente difíceis!',
        'lightBulbPopupGainPremium6' => 'Aproveite!',
        'lightBulbPopupGainPremiumPromo1' => 'Acedeu ao ',
        'lightBulbPopupGainPremiumPromo2' => 'Nível Premium Promocional!',
        'lightBulbPopupGainPremiumPromo3' => 'Este nível inclui:',
        'lightBulbPopupGainPremiumPromo4' => '• Telas de fundo exclusivas!',
        'lightBulbPopupGainPremiumPromo5' => '• Jogos insanamente difíceis!',
        'lightBulbPopupGainPremiumPromo6' => '• Controle completo sobre os parâmentros do jogo, incluindo: largura, altura, quantidade e dificuldade das palavras!',
        'lightBulbPopupGainPremiumPromo7' => 'Aproveite!',
        'lightBulbPopupGoToAdvanced1' => 'Acumule ' . Score::POINTS_ADVANCED . ' pontos para aceder ao Nível Avançado!',
        'lightBulbPopupGoToAdvanced2' => 'Esse nível inclui:',
        'lightBulbPopupGoToAdvanced3' => '• Telas de fundo exclusivas!',
        'lightBulbPopupGoToAdvanced4' => '• Jogos muito difíceis!',
        'lightBulbPopupGoToPremium1' => 'Acumule ' . Score::POINTS_PREMIUM . ' pontos para aceder ao Nível Premium!',
        'lightBulbPopupGoToPremium2' => 'Este nível inclui:',
        'lightBulbPopupGoToPremium3' => '• Telas de fundo exclusivas!',
        'lightBulbPopupGoToPremium4' => '• Jogos insanamente difíceis!',
        'lightBulbPopupGoToPremiumPromo1' => 'Acumule ' . Score::POINTS_PREMIUM . ' pontos para aceder ao Nível Premium Promocional!',
        'lightBulbPopupGoToPremiumPromo2' => 'Este nível inclui:',
        'lightBulbPopupGoToPremiumPromo3' => '• Telas de fundo exclusivas!',
        'lightBulbPopupGoToPremiumPromo4' => '• Jogos insanamente difíceis!',
        'lightBulbPopupGoToPremiumPromo5' => '• Controle completo sobre os parâmentros do jogo, incluindo: largura, altura, quantidade e dificuldade das palavras!',
        'lightBulbPopupGoToPremiumPromo6' => 'Esta promoção é válida até o dia ' . Misc::END_PROMO_DATE_PT . '.',
        'lightBulbPopupLoginRegister1' => 'Faça ',
        'lightBulbPopupLoginRegister2' => 'login',
        'lightBulbPopupLoginRegister3' => ' para acumular score e ganhar prêmios!',
        'lightBulbPopupLoginRegister4' => 'Não possui conta? ',
        'lightBulbPopupLoginRegister5' => 'Registe-se',
        'lightBulbPopupLoginRegister6' => '!',
        'locale' => 'Linguagem',
        'localeChange' => 'Linguagem',
        'localePreferred' => 'Linguagem Preferida',
        'localeSelect' => 'Selecione a Linguagem',
        'loggedIn' => 'Você efetuou login.',
        'login' => 'Entrar',
        'login2' => 'Entrar',
        'login3' => 'Fazer Login',
        'loginFailed' => 'As credenciais apresentadas não conferem com nossos registros.',
        'loginSuccess' => 'Entrou no sistema.',
        'logout' => 'Sair',
        'logout2' => 'Sair',
        'mainHeight' => 'Altura:',
        'mainWidth' => 'Largura:',
        'mainWordCount' => 'Qtd. de Palavras:',
        'mainWordDifficulty' => 'Dificuldade das Palavras:',
        'name' => 'Nome',
        'noAccount' => 'Não possui conta?',
        'newQuery' => 'Nova Consulta',
        'noRecords' => 'Nenhum registro encontrado com os critério(s) especificado(s).',
        'orGenerateNewGame' => 'Ou, gere um novo jogo customizado, utilizando os controles abaixo:',
        'password' => 'Palavra-Passe',
        'passwordConfirmation' => 'Confirmar Palavra-Passe',
        'passwordConfirmationPlaceholder' => 'Redigite sua palavra-passe...',
        'passwordCurrent' => 'Palavra-Passe Atual',
        'passwordCurrentPlaceholder' => 'Digite sua palavra-passe atual...',
        'passwordExpired' => 'Palavra-Passe Expirada',
        'passwordExpiredAction' => 'Atribuir Nova Palavra-Passe',
        'passwordExpiredInError' => 'Se recebeu esta mensagem sem a ter solicitado, nenhuma outra ação se faz necessária.',
        'passwordExpiredGreeting' => 'Olá',
        'passwordExpiredLine01' => 'Recebeu esta mensagem porque sua palavra-passe expirou.',
        'passwordExpiredLine02' => 'Clique no botão abaixo e atribua a nova palavra-passe.',
        'passwordExpiredLine03' => 'Essa ação é necessária para continuar a utilizar nosso sítio.',
        'passwordExpiredLineBelow' => 'Se encontrou dificuldade em apertar o botão acima, copie e cole a URL seguinte em seu navegador:',
        'passwordExpiredLogout' => 'Ou, caso não deseje atribuir uma nova palavra-passe neste momento, poderá fazer logout.',
        'passwordExpiredSalutation' => 'Cordiais Saudações,',
        'passwordExpiredSubject' => 'Verifique a Palavra-Passe Expirada',
        'passwordNew' => 'Nova Palavra-Passe',
        'passwordNewPlaceholder' => 'Digite sua nova palavra-passe...',
        'passwordPlaceholder' => 'Digite sua palavra-passe...',
        'profileDelete' => 'Remover Perfil',
        'profileDeletePreText' => 'Ou, se desejar, pode cancelar esta conta.',
        'profileDeleteText' => 'Remover esta conta exclui suas informações e termina o serviço Owl Search Games para este usuário.',
        'profileEdit' => 'Editar Perfil',
        'pronoun' => 'Pronome',
        'pronounSelect' => 'Selecione o Pronome',
        'queryDb' => 'Query DB',
        'quickGenerateNewGame' => 'Escolha a dificuldade e rapidamente gere um novo jogo, apertando o botão a seguir:',
        'redefinePassword' => 'Redefinir sua Palavra-Passe',
        'redefinePasswordText' => 'Enviamos um email para o endereço de email registrado conosco, contendo instruções para atribuir sua nova palavra-passe.',
        'register' => 'Registar',
        'registerNewUser' => 'Novo Usuário',
        'rememberMe' => 'Lembrar-me',
        'save' => 'Salvar',
        'score' => 'Score',
        'searchContent' => 'pesquisar conteúdo...',
        'searchTitle' => 'pesquisar título...',
        'selected' => 'Selecionado',
        'selectedPlural' => 'Selecionados',
        'showEmail' => 'Exibir email',
        'showName' => 'Exibir nome do usuário',
        'showPronoun' => 'Exibir pronome',
        'showUserId' => 'Exibir ID de usuário',
        'somethingWentWrong' => 'Algo correu mal com o seu pedido.',
        'success' => 'Sucesso!',
        'successDeleteProfile' => 'Conta de usuário excluída.',
        'successStoreProfile' => 'Novo usuário foi criado!',
        'successTokenExpiredResend' => 'Email para atribuir nova palavra-passe foi enviado.',
        'successUpdatePassword' => 'Palavra-Passe atualizada.',
        'successUpdateProfile' => 'Perfil do usuário atualizado.',
        'sessionTerminate' => 'Terminar esta sessão.',
        'teamRegister' => 'Registo de Membros da Equipe',
        'title' => 'Título',
        'titlePlaceholder' => 'Insira um título...',
        'tokenExpired' => 'Token Expirado',
        'tokenExpiredButton' => 'Reenviar Email',
        'tokenExpiredText' => 'A sua palavra-passe e a mensagem de token que lhe enviamos estão expiradas. Clique no botão abaixo para reenviar um novo email de atribuição de palavra-passe.',
        'tokenExpiredTitle' => 'Palavra-Passe Expirada',
        'tryAgainLater' => 'Por favor tente novamente mais tarde.',
        'unauthorized' => 'Não autorizado',
        'undefinedError' => 'Ocorreu um erro indefinido.',
        'updateExpiredPassword' => 'Atribuir Nova Palavra-Passe',
        'updatePassword' => 'Alterar Palavra-Passe',
        'userId' => 'ID de Usuário',
        'userIdFirstCharacterRule' => 'O primeiro caracter deve ser uma letra mínuscula. (Sem acento.)',
        'userIdLastCharacterRule' => 'O último caracter deve ser uma letra minúscula (sem acento) ou um algarismo',
        'userIdMainRule' => 'ID de Usuário aceita somente letras minúsculas (sem acentos), algarismos, pontos e/ou sublinhados.',
        'userIdPlaceholder' => 'Digite sua ID de Usuário...',
        'userName' => 'Nome',
        'userNamePlaceholder' => 'Digite seu nome...',
        'welcome' => 'Bem-vindo(a)',
        'welcomeF' => 'Bem-vinda',
        'welcomeM' => 'Bem-vindo',
        'welcomeWSG' => 'Bem-vindo ao Owl Search Games!',
        'wordList' => 'Lista de Palavras',
        'wordSearchGame' => 'Owl Search Games',
        'whoops' => 'Oops!'
    ];
}