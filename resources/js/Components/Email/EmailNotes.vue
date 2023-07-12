<template>
    <div class="emailNotesStyle">{{ $msg.emailVerificationMessageBelowNotes }}</div>
    <div class="emailNotesStyle">• {{ $msg.emailVerificationMessageBelowSpam }}</div>
    <div class="emailNotesStyle">• {{ $msg.emailVerificationMessageBelowDomains1 }} <span class="domainStyle">owlsearchgames.com</span> {{ $msg.emailVerificationMessageBelowDomains2 }}</div>
    <div class="emailNotesStyle">• {{ $msg.emailVerificationMessageBelowNoReply1 }} <span class="domainStyle">noreply@owlsearchgames.com</span> {{ $msg.emailVerificationMessageBelowNoReply2 }}</div>
    <div class="h-1" />
</template>
<style lang="postcss" scoped>
.domainStyle {
    @apply underline font-bold;
}
.emailNotesStyle {
    @apply font-semibold text-sm text-orange-700 dark:text-amber-100;
}
</style>