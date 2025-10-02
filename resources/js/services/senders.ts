import { useApi } from "@/composables/useApi";
import type { SendersReceiverJson } from '@/types/index'


export const SendersServices = {
    async fetchSenders(){
        return await useApi<SendersReceiverJson>('senders',{
            method: 'get'
        })
    }
}