import { useApi } from "@/composables/useApi";
import type { SendersReceiverJson } from '@/types/index'


export const ReceiversServices = {
    async fetchReceivers(){
        return await useApi<SendersReceiverJson>('receivers',{
            method: 'get'
        })
    }
}