<template>
    <div class="emailNotesStyle">{{ $msg.emailVerificationMessageBelowNotes }}</div>
    <div class="emailNotesStyle">• {{ $msg.emailVerificationMessageBelowSpam }}</div>
    <div class="emailNotesStyle">• {{ $msg.emailVerificationMessageBelowDomains }}</div>
    <ul class="">
        <li class="ml-5 emailNotesStyle">• owlsearchgame.com</li>
        <li class="ml-5 emailNotesStyle">• owlsearchgames.com</li>
    </ul>
    <div class="emailNotesStyle">• {{ $msg.emailVerificationMessageBelowNoReply }}</div>
    <div class="h-1" />
</template>
<style lang="postcss" scoped>
.emailNotesStyle {
    @apply font-semibold text-sm text-orange-700 dark:text-amber-100;
}
</style>