<template>
    <div class="emailNotesStyle">{{ $msg.emailVerificationMessageBelowNotes }}</div>
    <div class="emailNotesStyle">• {{ $msg.emailVerificationMessageBelowSpam }}</div>
    <div class="emailNotesStyle">• {{ $msg.emailVerificationMessageBelowDomains1 }} 
                                    <span class="domainStyle">owlsearchgames.com</span> 
                                    {{ $msg.emailVerificationMessageBelowDomains2 }}
                                    <span class="underline">{{ $msg.emailVerificationMessageBelowDomains3 }}</span>
                                    {{ $msg.emailVerificationMessageBelowDomains4 }}
    </div>
    <div class="emailNotesStyle">• {{ $msg.emailVerificationMessageBelowNoReply1 }} 
                                    <span class="domainStyle">noreply@owlsearchgames.com</span> 
                                    {{ $msg.emailVerificationMessageBelowNoReply2 }}
                                    <span class="underline">{{ $msg.emailVerificationMessageBelowNoReply3 }}</span>
                                    {{ $msg.emailVerificationMessageBelowNoReply4 }}
    </div>
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