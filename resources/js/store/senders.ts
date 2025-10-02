import { SendersServices } from "@/services/senders";
import { SendersReceiverJson } from "@/types";
import { defineStore } from "pinia";

export const useSendersStore = defineStore('senders',{
    state: () => ({
        senders: [] as SendersReceiverJson[]
    }),
    getters:{},
    actions:{

        async allSenders(){
            try {
                const { data, error } = await SendersServices.fetchSenders()
                if (data) {
                    this.senders = data
                }
            } catch (error) {
                return error
            }
        }
    }
})