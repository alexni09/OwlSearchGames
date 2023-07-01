/*
    Tests whether the user has that permission.
*/
import { toRaw } from 'vue'
import { usePage } from '@inertiajs/vue3'
export function useCan() {
    function can(permission) {
        const permissions = toRaw(usePage().props.auth.permissions)
        return permissions == null ? false : permissions.includes(permission)
    }
    return { can }
}