<?php 

namespace App\UserClasses;

use App\Models\Score;
use App\UserClasses\Misc;

class LanguageEn extends BaseLanguage {
    protected static $lang = [
        'action' => 'Action',
        'actions' => 'Actions',
        'alreadyRegistered' => 'Already registered?',
        'category' => 'Category',
        'categoryChoose' => 'Choose category',
        'categoryFilter' => 'Filter by category',
        'categoryNotFilter' => 'Do NOT filter by category',
        'congratulations' => 'Congratulations!',
        'content' => 'Content',
        'contentPlaceholder' => 'Insert the content...',
        'country' => 'Country',
        'countrySelect' => 'No Country Selected',
        'createdAt' => 'Created at',
        'currentlocale' => 'Current Locale',
        'dashboard' => 'Dashboard',
        'delete' => 'Delete',
        'deleteModalCancelButtonText' => 'Nope, cancel this.',
        'deleteModalConfirmButtonText' => 'Yes, delete it!',
        'deleteModalTitle' => 'Are you sure?',
        'deleteModalText' => 'You will not be able to revert this action!',
        'deleteUserAccount' => 'Remove this user account',
        'difficulty0' => 'Easy.',
        'difficulty1' => 'Intermediate.',
        'difficulty2' => 'Difficult.',
        'difficulty3' => 'Very difficult.',
        'difficulty4' => 'Insane!',
        'difficultyLevelPredicted' => 'Predicted Difficulty Level:',
        'difficultyWordsDifficult' => 'Prefer the more difficult words.',
        'difficultyWordsEasy' => 'Prefer the easier words.',
        'difficultyWordsMiddle' => 'Choose randomly easy/difficult words.',
        'directDb' => 'Direct DB',
        'edit' => 'Edit',
        'email' => 'Email',
        'emailPlaceholder' => 'Type in a valid email address...',
        'emailVerification' => 'Email Verification',
        'emailVerificationAction' => 'Verify Email Address',
        'emailVerificationBigMessage' => 'Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you did not receive the email, we will gladly send you another.',
        'emailVerificationGreeting' => 'Hello',
        'emailVerificationInError' => 'If you received this message without requesting it, no further action is necessary.',
        'emailVerificationLine01' => 'You received this email because you registered in our website.',
        'emailVerificationLine02' => 'Click the button below to verify your email address.',
        'emailVerificationLine03' => 'You received this email because you requested to update your email address in our website.',
        'emailVerificationLineBelow' => 'If you are having trouble clicking on the button above, copy and paste the following URL into your web browser:',
        'emailVerificationMessageBelowDomains' => 'Or add our domains to the Safe Senders List in your email provider:',
        'emailVerificationMessageBelowNoReply' => 'Or add noreply@owlsearchgame.com to the contact list of your email provider.',
        'emailVerificationMessageBelowNotes' => 'Notes:',
        'emailVerificationMessageBelowSpam' => 'If you experience issues in receiving our emais, please check your spam box.',
        'emailVerificationResend' => 'Resend Verification Email',
        'emailVerificationSalutation' => 'Best regards,',
        'emailVerificationSmallMessage' => 'A new verification link has been sent to the email address you provided during registration.',
        'emailVerificationSubject' => 'Verify The Email Address',
        'error' => 'ERROR',
        'execute' => 'execute',
        'forgotMyPassword' => 'I forgot my password',
        'forgotPasswordMainRule' => 'Old password not found.',
        'forgotPasswordOf' => 'of',
        'forgotPasswordOption' => 'Option',
        'forgotPasswordPlaceholderEmail' => 'Type in a valid email address...',
        'forgotPasswordPlaceholderPassword' => 'Type in an old password...',
        'forgotPasswordPlaceholderUserId' => 'Type in your User ID...',
        'forgotYourPassword' => 'Forgot your password?',
        'forgotYourPasswordEmail' => 'Type in the e-mail address you used when you registered in our website:',
        'forgotYourPasswordNoProblem' => 'No problem!',
        'forgotYourPasswordOldPassword' => 'Type in your User ID and any old password that you recall on the fields below:',
        'forgotYourPasswordTrySomethingElse' => 'Try Something Else',
        'forgotYourPasswordUserId' => 'Type in your User ID on the field below:',
        'gainedALevel' => 'You have gained a level!',
        'gameCompleted' => 'You completed this game!',
        'generateNewGame' => 'Generate New Game',
        'generateQuickGame' => 'Generate a Quick Game',
        'genericError' => 'Something did not go well with your request.',
        'genericFieldError' => 'Invalid Field!',
        'guest' => 'Guest',
        'helloWorld' => 'Hello World',
        'home' => 'Home',
        'id' => 'id',
        'infoNotUpdateProfile' => 'Profile not updated.',
        'information' => 'Information',
        'lightBulbPopupBecameDonor1' => 'Thank you for your donation!',
        'lightBulbPopupGainAdvanced1' => 'You leveled up to the ',
        'lightBulbPopupGainAdvanced2' => 'Advanced Level!',
        'lightBulbPopupGainAdvanced3' => 'This level includes:',
        'lightBulbPopupGainAdvanced4' => '• Exclusive backgrounds!',
        'lightBulbPopupGainAdvanced5' => '• Very difficult games!',
        'lightBulbPopupGainAdvanced6' => 'Enjoy!',
        'lightBulbPopupGainPremium1' => 'You leveled up to the ',
        'lightBulbPopupGainPremium2' => 'Premium Level!',
        'lightBulbPopupGainPremium3' => 'This level includes:',
        'lightBulbPopupGainPremium4' => '• Exclusive backgrounds!',
        'lightBulbPopupGainPremium5' => '• Insanely difficult games!',
        'lightBulbPopupGainPremium6' => 'Enjoy!',
        'lightBulbPopupGainPremiumPromo1' => 'You leveled up to the ',
        'lightBulbPopupGainPremiumPromo2' => 'Premium Promo Level!',
        'lightBulbPopupGainPremiumPromo3' => 'This level includes:',
        'lightBulbPopupGainPremiumPromo4' => '• Exclusive backgrounds!',
        'lightBulbPopupGainPremiumPromo5' => '• Insanely difficult games!',
        'lightBulbPopupGainPremiumPromo6' => '• Complete control over the game parameters, including: width, height, word quantity and difficulty!',
        'lightBulbPopupGainPremiumPromo7' => 'Enjoy!',
        'lightBulbPopupGoToAdvanced1' => 'Amass ' . Score::POINTS_ADVANCED . ' points to level up to the Advanced Level!',
        'lightBulbPopupGoToAdvanced2' => 'This level includes:',
        'lightBulbPopupGoToAdvanced3' => '• Exclusive backgrounds!',
        'lightBulbPopupGoToAdvanced4' => '• Very difficult games!',
        'lightBulbPopupGoToPremium1' => 'Amass ' . Score::POINTS_PREMIUM . ' points to level up to the Premium Level!',
        'lightBulbPopupGoToPremium2' => 'This level includes:',
        'lightBulbPopupGoToPremium3' => '• Exclusive backgrounds!',
        'lightBulbPopupGoToPremium4' => '• Insanely difficult games!',
        'lightBulbPopupGoToPremiumPromo1' => 'Amass ' . Score::POINTS_PREMIUM . ' points to level up to the Premium Promo Level!',
        'lightBulbPopupGoToPremiumPromo2' => 'This level includes:',
        'lightBulbPopupGoToPremiumPromo3' => '• Exclusive backgrounds!',
        'lightBulbPopupGoToPremiumPromo4' => '• Insanely difficult games!',
        'lightBulbPopupGoToPremiumPromo5' => '• Complete control over the game parameters, including: width, height, word quantity and difficulty!',
        'lightBulbPopupGoToPremiumPromo6' => 'Offer valid until ' . Misc::END_PROMO_DATE_EN . '.',
        'lightBulbPopupLoginRegister1' => '',
        'lightBulbPopupLoginRegister2' => 'Login',
        'lightBulbPopupLoginRegister3' => ' to accumulate score and to win prizes!',
        'lightBulbPopupLoginRegister4' => 'No account? ',
        'lightBulbPopupLoginRegister5' => 'Register',
        'lightBulbPopupLoginRegister6' => '.',
        'locale' => 'Locale',
        'localeChange' => 'Locale',
        'localePreferred' => 'Preferred Locale',
        'localeSelect' => 'Select Locale',
        'loggedIn' => 'You are logged in.',
        'login' => 'Login',
        'login2' => 'Log in',
        'login3' => 'Login',
        'loginFailed' => 'The provided credentials do not match our records.',
        'loginSuccess' => 'You are logged in.',
        'logout' => 'Logout',
        'logout2' => 'Log out',
        'mainHeight' => 'Height:',
        'mainWidth' => 'Width:',
        'mainWordCount' => '# of Words:',
        'mainWordDifficulty' => 'Word Difficulty:',
        'name' => 'Name',
        'newQuery' => 'New Query',
        'noAccount' => 'No Account?',
        'noRecords' => 'No records were found matching the search criteria.',
        'orGenerateNewGame' => 'Or, generate a custom new game using the full game controls below:',
        'password' => 'Password',
        'passwordConfirmation' => 'Password Confirmation',
        'passwordConfirmationPlaceholder' => 'Retype your password...',
        'passwordCurrent' => 'Current Password',
        'passwordCurrentPlaceholder' => 'Type in your current password...',
        'passwordExpired' => 'Password Expired',
        'passwordExpiredAction' => 'Reset Password',
        'passwordExpiredGreeting' => 'Hello',
        'passwordExpiredInError' => 'If you received this message without requesting it, no further action is necessary.',
        'passwordExpiredLine01' => 'You received this email because your password expired.',
        'passwordExpiredLine02' => 'Click on the button below and set a new password.',
        'passwordExpiredLine03' => 'This action is needed for you to continue to use our website.',
        'passwordExpiredLineBelow' => 'If you are having trouble clicking on the button above, copy and paste the following URL into your web browser:',
        'passwordExpiredLogout' => 'Or, if you do not wish to set a new password right now, you may logout.',
        'passwordExpiredSalutation' => 'Best regards,',
        'passwordExpiredSubject' => 'Verify The Expired Password',
        'passwordNew' => 'New Password',
        'passwordNewPlaceholder' => 'Type in your new password...',
        'passwordPlaceholder' => 'Type in your password...',
        'profileDelete' => 'Remove Profile',
        'profileDeletePreText' => 'Or, if you wish, you may cancel this account.',
        'profileDeleteText' => 'Removing this account deletes the user info and terminates the Word Search Game service for this user.',
        'profileEdit' => 'Edit Profile',
        'pronoun' => 'Your Title',
        'pronounSelect' => 'Select your Title',
        'queryDb' => 'Query DB',
        'quickGenerateNewGame' => 'Choose difficulty and quiclky generate a new game by pressing the following button:',
        'redefinePassword' => 'Redefine Your Password',
        'redefinePasswordText' => 'We have sent an email to the email address registered with us, containing instructions for redefining your password.',
        'register' => 'Register',
        'registerNewUser' => 'Register New User',
        'rememberMe' => 'Remember me',
        'save' => 'Save',
        'score' => 'Score',
        'searchContent' => 'search content...',
        'searchTitle' => 'search title...',
        'selected' => 'Selected',
        'selectedPlural' => 'Selected',
        'showEmail' => 'Show email',
        'showName' => 'Show user name',
        'showPronoun' => 'Show title',
        'showUserId' => 'Show user ID',
        'somethingWentWrong' => 'Something went wrong with your request.',
        'success' => 'Success!',
        'successDeleteProfile' => 'User account deleted.',
        'successStoreProfile' => 'New user created!',
        'successTokenExpiredResend' => 'Password reset email has been sent.',
        'successUpdatePassword' => 'Password updated successfully.',
        'successUpdateProfile' => 'User Profile updated successfully.',
        'sessionTerminate' => 'Finish this session.',
        'teamRegister' => 'Team Member Register',
        'title' => 'Title',
        'titlePlaceholder' => 'Insert a title...',
        'tokenExpired' => 'Token Expired',
        'tokenExpiredButton' => 'Resend Email',
        'tokenExpiredText' => 'Both your password and the token message we sent you have expired. Click on the button below to resend a new password reset email.',
        'tokenExpiredTitle' => 'Password Expired',
        'tryAgainLater' => 'Please try again later.',
        'unauthorized' => 'Unauthorized',
        'undefinedError' => 'An undefined error has occurred.',
        'updateExpiredPassword' => 'Set a New Password',
        'updatePassword' => 'Update Password',
        'userId' => 'User ID',
        'userIdFirstCharacterRule' => 'The first character must be a lowercase letter',
        'userIdLastCharacterRule' => 'The last character must be either a lowercase letter or a digit',
        'userIdMainRule' => 'The User ID must be composed of only lowercase letters, digits, dots and/or underscores.',
        'userIdPlaceholder' => 'Type in your user id...',
        'userName' => 'Name',
        'userNamePlaceholder' => 'Type in your name...',
        'welcome' => 'Welcome',
        'welcomeF' => 'Welcome',
        'welcomeM' => 'Welcome',
        'welcomeWSG' => 'Welcome to the Owl Search Games!',
        'wordList' => 'Word List',
        'wordSearchGame' => 'Owl Search Games',
        'whoops' => 'Whoops!'
    ];
}